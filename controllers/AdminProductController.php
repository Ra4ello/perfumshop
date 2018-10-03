<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 15.09.2018
 * Time: 15:04
 */

class AdminProductController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $productList = array();
        $productList = Product::getProductsList();

        require_once ROOT. '/views/admin_product/index.php';

        return true;
    }

    public function actionCreate()
    {
        self::checkAdmin();
        $categoriesList = Category::getCategoryListAdmin();
        if(isset($_POST['submit'])){
            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];
            $options['price'] = $_POST['price'];
            $options['availability'] = $_POST['availability'];
            $options['brand'] = $_POST['brand'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['code'] = $_POST['code'];
            $options['status'] = $_POST['status'];

            $errors = false;

            if(!isset($options['name']) || empty($options['name'])){
                $errors[] = 'Заповніть поля';
            }

            if($errors == false){

                $id = Product::createProduct($options);


                if($id){
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                };

                header("Location: /admin/product");
            }

        }
        require_once ROOT. '/views/admin_product/create.php';
        return true;

    }
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $categoriesList = Category::getCategoryListAdmin();
        $product = Product::getProductsById($id);

        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];
            $options['price'] = $_POST['price'];
            $options['availability'] = $_POST['availability'];
            $options['brand'] = $_POST['brand'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['code'] = $_POST['code'];
            $options['status'] = $_POST['status'];

            if(Product::updateProductsById($id,$options)){
                if(is_uploaded_file($_FILES["image"]["tmp_name"])){

                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                }
            }
            header("Location: /admin/product");
        }
        require_once ROOT. '/views/admin_product/update.php';

        return true;
    }
    public function actionDelete($id)
    {
        self::checkAdmin();
        if(isset($_POST['submit'])){

            Product::deleteProductById($id);

            header("Location: /admin/product");
        }

        require_once ROOT.'/views/admin_product/delete.php';
        return true;
    }

}