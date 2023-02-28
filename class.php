<?php
require_once "../vendor/autoload.php";
use GuzzleHttp\Client;

/**
 * [Description storage]
 * Class storage is used to store all the variables
 */
class storage{
  
  /**
   * [Description for $title]
   *
   * @var string
   */
  public $title;
  /**
   * [Description for $body]
   *
   * @var string]
   */
  public $body;
 
  /**
   * [Description for $explore_more]
   *
   * @var string
   */
  public $explore_more;
  /**
   * [Description for $image_content]
   *
   * @var string
   */
  public $image_content;
}
  

/**
 * [Description output]
 * @method fetch_data
 * fetch_data will be used for retrieving the data by calling the api
 * @method print_data
 * print_data will be used for retrieving individual data and storing them 
 * inside an array and returning it
 */
class output{
  /**
   * [Description for $arr]
   *
   * @var array
   */
  public $arr = array();
  /**
   * [Description for fetch_data]
   * fetching data by calling the api
   *
   * @param mixed $url
   * 
   * @return array
   * 
   */
  function fetch_data($url)
  {
    $client = new Client();
    $response = $client->get($url);
    $body = $response->getBody()->getContents();
    $arr_body = json_decode($body, true);
    return $arr_body;
  }

  /**
   * [Description for print_data]
   * Will be used to store individual data 
   * and returning the array consisting of data
   *
   * @return [type]
   * 
   */
  function print_data(){
   
    
    for($i=0;$i<16;$i++){
      $obj_data = new storage();
      $url = 'https://ir-dev-d9.innoraft-sites.com/jsonapi/node/services';
      $arr_body = $this->fetch_data($url);
      
      if($arr_body['data'][$i]['attributes']['field_services']!=NULL){
        $obj_data->title = $arr_body['data'][$i]['attributes']['title'];
        $obj_data->body = $arr_body['data'][$i]['attributes']['field_services']['processed'];
        $explore = $arr_body['data'][$i]['attributes']['path']['alias'];
        $obj_data->explore_more = 'https://ir-dev-d9.innoraft-sites.com'.$explore;
        $store = $arr_body['data'][$i]['relationships']['field_image']['links']['related']['href'];
        $image_body = $this->fetch_data($store);
        $obj_data->image_content = 'https://ir-dev-d9.innoraft-sites.com'.$image_body['data']['attributes']['uri']['url'];
        array_push($this->arr,$obj_data);
        
      }
    } 
    return $this->arr;
  }
}

/**
 * [Description validate]
 */
class validate
{
    /**
     * [Description for validate_email]
     * Email will be verified first using mailboxlayer api which will be called with the help of guzzlehttp
     * If email is verified true is returned else false is returned
     * @param mixed $em
     * 
     * @return [type]
     * 
     */
    function validate_email($em)
    {

        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://api.apilayer.com'
        ]);
        $response = $client->request('GET', 'email_verification/check?email=' . $em, [
            'headers' => [
                'apikey' => '6lqXAXAXlgwac06C28c0iHsgZn47lrCy',
            ]
        ]);

        $body = $response->getBody();
        $arr_body = json_decode($body);
        if ($arr_body->format_valid && $arr_body->smtp_check) {
            return true;
        }
         else {
            return false;
        }
    }
}
