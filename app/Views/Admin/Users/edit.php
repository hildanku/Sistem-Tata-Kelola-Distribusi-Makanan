<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <?= form_open('admin/user/update/'.$data->id) ?>

    <div class="form-group">
            <label for="title">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $data->email ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Nama Lengkap</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $data->fullname ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $data->username ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Password</label>
            <input type="text" class="form-control" id="password_hash" name="password_hash" value="<?= $data->password_hash ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Status Akun</label>
            <input type="text" class="form-control" id="active" name="active" value="<?= $data->active ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Edit Pengguna</button>

    <?= form_close() ?>


<?= $this->endSection() ?>