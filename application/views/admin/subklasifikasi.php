<section class="content">
    <div class="container-fluid">
        <div class="block-header">


        </div>

        <!-- jQuery UI CSS -->
        <link rel="stylesheet"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <?= $this->session->flashdata('message'); ?>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Form Input Sub Klasifikasi</h2>
                </div>
                <div class="body">

                    <form method="post" action="<?= base_url('admin/add_subklasifikasi'); ?>">
                        <input type="text" data-toggle="modal" data-target="#defaultModal" name="nama_klasifikasi"
                            id="nama_klasifikasi" placeholder="Klasifikasi" class="form-control ui-autocomplete-input"
                            value="" autocomplete="off" readonly>
                        <br>

                        <input type="hidden" name="id_klasifikasi" id="id_klasifikasi" placeholder="id klasifikasi"
                            class="form-control ui-autocomplete-input" value="" autocomplete="off" readonly>
                        <br>

                        <input type="text" name="kode" id="kode" placeholder="Kode"
                            class="form-control ui-autocomplete-input" value="" autocomplete="off">
                        <br>
                        <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan"
                            class="form-control ui-autocomplete-input" value="" autocomplete="off">



                        <div class="js-sweetalert">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect"
                                data-type="with-custom-icon">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--  -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Data Sub Klasifikasi
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>Kode Klasifikasi</th>
                                        <th>Klasifikasi</th>
                                        <th>Kode Sub Klasifikasi</th>
                                        <th>Sub Klasifikasi</th>
                                        <th>Aksi</th>
                                    </tr>

                                </thead>
                                <tfoot>
                                    <th>Kode Klasifikasi</th>
                                    <th>Klasifikasi</th>
                                    <th>Kode Sub Klasifikasi</th>
                                    <th>Sub Klasifikasi</th>
                                    <th>Aksi</th>
                                </tfoot>



                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($subklasifikasi as $klas) : ?>


                                    <tr>
                                        <td><?= $klas['kode_klas']; ?></td>
                                        <td><?= $klas['keterangan_klas']; ?></td>
                                        <td><?= $klas['kode_subklasifikasi']; ?></td>
                                        <td><?= $klas['keterangan']; ?></td>
                                        <td>
                                            <div class="btn btn-sm btn-warning">
                                                <div class="demo-google-material-icon" data-toggle="modal"
                                                    data-target="#editModal<?= $klas['id']; ?>"> <i
                                                        class="material-icons"></i> <span class="icon-name">Edit</span>
                                                </div>
                                            </div>
                                            <a class="btn btn-sm btn-danger waves-effect " data-type="success"
                                                href="<?= base_url() ?>admin/fungsi_delete_subklasifikasi/<?= $klas['id']; ?>"><span
                                                    class="fa fa-trash tombol-hapus"></span>
                                                Hapus</a>


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
</section>

<!-- MODAL  edit -->
<?php
$no = 0;
foreach ($subklasifikasi as $klas) : $no++; ?>
<div class="modal fade" id="editModal<?= $klas['id']; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Edit Sub Klasifikasi</h4>
            </div>

            <div class="modal-body">
                <?= form_open_multipart('admin/fungsi_edit_subklasifikasi') ?>
                <input type="hidden" id="id" name="id" value="<?= $klas['id']; ?>">
                <div class="body">
                    <form class="form-horizontal">


                        <input type="hidden" id="id_klasifikasi" name="id_klasifikasi" class="form-control"
                            value="<?= $klas['id_klasifikasi']; ?>" readonly>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Kode Klasifikasi</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="kode_klas" name="kode_klas" class="form-control"
                                            value="<?= $klas['kode_klas']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Klasifikasi</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="keterangan_klas" name="keterangan_klas"
                                            class="form-control" value="<?= $klas['keterangan_klas']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Kode</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="kode_subklasifikasi" name="kode_subklasifikasi"
                                            class="form-control" value="<?= $klas['kode_subklasifikasi']; ?>"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">Keterangan</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="keterangan" name="keterangan" class="form-control"
                                            value="<?= $klas['keterangan']; ?>" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="modal-footer js-sweetalert">
                            <button type="submit" class="btn btn-link waves-effect" data-type="success">SAVE
                                CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <?php echo form_close() ?>
                        </div>
                </div>
                </form>
            </div>


        </div>
    </div>
</div>
<?php endforeach ?>

<!-- MODAL ADD -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Cari KLasifikasi</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover dataTable js-basic-example" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Klasifikasi</th>
                            <th class="hide">ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($klasifikasi  as $k) : ?>

                        <tr>
                            <td style="text-align:center;" scope="row">
                                <?= $i; ?>
                            </td>
                            <td><?= $k['keterangan_klas']; ?></td>
                            <td class="hide"><?= $k['id']; ?></td>
                            <td style="text-align:center;">
                                <button class="btn btn-sm btn-info" id="pilih"
                                    data-keterangan="<?= $k['keterangan_klas']; ?>" data-id="<?= $k['id']; ?>">
                                    Pilih</button>
                            </td>
                        </tr>
                        <?php $i++; ?>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '#pilih', function() {
        var nama_klas = $(this).data('keterangan');
        var id = $(this).data('id');
        $('#nama_klasifikasi').val(nama_klas);
        $('#id_klasifikasi').val(id);
        $('#defaultModal').modal('hide');
    })
});
</script>


<script>
$('.tombol-tambah').on('click', function(e) {

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