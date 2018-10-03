<?php
/**
 * Created by PhpStorm.
 * User: Ra4ello
 * Date: 14.09.2018
 * Time: 10:47
 */

class Cart
{
    public static function addProduct($id){


            $productsInCart = array();


            if(isset($_SESSION['products']))
            {
                $productsInCart = $_SESSION['products'];
            }

            if(array_key_exists($id, $productsInCart)){
                $productsInCart[$id] ++;
            }else{
                $productsInCart[$id] = 1;
            }
            $_SESSION['products'] = $productsInCart;

            return self::countItems();

    }

    public static function deleteProduct($id){
        $productsInCart = self::getProducts();
        // Удаляем из массива элемент с указанным id
        unset($productsInCart[$id]);
        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInCart;
    }

    public static function actionDelete($id){
        header("Location: /cart/");
    }

    public static function countItems()
    {
        if(isset($_SESSION['products'])){
            $count = 0;

            foreach ($_SESSION['products'] as $id => $quantity){
                $count = $count + $quantity;
            }
            return $count;
        }else {
            return 0;
        }
    }
    public static function getProducts()
{
    if (isset($_SESSION['products'])) {
        return $_SESSION['products'];
    }
    return false;
}
    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
             }
        }
        return $total;
    }
    public static function clear(){
        if(isset($_SESSION['products'])){
            unset($_SESSION['products']);
        }
    }
}