<?= $this->extend('_partial/Master') ?>
<?= $this->section('content') ?>

                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Produk</li>
                        </ol>
                    </nav>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kelola Produk</h6>
                        </div>
                        <?php if (session()->has('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session('success') ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Deskripsi Produk</th>
                                        <th scope="col">Harga Produk/pcs</th>
                                        <th scope="col">Stok Produk</th>
                                        <th scope="col">Kategori Produk</th>
                                        <th scope="col">Waktu Produksi</th>
                                        <th scope="col">Waktu Expired</th>
                                        <th scope="col">Aksi</th>                             
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($getData as $key => $data) : ?>
                                        <tr>
                                            <th scope="row"><?= $data['product_id'] ?></th>
                                            <td><?= $data['product_name'] ?></td>
                                            <td><?= $data['product_description'] ?></td>
                                            <td><?= $data['product_price'] ?></td>
                                            <td><?= $data['product_quantity'] ?></td>
                                            <td><?= $data['category'] ?></td>
                                            <td><?= $data['product_made'] ?></td>
                                            <td><?= $data['product_expired'] ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/product/edit/'.$data['product_id']) ?>" class="btn btn-outline-info btn-sm">Edit</a>
                                                <button class="btn btn-outline-danger btn-sm delete" data-uuid="<?= $data['product_id'] ?>" data-toggle="modal" data-target="#deleteModal">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach  ?>
                                    </tbody?>
                                </table>
                            </div>
                            <a href="<?= base_url('admin/product/add') ?>" class="btn btn-primary btn-sm">
                                <span class="text">Tambah Produk</span>
                            </a>
                        </div>
                    </div>
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Anda yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <button type="button" class="btn btn-danger btn-ok">Ya</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                $(document).on('click', '.delete', function () {
                    var uuid = $(this).data('uuid');
                    $(".btn-ok").attr("data-uuid", uuid);
                });

                $(document).on('click', '.btn-ok', function () {
                    var uuid = $(this).data('uuid');
                    $.ajax({
                        url: '<?= base_url('admin/product/delete') ?>/' + uuid,
                        type: 'DELETE',
                        success: function (data) {
                            if (data.success) {
                                alert("Data berhasil dihapus.");
                                location.reload();
                            } else {
                                alert("Data gagal dihapus.");
                            }
                        }
                    });
                });

                </script>

<?= $this->endSection() ?>