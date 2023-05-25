<?php

namespace App\Controllers;
use App\Models\WebConfigModel;  

class WebConfig extends BaseController
{
    public function index()
    {
        $model = new WebConfigModel();
        $config = $model->first();
        return view('Admin/WebConfig/index', [
          'config' => $config,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
    public function edit()
    {
      helper('form');
      $model = new WebConfigModel();
      $config = $model->first();
      return view('Admin/WebConfig/edit', [
        'config' => $config,
        'appTitle' => $config['app_title'],
        'appName' => $config['app_name']
      ]);
    }
    public function update($id)
    {
      $model = new WebConfigModel();
      $data = [
          'app_logo' => $this->request->getPost('app_logo'),
          'app_title' => $this->request->getPost('app_title'),
          'app_name' => $this->request->getPost('app_name'),
          'description' => $this->request->getPost('description'),
      ];
      session()->setFlashdata('success', 'Data berhasil diupdate.');
      $model->where('id', $id)->set($data)->update();
      return redirect()->to('/admin/webconfig');
    }
}