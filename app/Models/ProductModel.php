<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'product_id';

    protected $useAutoIncrement = true;
// walaupun kolom berelasi harus tetap ditulis di model

    protected $allowedFields = ['product_name', 'product_description', 'product_price', 'product_quantity', 'product_made','category_id', 'product_expired'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $dateFormat   = 'datetime';
    
}