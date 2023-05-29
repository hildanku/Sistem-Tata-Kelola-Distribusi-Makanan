<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <?= form_open('admin/product/update/'.$data['product_id']) ?>

    <div class="form-group">
            <label for="title">Nama Produk</label>
            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $data['product_name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Deskripsi Produk</label>
            <input type="text" class="form-control" id="product_description" name="product_description" value="<?= $data['product_description'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Harga Produk/pcs</label>
            <input type="text" class="form-control" id="product_price" name="product_price" value="<?= $data['product_price'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Stok Produk</label>
            <input type="text" class="form-control" id="product_quantity" name="product_quantity" value="<?= $data['product_quantity'] ?>" required>
        </div>

        <div class="form-group">
        <label for="status">Kategori Produk</label>
            <select class="form-control" id="category_id" name="category_id" value="<?= $data['category_id'] ?>">
              <?php foreach($getCategory as $key => $cat) : ?>
                <option value="<?= $cat['category_id'] ?>"><?= $cat['category_name'] ?></option>
                <?php endforeach  ?> 
            </select>
        </div>

        <div class="form-group">
            <label for="username">Waktu Produksi</label>
            <input type="datetime-local" class="form-control" id="product_made" name="product_made" value="<?= $data['product_made'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Waktu Expired</label>
            <input type="datetime-local" class="form-control" id="product_expired" name="product_expired" value="<?= $data['product_expired'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Edit Produk</button>

    <?= form_close() ?>


<?= $this->endSection() ?>