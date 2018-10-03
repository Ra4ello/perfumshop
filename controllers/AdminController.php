<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 15.09.2018
 * Time: 14:46
 */

class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        require_once ROOT. '/views/admin/index.php';

        return true;
    }
}