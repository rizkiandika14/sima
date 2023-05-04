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
                        Edit Bangunan </h2>
                </div>
                <div class="body">


                    <?php $this->session->set_userdata('referred_from', current_url()); ?>

                    <?php foreach ($detail_bangunan as $bangunans) : ?>
                    <?php echo form_open_multipart('admin/fungsi_edit_bangunan'); ?>
                    <input type="hidden" id="id_bangunan" name="id_bangunan" class="form-control"
                        value="<?= $bangunans['id_bangunan']; ?>">

                    <label for="nama_lahan">Lahan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <select name="id_lahan" id="id_lahan" class="form-control" required>
                                <option value="<?php echo $bangunans['id_lahan']; ?>">
                                    <?php echo $bangunans['nama_lahan']; ?></option>
                                <?php
                                    foreach ($nama_lahan as $lahan) : ?>
                                <option value="<?php echo $lahan['id_lahan']; ?>">
                                    <?php echo $lahan['nama_lahan']; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>


                    <label for="tanggal_pembukuan">Tanggal Pembukuan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan" class="form-control"
                                value="<?= $bangunans['tanggal_pembukuan']; ?>">
                        </div>
                    </div>

                    <label for="kode_bangunan">Kode Bangunan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" id="kode_bangunan" name="kode_bangunan" class="form-control"
                                value="<?= $bangunans['kode_bangunan']; ?>">
                        </div>
                    </div>

                    <label for="nama_bangunan">Nama Bangunan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control"
                                value="<?= $bangunans['nama_bangunan']; ?>">
                        </div>
                    </div>




                    <label for="luas_bangunan">Luas Bangunan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" id="luas_bangunan" name="luas_bangunan" class="form-control"
                                value="<?= $bangunans['luas_bangunan']; ?>">
                        </div>
                    </div>

                    <label for="asal_barang">Asal Barang</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" data-toggle="modal" data-target="#defaultModal" name="asal_barang"
                                id="asal_barang" placeholder="" class="form-control ui-autocomplete-input"
                                value="<?= $bangunans['nama_asal_barang']; ?>" autocomplete="off">
                            <input type="hidden" id="id_asal_barang" name="id_asal_barang"
                                value="<?= $bangunans['id_asal_barang']; ?>">
                        </div>
                    </div>

                    <label for="tahun_perolehan">Tahun Perolehan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" id="tahun_perolehan" name="tahun_perolehan" class="form-control"
                                value="<?= $bangunans['tahun_perolehan']; ?>">
                        </div>
                    </div>

                    <label for="tanggal_perolehan">Tanggal Perolehan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="date" id="tanggal_perolehan" name="tanggal_perolehan" class="form-control"
                                value="<?= $bangunans['tanggal_perolehan']; ?>">
                        </div>
                    </div>

                    <label for="harga_perolehan">Harga Perolehan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" id="harga_perolehan" name="harga_perolehan" class="form-control"
                                value="<?= $bangunans['harga_perolehan']; ?>">
                        </div>
                    </div>

                    <label for="kapasitas_internet">Kapasitas Internet</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="kapasitas_internet" name="kapasitas_internet" class="form-control"
                                value="<?= $bangunans['kapasitas_internet']; ?>">
                        </div>
                    </div>

                    <label for="keterangan">Keterangan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="keterangan" name="keterangan" class="form-control"
                                value="<?= $bangunans['keterangan']; ?>">
                        </div>
                    </div>



                    <label for="nama">Foto Lahan (jpg/png) max 2mb</label>
                    <div class="form-group">
                        <div class="form-line">
                            <img src="<?= base_url('assets/img/lahan/') . $bangunans['foto_bangunan']; ?>" width="500"
                                height="500" class="img-thumbnail">
                            <div class="form-group">
                                <label for="exampleInputFile"></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto_bangunan"
                                            name="foto_bangunan">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Edit</button>
                    <?php form_close(); ?>
                    <?php endforeach; ?>




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
    $(document).on('click', '#pilih', function() {
        var nama_klas = $(this).data('keterangan');
        var id = $(this).data('id');
        $('#asal_barang').val(nama_klas);
        $('#id_asal_barang').val(id);
        $('#defaultModal').modal('hide');
    })
});
</script>