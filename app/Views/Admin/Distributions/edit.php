<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <?= form_open('admin/distribution/update/'.$data['distribution_id']) ?>

        <div class="form-group">
            <label for="title">Nama Kurir</label>
            <input type="text" class="form-control" id="driver_id" name="driver_id"  value="<?= $data['shop_name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Nama Produk</label>
            <input type="text" class="form-control" id="product_id" name="product_id" value="<?= $data['product_id'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Alamat Distribusi</label>
            <input type="text" class="form-control" id="distribution_destination" name="distribution_destination" value="<?= $data['distribution_destination'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Waktu Tanggal Distribusi</label>
            <input type="text" class="form-control" id="distribution_datetime" name="distribution_datetime" value="<?= $data['distribution_datetime'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Deskripsi Distribusi</label>
            <input type="text" class="form-control" id="distribution_description" name="distribution_description" value="<?= $data['distribution_description'] ?>" required>
        </div>
        <div class="form-group">
        <label for="status">Status Distribusi</label>
            <select class="form-control" id="distribution_progress" name="distribution_progress" value="<?= $data['distribution_progress'] ?>">
                <option value="diproses">Sedang Diproses</option>
                <option value="dalam_perjalanan">Dalam Perjalanan</option>
                <option value="diterima">Diterima</option>
                <option value="batal">Batal</option>
                <option value="dikembalikan">Dikembalikan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit Distribusi</button>

    <?= form_close() ?>


<?= $this->endSection() ?>