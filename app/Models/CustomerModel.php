<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customers';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['uuid', 'shop_name', 'shop_owner', 'shop_address', 'phone_number', 'email'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $dateFormat   = 'datetime';
    
    public function getCustomer()
    {
        return $this->findAll();
    }
}