<?php
/**
 * Created by PhpStorm.
 * User: nahid
 * Date: 12/12/20
 * Time: 10:18 PM
 */

//namespace App\models;


use App\libraries\DBConnection;
use PDO;
class User
{

    public function getUsers()
    {
        $sql="select * from u_users";
        $stmt=DBConnection::query($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}