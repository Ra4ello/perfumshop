<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 15.09.2018
 * Time: 17:09
 */
    /**
     * Created by PhpStorm.
     * User: Ra4ello
     * Date: 15.09.2018
     * Time: 15:04
     */

class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $productList = array();
        $categoriesList = Category::getCategoryListAdmin();

        require_once ROOT. '/views/admin_category/index.php';

        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();

        if(isset($_POST['submit'])){
            $options['name'] = $_POST['name'];
            $options['sort_order'] = $_POST['sort_order'];
            $options['status'] = $_POST['status'];

            $errors = false;

            if(!isset($options['name']) || empty($options['name'])){
                $errors[] = 'Заповніть поля';
            }

            if($errors == false){

                $id = Category::createCategory($options);


                header("Location: /admin/category");
            }

        }
        require_once ROOT. '/views/admin_category/create.php';
        return true;

    }
    public function actionUpdate($id)
    {
        self::checkAdmin();

        $category = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];

            Category::updateCategoryById($id,$name,$sortOrder,$status);

            header("Location: /admin/category");
        }
        require_once ROOT. '/views/admin_category/update.php';

        return true;
    }
    public function actionDelete($id)
    {
        self::checkAdmin();
        if(isset($_POST['submit'])){

            Category::deleteCategoryById($id);

            header("Location: /admin/category");
        }

        require_once ROOT.'/views/admin_category/delete.php';
        return true;
    }
}