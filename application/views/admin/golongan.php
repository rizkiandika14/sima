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
                            Data Golongan
                        </h2>

                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                 Launch demo modal
                            </button> -->


                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal"
                            data-target="#defaultModal"> <i class="material-icons">add</i> <span
                                class="icon-name"></i>Add data</button>










                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                                id="example">
                                <thead>
                                    <tr>

                                        <th>Kode</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Kode</th>
                                        <th>Lantai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php

                                    foreach ($golongan as $gol) : ?>
                                    <tr>

                                        <td><?= $gol['kode_gol']; ?></td>
                                        <td><?= $gol['keterangan']; ?></td>
                                        <td>
                                            <div class="btn btn-sm btn-warning">
                                                <div class="demo-google-material-icon" data-toggle="modal"
                                                    data-target="#editModal<?= $gol['id_golongan']; ?>"> <i
                                                        class="material-icons"></i> <span class="icon-name">Edit</span>
                                                </div>
                                            </div>
                                            <a class="btn btn-sm btn-danger waves-effect " data-type="success"
                                                href="<?= base_url() ?>upb/fungsi_delete_golongan/<?= $gol['id_golongan']; ?>"><span
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
    <!-- Button trigger modal -->


    <!-- MODAL  edit -->
    <?php
    $no = 0;
    foreach ($golongan as $gol) : $no++; ?>
    <div class="modal fade" id="editModal<?= $gol['id_golongan']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Asal Barang</h4>
                </div>

                <div class="modal-body">
                    <?= form_open_multipart('upb/fungsi_edit_golongan') ?>
                    <input type="hidden" name="id_golongan" value="<?= $gol['id_golongan']; ?>">
                    <div class="body">
                        <form class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Kode</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="kode" name="kode" class="form-control"
                                                value="<?= $gol['kode']; ?>" placeholder="">
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
                                                value="<?= $gol['keterangan']; ?>" placeholder="">
                                        </div>
                                    </div>
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
                    <h4 class="modal-title" id="defaultModalLabel">Add Golongan</h4>
                </div>
                <form action="<?= base_url('upb/tambah_golongan') ?>" method="post">
                    <div class="modal-body">
                        <?php echo form_open_multipart() ?>
                        <div class="body">
                            <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Kode</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="kode" name="kode" class="form-control"
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
                                                <input type="text" id="keterangan" name="keterangan"
                                                    class="form-control" placeholder="">
                                            </div>
                                        </div>
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

            </form>
        </div>
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