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
                        Tambah Barang </h2>
                </div>
                <div class="body">
                    <?php echo form_open_multipart('upb/add_barang_fungsi') ?>
                    <form>

                        <label for="ruangan">Ruangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" data-toggle="modal" data-target="#defaultModalRuangan" name="ruangan"
                                    id="ruangan" placeholder="" class="form-control ui-autocomplete-input" value=""
                                    autocomplete="off" readonly>
                                <input type="hidden" id="id_ruangan" name="id_ruangan">
                                <input type="hidden" id="kode_lokasi" name="kode_lokasi">
                            </div>
                        </div>
                        <!-- <label for="subklasifikasi">Sub Klasifikasi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" data-toggle="modal" data-target="#defaultModalSubklasifikasi"
                                    name="subklasifikasi" id="subklasifikasi" placeholder=""
                                    class="form-control ui-autocomplete-input" value="" autocomplete="off" readonly>
                                <input type="hidden" id="id_subklasifikasi" name="id_subklasifikasi">
                                <input type="hidden" id="kode_barang" name="kode_barang">
                            </div>
                        </div> -->

                        <label for="jenis_barang">Jenis Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" data-toggle="modal" data-target="#defaultModalJenisbarang"
                                    name="jenis_barang" id="jenis_barang" placeholder=""
                                    class="form-control ui-autocomplete-input" value="" autocomplete="off" readonly>
                                <input type="hidden" id="id_jenis_barang" name="id_jenis_barang">
                            </div>
                        </div>

                        <label for="nama_barang">Nama Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_barang" name="nama_barang" class="form-control">
                            </div>
                        </div>

                        <label for="jumlah">Jumlah Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="jumlah_barang" name="jumlah_barang" class="form-control">
                            </div>
                        </div>

                        <label for="satuan">Satuan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="satuan" id="satuan" class="form-control" required>
                                    <option value="">--Pilih Satuan--</option>
                                    <?php
                                    foreach ($satuans as $satuan) : ?>
                                    <option value="<?php echo $satuan['satuan']; ?>">
                                        <?php echo $satuan['satuan']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <label for="spesifikasi_teknis">Spesifikasi Teknis</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="spesifikasi_teknis" name="spesifikasi_teknis"
                                    class="form-control">
                            </div>
                        </div>

                        <label for="serial_number">Serial Number</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="serial_number" name="serial_number" class="form-control">
                            </div>
                        </div>

                        <label for="model_number">Model Number</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="model_number" name="model_number" class="form-control">
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

                        <label for="harga_perolehan">Harga Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="harga_perolehan" name="harga_perolehan" class="form-control">
                            </div>
                        </div>

                        <label for="keadaan_barang">Keadaan Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="keadaan_barang" name="keadaan_barang" class="form-control">
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



                        <label for="nama">Foto Barang (jpg/png) max 2mb</label>
                        <div class="form-group">
                            <label for="exampleInputFile"></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto_barang" name="foto_barang">

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

    <!-- MODAL ADD RUANGAN -->
    <div class="modal fade" id="defaultModalRuangan" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Cari Ruangan</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                        width="100%">
                        <thead>
                            <tr>
                                <th>Kode Ruangan</th>
                                <th>Nama Ruangan</th>
                                <th class="hide">ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kode_bangunan  as $ru) : ?>

                            <tr>
                                <td style="text-align:center;" scope="row">
                                    <?= $ru['kode_bangunan'] ?>.<?= $ru['kode_ruangan'] ?>
                                </td>
                                <td><?= $ru['nama_ruangan']; ?></td>
                                <td class="hide"><?= $ru['id_ruangan']; ?></td>
                                <td style="text-align:center;">
                                    <button class="btn btn-sm btn-info" id="pilih"
                                        data-nama-ruangan="<?= $ru['nama_ruangan']; ?>"
                                        data-id-ruangan="<?= $ru['id_ruangan']; ?>"
                                        data-kode-lokasi="<?= $ru['kode_bangunan'] ?>.<?= $ru['kode_ruangan'] ?>">
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

    <!-- MODAL ADD SUBKLASIFIKASI -->
    <div class="modal fade" id="defaultModalSubklasifikasi" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Cari Subklasifikasi</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                        width="100%">
                        <thead>
                            <tr>
                                <th>Kode Subklasifikasi</th>
                                <th>Nama Subklasifikasi</th>
                                <th class="hide">ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($subklasifikasi  as $sk) : ?>

                            <tr>
                                <td style="text-align:center;" scope="row">
                                    <?= $sk['kode_gol'] ?>.<?= $sk['kode_klas'] ?>.<?= $sk['kode_subklasifikasi'] ?>
                                </td>
                                <td><?= $sk['keterangan']; ?></td>
                                <td class="hide"><?= $sk['id']; ?></td>
                                <td style="text-align:center;">
                                    <button class="btn btn-sm btn-info" id="pilih2"
                                        data-nama-subklasifikasi="<?= $sk['keterangan']; ?>"
                                        data-id-subklasifikasi="<?= $sk['id']; ?>"
                                        data-kode-barang="<?= $sk['kode_gol'] ?>.<?= $sk['kode_klas'] ?>.<?= $sk['kode_subklasifikasi'] ?>">
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

    <!-- MODAL ADD JENIS BARANG -->
    <div class="modal fade" id="defaultModalJenisbarang" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Cari Jenis Barang</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                        width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Barang</th>
                                <th class="hide">ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($jenisbarang  as $jb) : ?>

                            <tr>
                                <td style="text-align:center;" scope="row">
                                    <?= $i; ?>
                                </td>
                                <td><?= $jb['jenis_barang']; ?></td>
                                <td class="hide"><?= $jb['id_jenis_barang']; ?></td>
                                <td style="text-align:center;">
                                    <button class="btn btn-sm btn-info" id="pilih3"
                                        data-nama-jenisbarang="<?= $jb['jenis_barang']; ?>"
                                        data-id-jenisbarang="<?= $jb['id_jenis_barang']; ?>">
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

    <!-- MODAL ADD ASAL BARANG -->
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
                                <th>Kode Asal Barang</th>
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
                                    <?= $ab['kode_asal_barang']; ?>
                                </td>
                                <td><?= $ab['nama_asal_barang']; ?></td>
                                <td class="hide"><?= $ab['id_asal_barang']; ?></td>
                                <td style="text-align:center;">
                                    <button class="btn btn-sm btn-info" id="pilih4"
                                        data-keterangan="<?= $ab['nama_asal_barang']; ?>"
                                        data-id="<?= $ab['id_asal_barang']; ?>"
                                        data-kode="<?= $ab['kode_asal_barang']; ?>">
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
    $(document).on('click', '#pilih', function() {
        var nama_klas = $(this).data('nama-ruangan');
        var id = $(this).data('id-ruangan');
        var kode = $(this).data('kode-lokasi');
        $('#ruangan').val(nama_klas);
        $('#id_ruangan').val(id);
        $('#kode_lokasi').val(kode);
        $('#defaultModalRuangan').modal('hide');
    })
});

$(document).ready(function() {
    $(document).on('click', '#pilih2', function() {
        var nama_klas = $(this).data('nama-subklasifikasi');
        var id = $(this).data('id-subklasifikasi');
        var kode = $(this).data('kode-barang');
        $('#subklasifikasi').val(nama_klas);
        $('#id_subklasifikasi').val(id);
        $('#kode_barang').val(kode);
        $('#defaultModalSubklasifikasi').modal('hide');
    })
});

$(document).ready(function() {
    $(document).on('click', '#pilih3', function() {
        var nama_klas = $(this).data('nama-jenisbarang');
        var id = $(this).data('id-jenisbarang');
        $('#jenis_barang').val(nama_klas);
        $('#id_jenis_barang').val(id);
        $('#defaultModalJenisbarang').modal('hide');
    })
});

$(document).ready(function() {
    $(document).on('click', '#pilih4', function() {
        var nama_klas = $(this).data('keterangan');
        var id = $(this).data('id');
        $('#asal_barang').val(nama_klas);
        $('#id_asal_barang').val(id);
        $('#defaultModal').modal('hide');
    })
});
</script>