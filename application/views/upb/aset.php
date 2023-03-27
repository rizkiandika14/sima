<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>

            </h2>
        </div>
        <!-- Basic Examples -->

        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Data Asset
                        </h2>

                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                 Launch demo modal
                            </button> -->

                        <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal"
                            data-target="#defaultModal"> <i class="material-icons">add</i> <span
                                class="icon-name"></i>Add Asset</button>




                        </button>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
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
                                                        class="material-icons">edit</i> <span class="icon-name"></span>
                                                </div>
                                            </div>
                                            <a class="btn btn-sm btn-danger tombol-hapus"
                                                href="<?= base_url() ?>admin/fungsi_delete/<?= $brg['id']; ?>"><span
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

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                                    <button type="button" class="btn btn-link waves-effect"
                                        data-dismiss="modal">CLOSE</button>
                                    <?php echo form_close() ?>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>