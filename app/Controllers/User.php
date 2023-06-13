<?php

namespace App\Controllers;

use App\Models\WebConfigModel;  
use App\Entities\User as UserEntity;
use App\Models\UserModel;  

class User extends BaseController
{

    protected $webconfigM;
    protected $userM;

    public function __construct()
    {
        $this->webconfigM = new WebConfigModel;
        $this->userM = new UserModel;
    }
    public function index()
    {

        $config = $this->webconfigM->first();
        $getData = $this->userM->findAll();
        return view('Admin/Users/index', [
            'getData' => $getData,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
            ]);
    }
    public function add()
    {
        $config = $this->webconfigM->first();

        return view('Admin/Users/add', [
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function store()
    {
        $data = [
            'email' => $this->request->getPost('email'),
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'password_hash' => $this->request->getPost('password_hash'),
            'active' => 1,        
        ];

        $users = new UserEntity();
        $users->fill(esc($data));
        $users->setPassword($data['password_hash']);
    
        if ($this->userM->save($users)){
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin/users');
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan!');
            return redirect()->to('/admin/users');
        }
    }
    public function edit($id)
    {
        helper('form');
        $config = $this->webconfigM->first();
        $data = $this->userM->where('id', $id)->first();
      
        return view('Admin/Users/edit', [
            'data' => $data,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($id)
    {
        $data = [
            'email' => $this->request->getPost('email'),
            'fullname' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'password_hash' => $this->request->getPost('password_hash'),
            'active' => $this->request->getPost('active'),
        ];
        $users = new UserEntity();
        $users->fill(esc($data));
        $users->setPassword($data['password_hash']);

        // if ($this->userM->where('id', $id)->set($users)->update()) {
            if ($this->userM->update($id, $users)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui!');
            return redirect()->to('/admin/users');
        } else {
            session()->setFlashdata('error', 'Data gagal diperbarui!');
            return redirect()->to('/admin/users');
        }
    }
    
    public function delete($id)
    {
        $data = $this->userM->where('id', $id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $this->userM->where('id', $id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
}
       /*
       problem :          $this->userM->where('id', $id)->set($data)->update();
        Kesalahan yang terjadi adalah karena metode set() dari CodeIgniter Model membutuhkan array sebagai argumen, bukan objek.
         Anda mencoba memberikan objek UserEnt ke metode set(), yang menyebabkan kesalahan tipe data (TypeError).
        Untuk memperbaiki kesalahan tersebut, Anda dapat mengubah objek UserEnt menjadi array sebelum menggunakan metode set(). 
        Berikut adalah perubahan yang perlu dilakukan pada baris 86:
        
        Dengan menggunakan metode toArray() dari objek UserEnt, Anda dapat mengonversinya menjadi array yang dapat diterima oleh metode set().
         Setelah perubahan tersebut, kode seharusnya tidak lagi menghasilkan kesalahan "TypeError: Illegal offset type"
        */
