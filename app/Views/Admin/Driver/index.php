<?= $this->extend('_partial/Master') ?>

<?= $this->section('content') ?>
<div class="row">
                    <div class="container-fluid">
                    <a href="<?= base_url('admin/customer/add') ?>" class="btn btn-outline-primary">Add</a>
                    </div>
                </div>
                <br>
                   <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kurir</th>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>                             
                    </tr>
                </thead>
                <tbody>
                         <?php foreach($getData as $key => $data) : ?>
                            <tr>
                                <th scope="row"><?= $data['driver_id'] ?></th>
                                <td><?= $data['driver_name'] ?></td>
                                <td><?= $data['driver_phone'] ?></td>
                                <td><?= $data['driver_email'] ?></td>
                                <td><?= $data['driver_status'] ?></td>   
                                <td>
                                    <a href="<?= base_url('admin/customer/edit/'.$data['driver_id']) ?>" class="btn btn-outline-info btn-sm">Edit</a>
                                    <button class="btn btn-outline-danger btn-sm delete" data-uuid="<?= $data['driver_id'] ?>" data-toggle="modal" data-target="#deleteModal">
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
                        url: '<?= base_url('admin/driver/delete') ?>/' + uuid,
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