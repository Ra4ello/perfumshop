<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 15.09.2018
 * Time: 14:49
 */

 abstract class AdminBase
{



        public static function checkAdmin(){

            $userId = User::checkLogged();

            $user = User::getUserById($userId);

            if($user['role'] == 'admin'){
                return true;
            }

            die("Access denied");
        }
}