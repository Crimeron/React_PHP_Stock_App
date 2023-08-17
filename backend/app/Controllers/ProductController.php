<?php
class ProductController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getProducts()
    {
        $products = [];

        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        return $products;
    }

    function saveProduct($data, $typee)
    {
        $type = $typee;
        $product = new $type();
        $product->filldata($data);

        $database = new database();
        $database->insert("products", $product->getData());

        $database->close();
    }

    function deleteProduct($data)
    {
        $db = new database();

        $skusToDelete = $data;

        $db->deleteBySKUs('products', $skusToDelete);
        $db->close();
    }
}
