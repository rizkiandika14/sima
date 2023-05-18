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
                            Data Jenis Barang
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
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable-barang"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($jenis_barang as $jnsb) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $jnsb['jenis_barang']; ?></td>
                                        <td>
                                            <div class="btn btn-sm btn-warning">
                                                <div class="demo-google-material-icon" data-toggle="modal"
                                                    data-target="#editModal<?= $jnsb['id_jenis_barang']; ?>"> <i
                                                        class="material-icons"></i> <span class="icon-name">Edit</span>
                                                </div>
                                            </div>
                                            <a class="btn btn-sm btn-danger waves-effect " data-type="success"
                                                href="<?= base_url() ?>admin/fungsi_delete_jenis_barang/<?= $jnsb['id_jenis_barang']; ?>"><span
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
    foreach ($jenis_barang as $jnsb) : $no++; ?>
    <div class="modal fade" id="editModal<?= $jnsb['id_jenis_barang']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Asal Barang</h4>
                </div>

                <div class="modal-body">
                    <?= form_open_multipart('admin/fungsi_edit_jenis_barang') ?>
                    <input type="hidden" id="id_jenis_barang" name="id_jenis_barang"
                        value="<?= $jnsb['id_jenis_barang']; ?>">
                    <div class="body">
                        <form class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Jenis Barang</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="jenis_barang" name="jenis_barang"
                                                class="form-control" value="<?= $jnsb['jenis_barang']; ?>"
                                                placeholder="">
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
                    <h4 class="modal-title" id="defaultModalLabel">Add Asal Barang</h4>
                </div>
                <form action="<?= base_url('admin/tambah_jenis_barang') ?>" method="post">
                    <div class="modal-body">
                        <?php echo form_open_multipart() ?>
                        <div class="body">
                            <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Jenis Barang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jenis_barang" name="jenis_barang"
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