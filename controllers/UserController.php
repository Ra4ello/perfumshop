<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 12.09.2018
 * Time: 10:41
 */

class UserController
{
    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';

        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $result = false;

            $errors = false;

            if(!User::checkName($name)) {
                $errors[] = 'І’мя має бути не короте 2-х символів ';
            }

            if(!User::checkEmail($email)) {
                $errors[] = 'Неправильний email';
            }

            if(!User::checkPassword($password)) {
                $errors[] = 'Пароль має бути не короте 6-ти символів ';
            }
            if(User::checkEmailExists($email)) {
                $errors[] = 'Такий email  вже існує';
            }

            if($errors == false){
                $result = User::register($name,$email,$password);

            }

        }
        require_once (ROOT. '/views/user/register.php');

        return true;
    }
    public function actionLogin()
    {
        $email = '';
        $password = '';

        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
        //Валідація поля
            if(!User::checkEmail($email)) {
                $errors[] = 'Неправильний email';
            }
            if(!User::checkPassword($password)) {
                $errors[] = 'Пароль має бути не короте 6-ти символів ';
            }

            //перевірка чи існує такий користувач
            $userId = User::checkUserData($email,$password);

            if($userId == false){
                $errors[] = 'Неправильні дані для входу на сайт';
            }else{
                User::auth($userId);

                header("Location: /cabinet/");
            }
        }

        require_once (ROOT . '/views/user/login.php');

        return true;
    }
    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /");


    }

}