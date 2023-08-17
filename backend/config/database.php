<?php


class database{
    public $host = 'localhost';
    public $dbName = 'scandiweb_task';
    public $username = 'root';
    public $password = '';
    
    public $conn;
    
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbName);
        if ($this->conn->connect_error) {
            die("Veritabanına bağlanılamadı: " . $this->conn->connect_error);
        }
    }

    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";
        $query = "INSERT INTO $table ($columns) VALUES ($values)";

        if ($this->conn->query($query) === true) {
            echo json_encode('Succesfully');
        } else {
            echo json_encode('Error: ' . $this->conn->error);
        }
        
    }

    public function deleteBySKUs($table, $skus) {
        $skusArray = explode(',', $skus);
        $escapedSkus = array_map(function($sku) {
            return "'" . $this->conn->real_escape_string(trim($sku)) . "'";
        }, $skusArray);
    
        $skuList = implode(',', $escapedSkus);
    
        $query = "DELETE FROM $table WHERE sku IN ($skuList)";
        
        if ($this->conn->query($query) === true) {
            $response = [
                'message' => 'Successfully deleted',
                'query' => $query
            ];
            echo json_encode($response);
        } else {
            $response = [
                'message' => 'Error: ' . $this->conn->error,
                'query' => $query
            ];
            echo json_encode($response);
        }
    }
    

    public function close() {
        $this->conn->close();
    }
    
}
