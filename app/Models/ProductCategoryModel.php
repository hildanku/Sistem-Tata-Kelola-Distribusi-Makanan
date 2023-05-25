<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductCategoryModel extends Model
{
    protected $table      = 'products_category';
    protected $primaryKey = 'category_id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['category_name'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $dateFormat   = 'datetime';
    
}