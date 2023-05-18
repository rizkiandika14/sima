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
                        Detail Lahan </h2>
                </div>
                <div class="body">



                    <form>
                        <?php foreach ($detail_lahan as $lahans) : ?>
                        <label for="kode_lahan">Kode Lahan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="kode_lahan" name="kode_lahan" class="form-control"
                                    value="<?= $lahans['kode_lahan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="subklasifikasi">Kode Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="subklasifikasi" name="subklasifikasi" class="form-control"
                                    value="<?= $lahans['kode_barang']; ?>" readonly>
                            </div>
                        </div>

                        <label for="tanggal_pembukuan">Tanggal Pembukuan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="tanggal_pembukuan" name="tanggal_pembukuan" class="form-control"
                                    value="<?= $lahans['tanggal_pembukuan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="nama_lahan">Nama Lahan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_lahan" name="nama_lahan" class="form-control"
                                    value="<?= $lahans['nama_lahan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="alamat">Alamat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="alamat" name="alamat" class="form-control"
                                    value="<?= $lahans['alamat']; ?>" readonly>
                            </div>
                        </div>

                        <label for="luas_lahan">Luas Lahan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="luas_lahan" name="luas_lahan" class="form-control"
                                    value="<?= $lahans['luas_lahan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="asal_barang">Asal Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="asal_barang" id="asal_barang" placeholder=""
                                    class="form-control ui-autocomplete-input"
                                    value="<?= $lahans['nama_asal_barang']; ?>" autocomplete="off" readonly>
                                <input type="hidden" id="id_asal_barang" name="id_asal_barang">
                            </div>
                        </div>

                        <label for="tahun_perolehan">Tahun Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="tahun_perolehan" name="tahun_perolehan" class="form-control"
                                    value="<?= $lahans['tahun_perolehan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="tanggal_perolehan">Tanggal Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="tanggal_perolehan" name="tanggal_perolehan" class="form-control"
                                    value="<?= $lahans['tanggal_perolehan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="harga_perolehan">Harga Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="harga_perolehan" name="harga_perolehan" class="form-control"
                                    value="<?= $lahans['harga_perolehan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="harga_taksiran">Harga Taksiran</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="harga_taksiran" name="harga_taksiran" class="form-control"
                                    value="<?= $lahans['harga_taksiran']; ?>" readonly>
                            </div>
                        </div>

                        <label for="nomor_sertifikat">Nomor Sertifikat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nomor_sertifikat" name="nomor_sertifikat" class="form-control"
                                    value="<?= $lahans['nomor_sertifikat']; ?>" readonly>
                            </div>
                        </div>

                        <label for="status_sertifikat">Status Sertifikat</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="status_sertifikat" name="status_sertifikat" class="form-control"
                                    value="<?= $lahans['status_sertifikat']; ?>" readonly>
                            </div>
                        </div>

                        <label for="status_tanah">Status Tanah</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="status_tanah" name="status_tanah" class="form-control"
                                    value="<?= $lahans['status_tanah']; ?>" readonly>
                            </div>
                        </div>

                        <label for="sertifikat_yayasan">Sertifikat a.n. Yayasan (diisi apabila status tanah :
                            HM)</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="sertifikat_yayasan" name="sertifikat_yayasan"
                                    class="form-control" value="<?= $lahans['sertifikat_yayasan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="tanggal_sewa_mulai">Tanggal Sewa Mulai (Diisi apabila status tanah : Sewa)</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="tanggal_sewa_mulai" name="tanggal_sewa_mulai"
                                    class="form-control" value="<?= $lahans['tanggal_sewa_mulai']; ?>" readonly>
                            </div>
                        </div>

                        <label for="tanggal_sewa_akhir">Tanggal Sewa Akhir (Diisi apabila status tanah : Sewa)</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="tanggal_sewa_akhir" name="tanggal_sewa_akhir"
                                    class="form-control" value="<?= $lahans['tanggal_sewa_akhir']; ?>" readonly>
                            </div>
                        </div>

                        <label for="keterangan">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="keterangan" name="keterangan" class="form-control"
                                    value="<?= $lahans['keterangan']; ?>" readonly>
                            </div>
                        </div>



                        <label for="nama">Foto Lahan (jpg/png) max 2mb</label>
                        <div class="form-group">
                            <div class="form-line">
                                <img src="<?= base_url('assets/img/lahan/') . $lahans['foto_lahan']; ?>" width="500"
                                    height="500" class="img-thumbnail">
                            </div>
                        </div>















                        <a href="<?= base_url('admin/lahan') ?>" type="button"
                            class="btn btn-primary m-t-15 waves-effect">kembali</a>
                        <?php endforeach; ?>
                    </form>



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