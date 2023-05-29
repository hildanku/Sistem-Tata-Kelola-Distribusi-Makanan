<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <form action="<?= base_url('admin/driver/store') ?>" method="post">
    <div class="form-group">
            <label for="title">Nama Kurir</label>
            <input type="text" class="form-control" id="driver_name" name="driver_name" required>
        </div>
        <div class="form-group">
            <label for="username">Nomor HP</label>
            <input type="text" class="form-control" id="driver_phone" name="driver_phone" required>
        </div>
        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" class="form-control" id="driver_email" name="driver_email" required>
        </div>
        <div class="form-group">
        <label for="status">Status</label>
            <select class="form-control" id="driver_status" name="driver_status">
                <option value="Active">Aktif</option>
                <option value="TNon Active">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Kurir</button>
        
    </form>

<?= $this->endSection() ?>