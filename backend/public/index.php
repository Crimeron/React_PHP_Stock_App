<?php

header("Access-Control-Allow-Origin: *");
require_once "../app/Models/allClasses.php";
require_once '../app/Controllers/ProductController.php';
require_once '../config/database.php'; 
$database = new database();
$productController = new ProductController($database->conn);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $products = $productController->getProducts();
    echo json_encode($products);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'save') {
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $type = $_POST['type'];
        
        $data = [
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
        ];
    
        if ($type === 'Book') {
            $weight = $_POST['weight'];
            $data['weight'] = $weight;
        } elseif ($type === 'DVD') {
            $size = $_POST['size'];
            $data['size'] = $size;
        } elseif ($type === 'Furniture') {
            $height = $_POST['height'];
            $width = $_POST['width'];
            $length = $_POST['length'];
            $data['height'] = $height;
            $data['width'] = $width;
            $data['length'] = $length;
        }
    
        $productController->saveProduct($data, $type);
    }elseif (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $skus = $_POST['skus']; 
        $productController->deleteProduct($skus);
    }
    

}



