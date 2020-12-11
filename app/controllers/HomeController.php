<?php

/**
 * Created by PhpStorm.
 * User: nahid
 * Date: 12/11/20
 * Time: 9:00 PM
 */
class HomeController extends \App\libraries\Controller
{


    public function index()
    {
        $this->view('index');
    }


}