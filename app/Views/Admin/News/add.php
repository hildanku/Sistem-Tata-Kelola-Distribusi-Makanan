<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <form action="<?= base_url('news/store') ?>" method="post">
    <div class="form-group">
        <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="danger">Penting</option>
                <option value="warning">Peringatan</option>
                <option value="info">Informasi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="username">Isi</label>
            <input type="text" class="form-control" id="content" name="content" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Berita</button>
    </form>

<?= $this->endSection() ?>