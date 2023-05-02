<section class="content">
    <div class="container-fluid">
        <div class="block-header">


        </div>

        <!-- jQuery UI CSS -->
        <link rel="stylesheet"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Form Input Klasifikasi</h2>
                </div>
                <div class="body">

                    <form method="post" action="<?= base_url('upb/add_klasifikasi'); ?>">
                        <input type="text" data-toggle="modal" data-target="#defaultModal" name="keterangan"
                            id="keterangan" placeholder="Golongan" class="form-control ui-autocomplete-input" value=""
                            autocomplete="on">
                        <br>

                        <input type="hidden" name="golongan_id" id="golongan_id" placeholder="id golongan"
                            class="form-control ui-autocomplete-input" value="" autocomplete="off" readonly>
                        <br>

                        <input type="text" name="kode" id="kode" placeholder="Kode"
                            class="form-control ui-autocomplete-input" value="" autocomplete="off">
                        <br>
                        <input type="text" name="keterangan" id="keterangan" placeholder="Keterangan"
                            class="form-control ui-autocomplete-input" value="" autocomplete="off">



                        <div class="js-sweetalert">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect"
                                data-type="with-custom-icon">Proses</button>
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
                            Data Klasifikasi
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Golongan</th>
                                        <th>Kode Klasifikasi</th>
                                        <th>Klasifikasi</th>
                                        <th>Aksi</th>
                                    </tr>

                                </thead>
                                <tfoot>
                                    <th>No</th>
                                    <th>Golongan</th>
                                    <th>Kode Klasifikasi</th>
                                    <th>Klasifikasi</th>
                                    <th>Aksi</th>
                                </tfoot>



                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($klasifikasi as $klas) : ?>


                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?= $klas['keterangan']; ?></td>
                                        <td><?= $klas['kode_klas']; ?></td>
                                        <td><?= $klas['keterangan_klas']; ?></td>
                                        <td>

                                            <a class="btn btn-sm btn-danger waves-effect " data-type="success"
                                                href="<?= base_url() ?>admin/fungsi_delete_klasifikasi/<?= $klas['id']; ?>"><span
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

<!-- MODAL ADD -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Cari Golongan</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover dataTable js-basic-example" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Golongan</th>
                            <th class="hide">ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($golongan  as $k) : ?>

                        <tr>
                            <td style="text-align:center;" scope="row">
                                <?= $i; ?>
                            </td>
                            <td><?= $k['keterangan']; ?></td>
                            <td class="hide"><?= $k['id_golongan']; ?></td>
                            <td style="text-align:center;">
                                <button class="btn btn-sm btn-info" id="pilih"
                                    data-keterangan="<?= $k['keterangan']; ?>" data-id="<?= $k['id_golongan']; ?>">
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
        var nama_golongan = $(this).data('keterangan');
        var id = $(this).data('id');
        $('#keterangan').val(nama_golongan);
        $('#golongan_id').val(id);
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