<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 10.09.2018
 * Time: 10:53
 */

include_once ROOT.'/models/Category.php';
include_once ROOT.'/models/Product.php';

class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(9);

        require_once (ROOT.'/views/site/index.php');

        return true;
    }
    public function actionContacts()
    {
        $userMail = '';
        $userText = '';
        $result = false;

        if(isset($_POST['submit'])){

            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            $errors = false;

            if (!User::checkEmail($userMail)) {
                $errors[] = 'Неправильний email';
            }

            if($errors == false) {
                $adminEmail = 'vovchuk-97@ukr.net';
                $message = 'Текст: {$userText}. От {$userEmail}';
                $subject = 'Тема повідомлення';

                $result = mail($adminEmail,$subject,$message);
                $result = true;
            }
        }



        require_once(ROOT.'/views/site/contacts.php');

        return true;
    }
}