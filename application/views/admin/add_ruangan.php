<section class="content">
    <div class="container-fluid">
        <div class="block-header">


        </div>

        <!-- jQuery UI CSS -->
        <link rel="stylesheet"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <?= $this->session->flashdata('message'); ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Tambah Ruangan </h2>
                </div>
                <div class="body">
                    <?php echo form_open_multipart('admin/add_ruangan_fungsi') ?>
                    <form>

                        <label for="bangunan">Bangunan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" data-toggle="modal" data-target="#defaultModalGedung" name="bangunan"
                                    id="bangunan" placeholder="" class="form-control ui-autocomplete-input" value=""
                                    autocomplete="off" readonly>
                                <input type="hidden" id="id_bangunan" name="id_bangunan">
                                <input type="hidden" id="kode_bangunan" name="kode_bangunan">
                            </div>
                        </div>

                        <label for="tanggal_pembukuan">Tanggal Pembukuan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan" class="form-control">
                            </div>
                        </div>

                        <label for="kode_ruangan">Kode Ruangan (3 digit)</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="kode_ruangan" name="kode_ruangan" class="form-control">
                            </div>
                        </div>

                        <label for="nama_ruangan">Nama Ruangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control">
                            </div>
                        </div>

                        <label for="luas_ruangan">Luas Ruangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="luas_ruangan" name="luas_ruangan" class="form-control">
                            </div>
                        </div>

                        <label for="asal_barang">Asal Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" data-toggle="modal" data-target="#defaultModal" name="asal_barang"
                                    id="asal_barang" placeholder="" class="form-control ui-autocomplete-input" value=""
                                    autocomplete="off" readonly>
                                <input type="hidden" id="id_asal_barang" name="id_asal_barang">
                            </div>
                        </div>

                        <label for="tahun_perolehan">Tahun Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="tahun_perolehan" name="tahun_perolehan" class="form-control">
                            </div>
                        </div>

                        <label for="tanggal_perolehan">Tanggal Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="tanggal_perolehan" name="tanggal_perolehan" class="form-control">
                            </div>
                        </div>

                        <label for="peruntukan">Peruntukan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="peruntukan" name="peruntukan" class="form-control">
                            </div>
                        </div>


                        <label for="keterangan">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="keterangan" name="keterangan" class="form-control">
                            </div>
                        </div>



                        <label for="nama">Foto Lahan (jpg/png) max 2mb</label>
                        <div class="form-group">
                            <label for="exampleInputFile"></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto_ruangan" name="foto_ruangan">

                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">TAMBAH</button>
                    </form>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>

    </div>

    <!-- MODAL ADD GEDUNG-->
    <div class="modal fade" id="defaultModalGedung" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Cari Gedung</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                        width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Bangunan</th>
                                <th>Nama Bangunan</th>
                                <th class="hide">ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($bangunans  as $bgn) : ?>

                            <tr>
                                <td style="text-align:center;" scope="row">
                                    <?= $i; ?>
                                </td>
                                <td><?= $bgn['kode_bangunan']; ?></td>
                                <td><?= $bgn['nama_bangunan']; ?></td>
                                <td class="hide"><?= $bgn['id_bangunan']; ?></td>
                                <td style="text-align:center;">
                                    <button class="btn btn-sm btn-info" id="pilih-bangunan"
                                        data-kode-bangunan="<?= $bgn['kode_bangunan']; ?>"
                                        data-nama-bangunan="<?= $bgn['nama_bangunan']; ?>"
                                        data-id-bangunan="<?= $bgn['id_bangunan']; ?>">
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

    <!-- MODAL ADD -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Cari Asal Barang</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                        width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asal Barang</th>
                                <th class="hide">ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($asal_barang  as $ab) : ?>

                            <tr>
                                <td style="text-align:center;" scope="row">
                                    <?= $i; ?>
                                </td>
                                <td><?= $ab['nama_asal_barang']; ?></td>
                                <td class="hide"><?= $ab['id_asal_barang']; ?></td>
                                <td style="text-align:center;">
                                    <button class="btn btn-sm btn-info" id="pilih"
                                        data-keterangan="<?= $ab['nama_asal_barang']; ?>"
                                        data-id="<?= $ab['id_asal_barang']; ?>">
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
</section>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '#pilih-bangunan', function() {
        var nama_klas = $(this).data('nama-bangunan');
        var id = $(this).data('id-bangunan');
        var kode = $(this).data('kode-bangunan');
        $('#bangunan').val(nama_klas);
        $('#id_bangunan').val(id);
        $('#kode_bangunan').val(kode);
        $('#defaultModalGedung').modal('hide');
    })
});

$(document).ready(function() {
    $(document).on('click', '#pilih', function() {
        var nama_klas = $(this).data('keterangan');
        var id = $(this).data('id');
        $('#asal_barang').val(nama_klas);
        $('#id_asal_barang').val(id);
        $('#defaultModal').modal('hide');
    })
});
</script>