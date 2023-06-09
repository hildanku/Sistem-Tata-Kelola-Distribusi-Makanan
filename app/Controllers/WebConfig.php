<?php

namespace App\Controllers;
use App\Models\WebConfigModel;  

class WebConfig extends BaseController
{
  protected $webconfigM;
  public function __construct()
  {
      $this->webconfigM = new WebConfigModel();
  }
    public function index()
    {
        $config = $this->webconfigM->first();
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
      $config = $this->webconfigM->first();
      return view('Admin/WebConfig/edit', [
        'config' => $config,
        'appTitle' => $config['app_title'],
        'appName' => $config['app_name']
      ]);
    }
    public function update($id)
    {
      $data = [
          'app_logo' => $this->request->getPost('app_logo'),
          'app_title' => $this->request->getPost('app_title'),
          'app_name' => $this->request->getPost('app_name'),
          'description' => $this->request->getPost('description'),
      ];
      if ($this->webconfigM->where('id', $id)->set($data)->update()) {
          session()->setFlashdata('success', 'Data berhasil diperbarui!');
          return redirect()->to('/admin/webconfig');
      } else {
          session()->setFlashdata('error', 'Data gagal diperbarui!');
          return redirect()->to('/admin/webconfig');
      }
      
    }
}
