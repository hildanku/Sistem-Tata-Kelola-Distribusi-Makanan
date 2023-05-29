<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <form action="<?= base_url('admin/distribution/store') ?>" method="post">
        <div class="form-group">
        <label for="status">Nama Kurir</label>
            <select class="form-control" id="driver_id" name="driver_id">
                <?php foreach($getDrivers as $key => $data) : ?>
                <option value="<?= $data['driver_id'] ?>"><?= $data['driver_name'] ?></option>
                <?php endforeach   ?> 
            </select>
        </div>
        <div class="form-group">
        <label for="status">Nama Produk</label>
            <select class="form-control" id="product_id" name="product_id">
                <?php foreach($getProducts as $key => $data) : ?>
                <option value="<?= $data['product_id'] ?>"><?= $data['product_name'] ?></option>
                <?php endforeach   ?> 
            </select>
        </div>
        <div class="form-group">
            <label for="username">Alamat Distribusi</label>
            <input type="text" class="form-control" id="distribution_destination" name="distribution_destination" required>
        </div>
        <div class="form-group">
            <label for="username">Waktu Tanggal Distribusi</label>
            <input type="datetime-local" class="form-control" id="distribution_datetime" name="distribution_datetime" required>
        </div>
        <div class="form-group">
            <label for="username">Deskripsi Distribusi</label>
            <input type="text" class="form-control" id="distribution_description" name="distribution_description" required>
        </div>
        <div class="form-group">
        <label for="status">Status Distribusi</label>
            <select class="form-control" id="distribution_progress" name="distribution_progress">
                <option value="diproses">Sedang Diproses</option>
                <option value="dalam_perjalanan">Dalam Perjalanan</option>
                <option value="batal">Diterima</option>
                <option value="diterima">Batal</option>
                <option value="dikembalikan">Dikembalikan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Distribusi</button>
        
    </form>

<?= $this->endSection() ?>