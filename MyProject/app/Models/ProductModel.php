<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'sales_data'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $allowedFields = ['product_name', 'sales_amount', 'sales_date']; 
    protected $useTimestamps = false; 

    public function createProduct($data) {
        return $this->insert($data);
    }

public function getProductById($id) {
    return $this->find($id);
}

public function updateProduct($id, $data) {
    return $this->update($id, $data);
}

public function deleteProduct($id) {
    return $this->delete($id);
}
}