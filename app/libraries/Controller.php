<?php
/**
 * Created by PhpStorm.
 * User: nahid
 * Date: 12/9/20
 * Time: 10:22 PM
 */

namespace App\libraries;


class Controller
{

    public function model($model)
    {
        // get model
        require_once '../app/models/'.$model.".php";
//        instantiate model
        return new $model;
    }

    //load view
    public function view($view,$data=[])
    {
        //check view file
        if(file_exists('../app/views/'.$view.".php"))
        {
            require_once '../app/views/'.$view.".php";
        }else
        {
            die("File Not Found !!");
        }
    }

}