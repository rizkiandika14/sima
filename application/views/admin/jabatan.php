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
                            Data Jabatan
                        </h2>
                        <br>
                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal"
                            data-target="#defaultModal"> <i class="material-icons">add</i> <span
                                class="icon-name"></i>Add
                                Data</button>
                    </div>
                    <div class="body">


                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Divisi / Bagian</th>
                                        <th>Nama Ketua Bagian</th>
                                        <th>Foto Tanda Tangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($jabatan as $u) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?= $u['nama_divisi']; ?></td>
                                        <td><?= $u['nama_ketua']; ?></td>
                                        <td> <img src="<?= "assets/img/ttd_ketua/" . $u['ttd']; ?>" width="50"
                                                height="50" alt="Image"></td>
                                        <td>
                                            <?php $this->session->set_userdata('referred_from', current_url()); ?>
                                            <div class="btn btn-sm btn-warning">
                                                <div class="demo-google-material-icon" data-toggle="modal"
                                                    data-target="#editModal<?= $u['id_jabatan']; ?>"> <i
                                                        class="material-icons"></i> <span class="icon-name">Edit</span>
                                                </div>
                                            </div>




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


    <!-- Modals Edit -->
    <?php
    $no = 0;
    foreach ($jabatan as $u) : $no++; ?>
    <div class="modal fade" id="editModal<?= $u['id_jabatan']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Data</h4>
                </div>

                <div class="modal-body">
                    <?= form_open_multipart('admin/fungsi_edit_jabatan') ?>
                    <input type="hidden" id="id_jabatan" name="id_jabatan" value="<?= $u['id_jabatan']; ?>">
                    <div class="body">
                        <form class="form-horizontal">
                            <label for="Nama Divisi">Nama Divisi :</label>

                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nama_divisi" name="nama_divisi" class="form-control"
                                        value="<?= $u['nama_divisi'] ?>">
                                </div>
                            </div>


                            <label for="Nama Ketua">Nama Ketua Divisi :</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="nama_ketua" name="nama_ketua" class="form-control"
                                        value="<?= $u['nama_ketua'] ?>">
                                </div>
                            </div>



                            <label for="nama">Foto Tanda Tangan (jpg/png) max 2mb :</label>
                            <div class="form-group">
                                <img src="<?= base_url('assets/img/ttd_ketua/') . $u['ttd']; ?>" width="50" height="50"
                                    class="img-thumbnail">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="ttd" name="ttd">

                                </div>
                            </div>





                            <div class="modal-footer js-sweetalert">
                                <button type="submit" class="btn btn-link waves-effect" data-type="success">SAVE
                                    CHANGES</button>
                                <button type="button" class="btn btn-link waves-effect"
                                    data-dismiss="modal">CLOSE</button>
                                <?php echo form_close() ?>
                            </div>
                    </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <?php endforeach ?>

    <!-- Modals ADD -->

    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Add Data</h4>
                </div>
                <?php echo form_open_multipart('admin/add_jabatan') ?>
                <form>
                    <div class="modal-body">

                        <div class="body">
                            <form class="form-horizontal">
                                <label for="Nama Divisi">Nama Divisi :</label>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_divisi" name="nama_divisi" class="form-control"
                                    placeholder="">
                            </div>
                        </div>


                        <label for="Nama Ketua">Nama Ketua Divisi :</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_ketua" name="nama_ketua" class="form-control"
                                    placeholder="">
                            </div>
                        </div>



                        <label for="nama">Foto Tanda Tangan (jpg/png) max 2mb :</label>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="ttd" name="ttd">

                            </div>
                        </div>


                        <div class="modal-footer js-sweetalert">
                            <button type="submit" class="btn btn-link waves-effect" data-type="success">SAVE
                                CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>

                        </div>
                    </div>
                </form>
                <?php echo form_close() ?>
            </div>

            </form>
        </div>
    </div>




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