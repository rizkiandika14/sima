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
                            Data Barang
                        </h2>




                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal"
                            data-target="#defaultModal"> <i class="material-icons">add</i> <span
                                class="icon-name"></i>Add Barang</button>


                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal"
                            data-target="#satuanModal"> <i class="material-icons">add</i> <span
                                class="icon-name"></i>Add Satuan</button>

                        <br>
                        <br>
                        <form action="<?= base_url('admin/import_excel'); ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Pilih File Excel</label>
                                <input type="file" name="fileExcel">
                            </div>
                            <div>
                                <button class='btn btn-info' type="submit">
                                    <!-- <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    Import -->
                                    <i class="material-icons">file_upload</i> <span class="icon-name"></i>Import Barang
                                </button>
                                </button>
                            </div>
                        </form>

                        <!-- <form action="<?= base_url('export/cetak_barang'); ?>" method="post"
                            enctype="multipart/form-data">
                            <div>
                                <button class='btn btn-primary waves-effect m-r-20' type="submit">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                    Export Pdf
                                </button>
                            </div>
                        </form> -->





                    </div>
                    <div class="body">
                        <form action="<?= base_url('export/cetak_barang'); ?>" method="post"
                            enctype="multipart/form-data">
                            <div>
                                <button class='btn btn-primary waves-effect m-r-20' type="submit">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                    Export Pdf
                                </button>
                            </div>
                        </form>
                        <br>
                        <div class="table-responsive">
                            <table
                                class="table table-bordered table-striped table-hover js-exportable-barang dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>

                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($barang as $brg) : ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?= $brg['nama_brg']; ?></td>

                                        <td>
                                            <div class="btn btn-sm btn-warning">
                                                <div class="demo-google-material-icon" data-toggle="modal"
                                                    data-target="#editModal<?= $brg['id']; ?>"> <i
                                                        class="material-icons">edit</i> <span
                                                        class="icon-name">Edit</span>
                                                </div>
                                            </div>
                                            <a class="btn btn-sm btn-danger waves-effect " data-type="success"
                                                href="<?= base_url() ?>admin/fungsi_delete/<?= $brg['id']; ?>"><span
                                                    class="fa fa-trash tombol-hapus"></span>
                                                Hapus</a>

                                            <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <p>A warning message, with a function attached to the <b>Confirm</b>
                                                    button...</p>
                                                <button class="btn btn-primary waves-effect" data-type="confirm">CLICK
                                                    ME</button>
                                            </div> -->




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
    foreach ($barang as $brg) : $no++; ?>
    <div class="modal fade" id="editModal<?= $brg['id']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Barang</h4>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('admin/fungsi_edit') ?>
                    <input type="hidden" name="id" value="<?= $brg['id']; ?>">
                    <div class="body">
                        <form class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nama">Nama Barang</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">

                                            <input type="text" id="nama_brg" name="nama_brg" class="form-control"
                                                value="<?= $brg['nama_brg']; ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-link waves-effect">SAVE
                                    CHANGES</button>
                                <button type="button" class="btn btn-link waves-effect"
                                    data-dismiss="modal">CLOSE</button>
                                <?php echo form_close() ?>

                            </div>
                    </div>
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
                    <h4 class="modal-title" id="defaultModalLabel">Add Barang</h4>
                </div>
                <form action="<?= base_url('admin/tambah_barang') ?>" method="post">
                    <div class="modal-body">
                        <?php echo form_open_multipart() ?>
                        <div class="body">
                            <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama">Nama Barang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_brg" name="nama_brg" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="modal-footer js-sweetalert">
                                    <button type="submit" id="tombol-tambah" class="btn btn-primary waves-effect"
                                        data-type="success">SAVE
                                        CHANGES</button>
                                    <button type="button" class="btn btn-link waves-effect"
                                        data-dismiss="modal">CLOSE</button>
                                    <?php echo form_close() ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL ADD -->
    <div class="modal fade" id="satuanModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Add Satuan</h4>
                </div>
                <form action="<?= base_url('admin/tambah_satuan') ?>" method="post">
                    <div class="modal-body">
                        <?php echo form_open_multipart() ?>
                        <div class="body">
                            <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="nama">Nama Satuan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="satuan" name="satuan" class="form-control"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="modal-footer js-sweetalert">
                                    <button type="submit" id="tombol-tambah" class="btn btn-primary waves-effect"
                                        data-type="success">SAVE
                                        CHANGES</button>
                                    <button type="button" class="btn btn-link waves-effect"
                                        data-dismiss="modal">CLOSE</button>
                                    <?php echo form_close() ?>
                                </div>
                            </form>
                        </div>
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