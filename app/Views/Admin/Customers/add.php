<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <form action="<?= base_url('admin/customers/store') ?>" method="post">

        <div class="form-group">
            <label for="title">Nama Toko</label>
            <input type="text" class="form-control" id="shop_name" name="shop_name" required>
        </div>
        <div class="form-group">
            <label for="username">Nama Pemilik Toko</label>
            <input type="text" class="form-control" id="shop_owner" name="shop_owner" required>
        </div>
        <div class="form-group">
            <label for="username">Alamat Toko</label>
            <input type="text" class="form-control" id="shop_address" name="shop_address" required>
        </div>
        <div class="form-group">
            <label for="username">Nomor HP</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
        <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
        
    </form>

<?= $this->endSection() ?>