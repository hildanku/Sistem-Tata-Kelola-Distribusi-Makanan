<?= $this->extend('_partial/Master') ?>
<?= $this->section('content') ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Konfigurasi Website</h6>
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
                                    <th scope="col">#</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Nama Website</th>
                                        <th scope="col">Judul Website</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Aksi</th>          
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($config !== null) : ?>
                                        <tr>
                                            <th scope="row">#<?= $config['id'] ?></th>
                                            <td><?= $config['app_logo'] ?></td>
                                            <td><?= $config['app_name'] ?></td>
                                            <td><?= $config['app_title'] ?></td>
                                            <td><?= $config['description'] ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/webconfig/edit/'.$config['id']) ?>" class="btn btn-outline-info btn-sm">Edit</a>
                                            </td>
                                        </tr>
                                   <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
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
                        url: '<?= base_url('webconfig/delete') ?>/' + uuid,
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