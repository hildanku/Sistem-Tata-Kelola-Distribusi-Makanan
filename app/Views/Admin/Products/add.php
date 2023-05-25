<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <form action="<?= base_url('admin/product/store') ?>" method="post">

        <div class="form-group">
            <label for="title">Nama Produk</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>
        <div class="form-group">
            <label for="username">Deskripsi Produk</label>
            <input type="text" class="form-control" id="product_description" name="product_description" required>
        </div>
        <div class="form-group">
            <label for="username">Harga Produk/pcs</label>
            <input type="text" class="form-control" id="product_price" name="product_price" required>
        </div>
        <div class="form-group">
            <label for="username">Stok Produk</label>
            <input type="text" class="form-control" id="product_quantity" name="product_quantity" required>
        </div>

        <div class="form-group">
        <label for="status">Kategori Produk</label>
            <select class="form-control" id="category_id" name="category_id">
              <?php foreach($getCategory as $key => $data) : ?>
                <option value="<?= $data['category_id'] ?>"><?= $data['category_name'] ?></option>
                <?php endforeach   ?> 
            </select>
        </div>

        <div class="form-group">
            <label for="username">Waktu Produksi</label>
            <input type="text" class="form-control" id="product_made" name="product_made" required>
        </div>
        <div class="form-group">
            <label for="username">Waktu Expired</label>
            <input type="text" class="form-control" id="product_expired" name="product_expired" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
        
    </form>

<?= $this->endSection() ?>