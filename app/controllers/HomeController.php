<?php

/**
 * Created by PhpStorm.
 * User: nahid
 * Date: 12/11/20
 * Time: 9:00 PM
 */
class HomeController extends \App\libraries\Controller
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel=$this->model('User');
    }

    public function index()
    {
        $data=$this->userModel->getUsers();
        $this->view('index',$data);
    }


}