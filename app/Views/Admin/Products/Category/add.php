<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <form action="<?= base_url('admin/product/category/store') ?>" method="post">
        <div class="form-group">
            <label for="title">Nama Kategori</label>
            <input type="text" class="form-control" id="category_name" name="category_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kategori</button>
    </form>

<?= $this->endSection() ?>