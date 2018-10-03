<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 12.09.2018
 * Time: 12:02
 */

class CabinetController
{
    public function actionIndex()
    {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);


        require_once (ROOT . '/views/cabinet/index.php');

        return true;
    }

    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];

        $result = false;

        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkName($name)) {
                $errors[] = 'І’мя має бути не короте 2-х символів ';
            }

            if(!User::checkPassword($password)) {
                $errors[] = 'Пароль має бути не короте 6-ти символів ';
            }

            if($errors == false){
                $result = User::edit($userId,$name,$password);

            }

        }

        require_once (ROOT. '/views/cabinet/edit.php');

        return true;
    }

}