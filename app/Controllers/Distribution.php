<?php

namespace App\Controllers;
use App\Models\WebConfigModel; 
use App\Models\DistributionModel;
use App\Models\ProductModel;
use App\Models\DriverModel;

class Distribution extends BaseController
{

  protected $webconfigM;
  protected $distributionM;
  protected $productM;
  protected $driverM;
  public function __construct()
  {
    $this->webconfigM = new WebConfigModel();
    $this->distributionM = new DistributionModel();
    $this->productM = new ProductModel();
    $this->driverM = new DriverModel();
  }

    public function index()
    {
        // $model = new WebConfigModel();
        // $config = $model->first();
        $config = $this->webconfigM->first();
        $getDrivers = $this->driverM->findAll();
        $getProducts = $this->productM->findAll();
        $getData = $this->distributionM->findAll();
      
        return view('Admin/Distributions/index', [
          'getDrivers' => $getDrivers,
          'getProducts' => $getProducts,
          'getData' => $getData,
          'config' => $config,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
    public function add()
    {
        $config = $this->webconfigM->first();
        $getDrivers = $this->driverM->findAll();
        $getProducts = $this->productM->findAll();
        return view('Admin/Distributions/add', [
          'getDrivers' => $getDrivers,
          'getProducts' => $getProducts,
          'appTitle' => $config['app_title'],
          'appName' => $config['app_name']
        ]);
      // return view('users/index');
    }
    public function store()
    {
      // tangkap dari AJAX
        $productId = $this->request->getPost('product_id');
        $purchaseAmount = $this->request->getPost('purchase_amount');

        // Ambil data produk berdasarkan product_id
        $getData = $this->productM->find($productId);

           // Cek apakah jumlah yang dibeli melebihi product_quantity
         if ($purchaseAmount > $getData['product_quantity']) {
      // Jika melebihi, tampilkan pesan error dan kembalikan pengguna ke halaman sebelumnya
            session()->setFlashdata('error', 'Order gagal, pembelian melebihi stock.');
            return redirect()->back();
        }

        $productPrice = $getData['product_price'];
        $productQuantity = $getData['product_quantity'];
        // Hitung total harga
        $payAmount = $purchaseAmount * $productPrice;
        $quantity = $productQuantity - $purchaseAmount;
        // update quantity barang
        $this->productM->update($productId,['product_quantity' => $quantity]);
    
        $data = [
            'driver_id' => $this->request->getPost('driver_id'),
            'product_id' => $productId,
            'purchase_amount' => $purchaseAmount,
            'pay_amount' => $payAmount, // Set nilai 'pay_amount' berdasarkan perhitungan di atas
            'distribution_destination' => $this->request->getPost('distribution_destination'),
            'distribution_datetime' => $this->request->getPost('distribution_datetime'),
            'distribution_description' => $this->request->getPost('distribution_description'),
            'distribution_progress' => $this->request->getPost('distribution_progress')
        ];
    
        if ($this->distributionM->save(esc($data))){
          session()->setFlashdata('success', 'Data berhasil ditambahkan.');
          return redirect()->to('/admin/distributions');
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan!');
            return redirect()->to('/admin/distributions');
        }
    }
    
    public function edit($distribution_id)
    {
        helper('form');
        $config = $this->webconfigM->first();
        $getDrivers = $this->driverM->findAll();
        $getProducts = $this->productM->findAll();

        $data = $this->distributionM->where('distribution_id', $distribution_id)->first();
        return view('Admin/Distributions/edit', [
            'getDrivers' => $getDrivers,
            'getProducts' => $getProducts,
            'data' => $data,
            'appTitle' => $config['app_title'],
            'appName' => $config['app_name']
        ]);
    }
    public function update($distribution_id)
    {
      // $productId = $this->request->getPost('product_id');
      // $getDistributionProgress = $this->request->getPost('distribution_progress');
      // $getData = $this->productM->find($productId);
      // $distributionProgress = $getData['distribution_progress']
      // if ($distributionProgress )

        $distribution = $this->distributionM->find($distribution_id);
        $oldProgress = $distribution['distribution_progress'];
        $newProgress = $this->request->getPost('distribution_progress');

        if ($oldProgress != $newProgress && $newProgress == 'batal' || $newProgress == 'dikembalikan'){

          $productId = $distribution['product_id'];
          $productQuantity = $this->productM->find($productId)['product_quantity'];
          $purchaseAmount = $distribution['purchase_amount'];
          $newQuantity = $productQuantity + $purchaseAmount;
          $this->productM->where('product_id',$productId)->set('product_quantity', $newQuantity)->update();

        }

        $data = [
            'driver_id' => $this->request->getPost('driver_id'),
            'product_id' => $this->request->getPost('product_id'),
            'distribution_destination' => $this->request->getPost('distribution_destination'),
            'distribution_datetime' => $this->request->getPost('distribution_datetime'),
            'distribution_description' => $this->request->getPost('distribution_description'),
            'distribution_progress' => $this->request->getPost('distribution_progress')
        ];
        if ($this->distributionM->where('distribution_id', $distribution_id)->set(esc($data))->update()) {
          session()->setFlashdata('success', 'Data berhasil diperbarui!');
          return redirect()->to('/admin/distributions');
      } else {
          session()->setFlashdata('error', 'Data gagal diperbarui!');
          return redirect()->to('/admin/distributions');
      }
    }
    public function delete($distribution_id)
    {
        $data = $this->distributionM->where('distribution_id', $distribution_id)->first();
        if (!$data) {
            return $this->response->setJSON(['success' => false]);
        }
        $this->distributionM->where('distribution_id', $distribution_id)->delete();
        return $this->response->setJSON(['success' => true]);
    }
    public function getProductData($product_id)
    {
      $product = $this->productM->find($product_id);

      if (!$product) {
        return $this->response->setJSON(['success' => false]);
      }

      return $this->response->setJSON($product);
    }
}
