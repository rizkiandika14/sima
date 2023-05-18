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
                        Tambah Bangunan </h2>
                </div>
                <div class="body">
                    <?php echo form_open_multipart('admin/add_bangunan_fungsi') ?>
                    <form>

                        <label for="lahan">Lahan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <select name="lahan" id="lahan" class="form-control" required>
                                    <option value="">--Pilih Lahan--</option>
                                    <?php
                                    foreach ($lahans as $lahan) : ?>
                                    <option value="<?php echo $lahan['id_lahan']; ?>">
                                        <?php echo $lahan['nama_lahan']; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <label for="subklasifikasi">Sub Klasifikasi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" data-toggle="modal" data-target="#defaultModalSubklasifikasi"
                                    name="subklasifikasi" id="subklasifikasi" placeholder=""
                                    class="form-control ui-autocomplete-input" value="" autocomplete="off" readonly>
                                <input type="text" id="id_subklasifikasi" name="id_subklasifikasi">
                                <input type="text" id="kode_barang" name="kode_barang">
                            </div>
                        </div>

                        <label for="tanggal_pembukuan">Tanggal Pembukuan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan" class="form-control">
                            </div>
                        </div>

                        <label for="kode_bangunan">Kode Bangunan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="kode_bangunan" name="kode_bangunan" class="form-control">
                            </div>
                        </div>

                        <label for="nama_bangunan">Nama Bangunan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control">
                            </div>
                        </div>

                        <label for="luas_bangunan">Luas Bangunan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="luas_bangunan" name="luas_bangunan" class="form-control">
                            </div>
                        </div>

                        <label for="asal_barang">Asal Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" data-toggle="modal" data-target="#defaultModal" name="asal_barang"
                                    id="asal_barang" placeholder="" class="form-control ui-autocomplete-input" value=""
                                    autocomplete="off" readonly>
                                <input type="hidden" id="id_asal_barang" name="id_asal_barang" value="">
                                <input type="hidden" id="kode_asal_barang" name="kode_asal_barang" value="">
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


                        <label for="kapasitas_internet">Kapasitas Internet</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="kapasitas_internet" name="kapasitas_internet"
                                    class="form-control">
                            </div>
                        </div>


                        <label for="keterangan">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="keterangan" name="keterangan" class="form-control">
                            </div>
                        </div>



                        <label for="nama">Foto Bangunan (jpg/png) max 2mb</label>
                        <div class="form-group">
                            <label for="exampleInputFile"></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto_bangunan"
                                        name="foto_bangunan">

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
                                <td><?= $sk['keterangan_subklas']; ?></td>
                                <td class="hide"><?= $sk['id']; ?></td>
                                <td style="text-align:center;">
                                    <button class="btn btn-sm btn-info" id="pilih2"
                                        data-nama-subklasifikasi="<?= $sk['keterangan_subklas']; ?>"
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
                                    <button class="btn btn-sm btn-info" id="pilih"
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
</section>

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '#pilih', function() {
        var nama_klas = $(this).data('keterangan');
        var id = $(this).data('id');
        var kode = $(this).data('kode');
        $('#asal_barang').val(nama_klas);
        $('#kode_asal_barang').val(kode);
        $('#id_asal_barang').val(id);
        $('#defaultModal').modal('hide');
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
</script>