<?php

namespace App\Controllers;

use App\Models\WebConfigModel;  
use App\Models\NewsModel; 

class News extends BaseController
{
    protected $webconfigM;
    protected $newsM;

    public function __construct()
    {
        $this->webconfigM = new WebConfigModel();
        $this->newsM = new NewsModel();
    }
    public function index()
    {
        $config = $this->webconfigM->first();
        $getNews = $this->newsM->findAll();
        return view('Admin/News/index', [
            'getNews' => $getNews,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
            ]);

    }
    public function add()
    {
        $config = $this->webconfigM->first();
        return view('Admin/News/add', [
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function store()
    {
        $data = [
            'status' => $this->request->getPost('status'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        $this->newsM->save($data);
        return redirect()->to('/admin/news');
    }
    public function edit($id)
    {
        helper('form');
        $config = $this->webconfigM->first();
        $data = $this->newsM->where('id', $id)->first();

        return view('Admin/News/edit', [
            'data' => $data,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($id)
    {
        $data = [
            'status' => $this->request->getPost('status'),
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];
        session()->setFlashdata('success', 'Data berhasil diupdate.');
        $this->newsM->where('id', $id)->set($data)->update();
        return redirect()->to('/admin/news');
    }
    public function delete($id)
    {
        $data = $this->newsM->where('id', $id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $this->newsM->where('id', $id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
}