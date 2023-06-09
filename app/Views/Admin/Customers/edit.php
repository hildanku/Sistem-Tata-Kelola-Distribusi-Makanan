<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <?= form_open('admin/customer/update/'.$data['id']) ?>

    <div class="form-group">
            <label for="title">Nama Toko</label>
            <input type="text" class="form-control" id="shop_name" name="shop_name"  value="<?= $data['shop_name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Nama Pemilik Toko</label>
            <input type="text" class="form-control" id="shop_owner" name="shop_owner" value="<?= $data['shop_owner'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Alamat Toko</label>
            <input type="text" class="form-control" id="shop_address" name="shop_address" value="<?= $data['shop_address'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Nomor HP</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $data['phone_number'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $data['email'] ?>" required>
        </div>
        <div class="form-group">
        <label for="status">Status</label>
            <select class="form-control" id="status" name="status" value="<?= $data['status'] ?>">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit Pelanggan</button>

    <?= form_close() ?>


<?= $this->endSection() ?>