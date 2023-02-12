<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class WebScraping extends Controller
{

    public function ExtractData() {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.filgoal.com/articles');

        $news =[];
        $index = 0;

        $crawler->filter('#list-box ul li')->each(function ($node) use(&$news, &$index){

            /* image */ 
            $node->filter('a img')->each(function($img) use(&$news, &$index){
                if(empty($img->attr('data-src'))){
                    return ;
                }
                $news[$index]['img'] = 'https:' . $img->attr('data-src');
            });

            /* title */
            $node->filter('a div h6')->each(function($title) use(&$news, &$index){
                $news[$index]['title'] = $title->text();
            });

            /* body */
            $node->filter('a div p')->each(function($body) use(&$news, &$index){
                $news[$index]['body'] = $body->text();
            });

            $index++;
        });

        return view('welcome', compact('news'));
    }
}
