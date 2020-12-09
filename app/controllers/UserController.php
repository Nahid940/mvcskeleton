<?php
/**
 * Created by PhpStorm.
 * User: nahid
 * Date: 12/9/20
 * Time: 10:36 PM
 */

namespace App\controllers;


use App\libraries\Controller;

class UserController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        return $this->view("hello");
    }

}