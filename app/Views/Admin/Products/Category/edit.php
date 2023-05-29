<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <?= form_open('admin/product/category/update/'.$getData['category_id']) ?>
    <div class="form-group">
            <label for="title">Nama Kategori</label>
            <input type="text" class="form-control" id="category_name" name="category_name" value="<?= $getData['category_name'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Edit Kategori</button>

    <?= form_close() ?>


<?= $this->endSection() ?>