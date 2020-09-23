<template>
  <div>
    <div>
      
      <label class="offset-5">
        <gmap-autocomplete
          @place_changed="setPlace">
        </gmap-autocomplete>
        <button class="btn btn-sm btn-primary" @click="addMarker">Mark</button>
      </label>
      <br/>
    
    </div>
    <input type="hidden" name="place" v-model="center">
    <br>
    
    <gmap-map
      :center="center"
      :zoom="15"
      style="width:100%;  height: 400px; border: 5px solid black;"
    >
      <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :position="m.position"
        @click="center=m.position"
      ></gmap-marker>
    </gmap-map>
  </div>
</template>
<script>
// Add the following code if you want the name of the file appear on select
var moment = require('moment');

export default {
  name: "GoogleMap",
  data() {
    return {
      moment:moment,
      // default to Montreal to keep it simple
      // change this to whatever makes sense
      center: { lat: 45.508, lng: -73.587 , name:''},
      markers: [],
      places: [],
      currentPlace: null,
      lat:0,
      found:{},
      userPosition:null,
    };
  },

  mounted() {
    this.geolocate();
  },

  methods: {
    // Passes Lat and Lon to app.js file
    pass(lat){
        return this.$emit('input',lat);
    },
    // receives a place object via the autocomplete component
    setPlace(place) {
      this.currentPlace = place;
      this.lat = this.currentPlace.geometry.location.lat();
      // this.pass(this.lat);
    },
    addMarker() {
      if (this.currentPlace) {
        const marker = {
          lat: this.currentPlace.geometry.location.lat(),
          lng: this.currentPlace.geometry.location.lng(),
          name: this.currentPlace.name
        };
        this.markers=[];
        this.markers.push({ position: marker });
        this.places.push(this.currentPlace);
        this.center = marker;
        this.getResults();
        this.pass(this.center); //This is passing lat lan value
        this.currentPlace = null;
      }
    },
    geolocate: function() {
      navigator.geolocation.getCurrentPosition(position => {

        this.center = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
        // Added Later
        const marker = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        this.markers=[];
        this.markers.push({ position: marker });

        // Added  Later
        this.getuserPosition(this.center.lat,this.center.lng);
        this.pass(this.center); //This is passing lat lan value
        this.getResults();
      });
      
    },
    getResults(page = 1) {
      axios.post('show-offer?page='+page,{
                    lat:this.center.lat,
                    lng:this.center.lng
                })
        .then(response => {
           
            this.found = response.data;
          
            let markers=[];
            $.each(this.found.data, function(key, value) {
             // list.push(key);
             // console.log(value.offers[1].title);
             markers.push({  position: new google.maps.LatLng(value.lat, value.lng) });
           });
            markers.push({  position: new google.maps.LatLng(this.center.lat, this.center.lng) });
            this.markers = markers;
            // console.log(this.markers);
            // entries.forEach((place) => {
            //   console.log(place.pname);
            //   this.markers.push({  position: new google.maps.LatLng(place.lat, place.lng) });
            //   });
        });
    },
    getuserPosition: function(lat,lng) {
      axios.get('https://cors-anywhere.herokuapp.com/https://maps.googleapis.com/maps/api/geocode/json?latlng='+lat+','+lng+'&key=AIzaSyDwwFgz7dCIYU4jZ8TOSD0VNQK-xz2iY9o')
       .then(response => { 
                    this.userPosition = response.data.results[0].formatted_address
                    // console.log("The town is " + this.current);
                });
    },
    viewDetails(placeid){
        axios.get('details-offer/'+placeid)
                .then(response => { 
                  // Redirecting to laravel
                  window.location = response.data.redirect;
                });
    },

  }
};
</script>