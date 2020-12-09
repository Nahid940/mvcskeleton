<?php
/**
 * Created by PhpStorm.
 * User: nahid
 * Date: 12/9/20
 * Time: 10:29 PM
 */

namespace App\libraries;


class Core
{

    //generate url and load controllers
    //format urls controller/method/param

    protected $Controller="Default";
    protected $defaultMethod="index";
    protected $params=[];


    public function __construct()
    {
        $url=$this->getUrl();

        //look in controllers fro controller

        if(file_exists('../app/controllers/'.ucwords($url[0])."Controller.php"))
        {
            $this->Controller=ucwords($url[0]);
            unset($url[0]);
        }

        //require the controller
        require_once '../app/controllers/'.$this->Controller."Controller.php";
        //instantiate controller
        $this->Controller=new $this->Controller;
    }

    public function getUrl()
    {
        if(isset($_GET['url']))
        {
            $url=rtrim($_GET['url'],'/');
            $url=filter_var($url,FILTER_SANITIZE_URL);
            $url=explode('/',$url);
            return $url;
        }
    }



}