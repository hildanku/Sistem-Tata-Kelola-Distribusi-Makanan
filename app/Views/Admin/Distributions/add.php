<?php $this->extend('_partial/Master.php') ?>

<?= $this->section('content') ?>
    <form action="<?= base_url('admin/distribution/store') ?>" method="post">
        <div class="form-group">
        <label for="status">Nama Kurir</label>
            <select class="form-control" id="driver_id" name="driver_id">
                <?php foreach($getDrivers as $key => $data) : ?>
                <option value="<?= $data['driver_id'] ?>"><?= $data['driver_name'] ?></option>
                <?php endforeach   ?> 
            </select>
        </div>
        <div class="form-group">
        <label for="status">Nama Produk</label>
            <select class="form-control" id="product_id" name="product_id">
                <?php foreach($getProducts as $key => $data) : ?>
                <option value="<?= $data['product_id'] ?>"><?= $data['product_name'] ?></option>
                <?php endforeach   ?> 
            </select>
        </div>
        <div class="form-group">
            <div class="card">
                <div class="card-body bg-success text-white">
                <h5> Detail Produk</h5>
                <span> Harga :   <div id="product_price"></div> </span>
                <span> Jumlah Stock :   <div id="product_quantity"></div> </span>
                <span> Deskripsi :   <div id="product_description"></div> </span>
                </div>
            </div>
        </div>
               <!-- Error message display -->
        <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger" role="alert">
             <?= session('error') ?>
        </div>
        <?php endif ?>

        <div class="form-group">
            <label for="username">Jumlah Pembelian</label>
            <input type="number" class="form-control" id="purchase_amount" name="purchase_amount" required>
        </div>  
        <div class="form-group">
            <label for="username">Total Harga</label>
            <input type="text" class="form-control" id="pay_amount" name="pay_amount" disabled>
        </div>
        <div class="form-group">
            <label for="username">Alamat Distribusi</label>
            <input type="text" class="form-control" id="distribution_destination" name="distribution_destination" required>
        </div>
        <div class="form-group">
            <label for="username">Waktu Tanggal Distribusi</label>
            <input type="datetime-local" class="form-control" id="distribution_datetime" name="distribution_datetime" required>
        </div>
        <div class="form-group">
            <label for="username">Deskripsi Distribusi</label>
            <input type="text" class="form-control" id="distribution_description" name="distribution_description" required>
        </div>
        <div class="form-group">
        <label for="status">Status Distribusi</label>
            <select class="form-control" id="distribution_progress" name="distribution_progress">
                <option value="diproses">Sedang Diproses</option>
                <option value="dalam_perjalanan">Dalam Perjalanan</option>
                <option value="batal">Diterima</option>
                <option value="diterima">Batal</option>
                <option value="dikembalikan">Dikembalikan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Distribusi</button>
        
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
  $('#product_id').change(function() {
    var productId = $(this).val();
    $.ajax({
      url: '<?= base_url('admin/distribution/getProductData') ?>/' + productId,
      method: 'GET',
      dataType: 'json',
      success: function(response) {
        $('#product_price').html(response.product_price);
        $('#product_quantity').html(response.product_quantity);
        $('#product_description').html(response.product_description);
        // Melempar data lainnya ke elemen HTML yang sesuai
      }
    });
  });
});
</script>
<script>
$(document).ready(function() {
  $('#purchase_amount').on('input', function() {
    var purchaseAmount = $(this).val();
    var productPrice = $('#product_price').text();
    var totalPrice = purchaseAmount * productPrice;
    $('#pay_amount').val(totalPrice);
  });
});

</script>
<?= $this->endSection() ?>