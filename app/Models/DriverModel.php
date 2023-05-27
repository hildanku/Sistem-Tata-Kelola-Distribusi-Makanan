<?php

namespace App\Models;

use CodeIgniter\Model;

class DriverModel extends Model
{
    protected $table      = 'drivers_bck';
    protected $primaryKey = 'driver_id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['driver_name', 'driver_phone', 'driver_email', 'driver_status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $dateFormat   = 'datetime';
    
}