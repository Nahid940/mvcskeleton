<?php
/**
 * Created by PhpStorm.
 * User: nahid
 * Date: 12/9/20
 * Time: 10:29 PM
 */

namespace App\libraries;

use App\controllers\UserController;
class Core
{

    //generate url and load controllers
    //format urls controller/method/param

    protected $Controller="HomeController";
    protected $Method="index";
    protected $params=[];


    public function __construct()
    {
        $url=$this->getUrl();
        //look in controllers fro controller

        if(file_exists('../app/controllers/'.ucwords($url[0])."Controller.php"))
        {
            $this->Controller=ucwords($url[0])."Controller";
            unset($url[0]);
        }
        //require the controller
        require_once '../app/controllers/'.$this->Controller.".php";
        //instantiate controller
        $this->Controller=new $this->Controller;

        if(isset($url[1]))
        {
            if(method_exists($this->Controller,$url[1]))
            {
                $this->Method=$url[1];
            }
            unset($url[1]);
        }

        $this->params=$url?array_values($url):[];

        call_user_func_array([$this->Controller,$this->Method],$this->params);
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