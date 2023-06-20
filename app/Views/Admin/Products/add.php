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
            <input type="number" class="form-control" id="product_price" name="product_price" required>
        </div>
        <div class="form-group">
            <label for="username">Stok Produk</label>
            <input type="text" class="form-control" id="product_quantity" name="product_quantity" required>
        </div>
        <div class="form-group">
            <label for="username">Kategori Produk</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>

        <div class="form-group">
            <label for="username">Waktu Produksi</label>
            <input type="datetime-local" class="form-control" id="product_made" name="product_made" required>
        </div>
        <div class="form-group">
            <label for="username">Waktu Expired</label>
            <input type="datetime-local" class="form-control" id="product_expired" name="product_expired" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
        
    </form>

<?= $this->endSection() ?>