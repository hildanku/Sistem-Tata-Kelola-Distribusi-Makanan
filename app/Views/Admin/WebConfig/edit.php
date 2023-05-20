<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <?= form_open('admin/webconfig/update/'.$config['id']) ?>
        <div class="form-group">
            <label for="title">Logo Aplikasi</label>
            <input type="text" class="form-control" id="app_logo" name="app_logo" value="<?= $config['app_logo'] ?>">
        </div>
        <div class="form-group">
            <label for="isi">Judul Aplikasi</label>
            <input type="text" class="form-control" id="app_title" name="app_title" value="<?= $config['app_title'] ?>">
        </div>
        <div class="form-group">
            <label for="isi">Nama Aplikasi</label>
            <input type="text" class="form-control" id="app_name" name="app_name" value="<?= $config['app_name'] ?>">
        </div>
        <div class="form-group">
            <label for="isi">Deskripsi Aplikasi</label>
            <input type="text" class="form-control" id="description" name="description" value="<?= $config['description'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit Konfigurasi</button>

    <?= form_close() ?>


<?= $this->endSection() ?>