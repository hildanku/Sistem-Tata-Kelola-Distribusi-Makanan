<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <?= form_open('/news/update/'.$data['id']) ?>
    <div class="form-group">
        <label for="status">Status</label>
            <select class="form-control" id="status" name="status" value="<?= $data['status'] ?>">
                <option value="danger">Penting</option>
                <option value="warning">Peringatan</option>
                <option value="info">Informasi</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $data['title'] ?>">
        </div>
        <div class="form-group">
            <label for="isi">Isi</label>
            <input type="text" class="form-control" id="content" name="content" value="<?= $data['content'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Edit Berita</button>

    <?= form_close() ?>


<?= $this->endSection() ?>