<?php

namespace App\Models;

use CodeIgniter\Model;

class WebConfigModel extends Model
{
    protected $table      = 'webconfig';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['app_logo', 'app_name', 'app_title','description'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $dateFormat   = 'datetime';
    
    public function getConfig()
    {
        return $this->find(1);
    }
}