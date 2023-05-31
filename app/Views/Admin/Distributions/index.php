<?= $this->extend('_partial/Master') ?>

<?= $this->section('content') ?>
<div class="row">
                    <div class="container-fluid">
                    <a href="<?= base_url('admin/distribution/add') ?>" class="btn btn-outline-primary">Add</a>
                    </div>
                </div>
                <br>
                   <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kurir</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Total Pembelian</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Alamat Distribusi</th>
                        <th scope="col">Deskripsi Distribusi</th>
                        <th scope="col">Status Distribusi</th>     
                        <th scope="col">Waktu/Tanggal Distribusi</th>
                        <!-- <th scope="col">Waktu Tiba</th> -->
                        <th scope="col">Aksi</th>                             
                    </tr>
                </thead>
                <tbody>
                         <?php foreach($getData as $key => $data) : ?>
                            <tr>
                                <th scope="row"><?= $data['distribution_id'] ?></th>
                                <td>
                                    <?php foreach ($getDrivers as $driver) : ?>
                                        <?php if ($driver['driver_id'] === $data['driver_id']) : ?>
                                            <?= $driver['driver_name'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php foreach ($getProducts as $product) : ?>
                                        <?php if ($product['product_id'] === $data['product_id']) : ?>
                                            <?= $product['product_name'] ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td><?= $data['purchase_amount'] ?></td>
                                <td><?= $data['pay_amount'] ?></td>
                                <td><?= $data['distribution_destination'] ?></td>
                                <td><?= $data['distribution_description'] ?></td>
                                <td><?= $data['distribution_progress'] ?></td>
                                <td><?= $data['distribution_datetime'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/distribution/edit/'.$data['distribution_id']) ?>" class="btn btn-outline-info btn-sm">Edit</a>
                                    <button class="btn btn-outline-danger btn-sm delete" data-uuid="<?= $data['distribution_id'] ?>" data-toggle="modal" data-target="#deleteModal">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach   ?>
                </tbody>
                </table>
                <!---                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabele" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit data //</h5>
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
                                </div> -->

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
                        url: '<?= base_url('admin/distribution/delete') ?>/' + uuid,
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