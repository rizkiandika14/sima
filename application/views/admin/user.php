<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>

            </h2>
        </div>
        <!-- Basic Examples -->


        <?= $this->session->flashdata('message'); ?>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Data User
                        </h2>


                    </div>
                    <div class="body">

                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Divisi</th>
                                        <th>Active</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($user as $u) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?= $u['nama']; ?></td>
                                        <td><?= $u['email']; ?></td>
                                        <td><?= $u['contact']; ?></td>
                                        <td><?= $u['divisi']; ?></td>
                                        <td><?= $u['active']; ?></td>
                                        <td>

                                            <?php $this->session->set_userdata('referred_from', current_url()); ?>
                                            <a class="btn btn-sm btn-success"
                                                href="<?= base_url() ?>user/active/<?= $u['id']; ?>"><span
                                                    class="fa fa-trash"></span>
                                                Active</a>
                                            <?php $this->session->set_userdata('referred_from', current_url()); ?>


                                            <a class="btn btn-sm btn-danger"
                                                href="<?= base_url() ?>user/inactive/<?= $u['id']; ?>"><span
                                                    class="fa fa-trash"></span>
                                                Inactive</a>


                                        </td>


                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
    <!-- Button trigger modal -->





</section>

<script>
$('#tombol-tambah').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        icon: 'success',
        title: 'Added',
        text: 'Data added'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

})
</script>