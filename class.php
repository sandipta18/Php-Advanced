<?php
require_once "../vendor/autoload.php";
use GuzzleHttp\Client;

class fetch
{
  function fetch_data($url)
  {
    $client = new Client();
    $response = $client->get($url);
    $body = $response->getBody()->getContents();
    $arr_body = json_decode($body, true);
    return $arr_body;
  }
}
class output{
  function print_data($arr_body){
    $arr = array();
    
    for($i=0;$i<16;$i++){
      if($arr_body['data'][$i]['attributes']['field_services']!=NULL){
        $title = $arr_body['data'][$i]['attributes']['title'];
        array_push($arr,$title) ;
        $body = $arr_body['data'][$i]['attributes']['field_services']['processed'];
        array_push($arr,$body) ;
        $store = $arr_body['data'][$i]['relationships']['field_image']['links']['related']['href'];
        $image = new fetch();
        $image_body = $image->fetch_data($store);
        $image_content = 'https://ir-dev-d9.innoraft-sites.com'.$image_body['data']['attributes']['uri']['url'];
        array_push($arr,$image_content);
      }
    } 
    return $arr;
  }
}
