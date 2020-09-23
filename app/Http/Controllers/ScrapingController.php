<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use simplehtmldom\HtmlWeb;

class ScrapingController extends Controller
{
    public function aarong(Request $request){
        $url = 'https://www.aarong.com/';
        $client = new HtmlWeb();
        $html = $client->load($url);

            $title = $html->find('div[class="blog"]>h2');
            $status="aarong";
            $discount = $html->find('div[class="blog"]');
            return view('user.scrap.scrap',compact('discount','status'));
            // $loop=0;
            // foreach ($title as $key => $value) {
            // 	if(str_contains($value, 'Offer') || str_contains($value, 'offer') || str_contains($value, 'Discount') || str_contains($value, 'discount')){
            // 		echo $discount[$loop];
            // 	}
            // 	$loop++;
            // } 
    }
    public function daraaz(Request $request){
        $url = 'https://www.daraz.com.bd/wow/camp/daraz/megascenario/bd/discounts/vouchers?spm=a2a0e.home.feature_nav.5.53214591P88XmL&hybrid=1&scm=1003.4.icms-zebra-100031732-2893410.OTHER_6022892226_6323429';
        $client = new HtmlWeb();
        $html = $client->load($url);
        
            $discount = $html->find('div[class="lzd-act-list-wrap"]>ul>li>a');
          
            $loop=0;
            foreach ($discount as $key => $value) {
            	echo $value;
            	}
            	$loop++;
            }

        public function bkash(Request $request){
        $url = 'https://www.bkash.com/sm-offer';
        $client = new HtmlWeb();
        $html = $client->load($url);
        
            $discount = $html->find('div[class="content-inner"]');
          	// echo $discount[0];
            $status="bkash";
            return view('user.scrap.scrap',compact('discount','status'));

            // foreach ($discount as $key => $value) {
            // 	echo $value;
            // 	} 
            } 

        public function bajaj(Request $request){
        $url = 'https://bangladesh.globalbajaj.com/en/offers';
        $client = new HtmlWeb();
        $html = $client->load($url);
        
            $discount = $html->find('div[class="event-block offerimgblock"]>div>img');
            $status="bajaj";
            return view('user.scrap.scrap',compact('discount','status'));
            
            // $loop=0;
            // foreach ($discount as $key => $value) {
            // 	echo $value;
            // 	}
            // 	$loop++;
            }
}

