<?php
/**
 * Created by PhpStorm.
 * User: nahid
 * Date: 12/9/20
 * Time: 10:21 PM
 */

namespace App\libraries;

use PDO;
class DBConnection
{
    private static $db_host=DB_HOST;
    private static $db_name=DB_NAME;
    private static $db_user=DB_USER;
    private static $db_pass=DB_PASS;
    private static $myconnection;
    private static $param;

    public function __construct()
    {
        self::$param='mysql:host='.self::$db_host.';dbname='.self::$db_name;
    }

    public static function database(){
        if(!isset(self::$myconnection)){
            try{
                self::$myconnection=new PDO(self::$param,self::$db_user,self::$db_pass);
                self::$myconnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(\PDOException $exp){
                return $exp->getMessage();
            }
        }
        return self::$myconnection;
    }

    public static function query($sql){
        return self::database()->prepare($sql);
    }



}