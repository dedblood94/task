<?php
require "conf.php";
/**
 * Created by PhpStorm.
 * User: death
 */
$post = $_POST['term'];
if($post){
    if($key) {
        $url = "http://api.giphy.com/v1/gifs/search?q=".str_replace(
            ' ',
            '+',
            $post
          )."&api_key=".$key."&limit=1&bundle=messaging_non_clips";
        if(file_get_contents ($url) == false)
        {
            $result = 'Nothing Find';
        }else {
           $result= json_decode(file_get_contents ($url));
           foreach ($result as $k)
           {
               foreach ($k as $urls){
                    print_r($urls->url);die;
                   //print_r($_SESSION['gif_data']);die;
                   $result = "http://locallhost/index.php?". http_build_query($urls);

               }

           }
        }
    }else{
        $result = 'Cant find key';
    }
}
header('Location: '.$result);


