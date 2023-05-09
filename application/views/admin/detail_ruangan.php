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
                        Detail Ruangan </h2>
                </div>
                <div class="body">



                    <form>
                        <?php foreach ($detail_ruangan as $druangan) : ?>
                        <label for="nama_bangunan">Gedung</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_bangunan" name="nama_bangunan" class="form-control"
                                    value="<?= $druangan['nama_bangunan']; ?>" readonly>
                            </div>
                        </div>
                        <label for="tanggal_pembukuan">Tanggal Pembukuan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="tanggal_pembukuan" name="tanggal_pembukuan" class="form-control"
                                    value="<?= $druangan['tanggal_pembukuan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="nama_ruangan">Nama Ruangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control"
                                    value="<?= $druangan['nama_ruangan']; ?>" readonly>
                            </div>
                        </div>



                        <label for="luas_ruangan">Luas Ruangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="luas_ruangan" name="luas_ruangan" class="form-control"
                                    value="<?= $druangan['luas_ruangan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="asal_barang">Asal Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="asal_barang" id="asal_barang"
                                    value="<?= $druangan['nama_asal_barang']; ?>"
                                    class="form-control ui-autocomplete-input" readonly>
                                <input type="hidden" id="id_asal_barang" name="id_asal_barang"
                                    value="<?= $druangan['id_asal_barang']; ?>">
                            </div>
                        </div>

                        <label for="tahun_perolehan">Tahun Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" id="tahun_perolehan" name="tahun_perolehan" class="form-control"
                                    value="<?= $druangan['tahun_perolehan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="tanggal_perolehan">Tanggal Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" id="tanggal_perolehan" name="tanggal_perolehan" class="form-control"
                                    value="<?= $druangan['tanggal_perolehan']; ?>" readonly>
                            </div>
                        </div>


                        <label for="peruntukan">Peruntukan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="peruntukan" name="peruntukan" class="form-control"
                                    value="<?= $druangan['peruntukan']; ?>" readonly>
                            </div>
                        </div>


                        <label for="keterangan">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="keterangan" name="keterangan" class="form-control"
                                    value="<?= $druangan['keterangan']; ?>" readonly>
                            </div>
                        </div>



                        <label for="nama">Foto Ruangan (jpg/png) max 2mb</label>
                        <div class="form-group">
                            <div class="form-line">
                                <img src="<?= base_url('assets/img/ruangan/') . $druangan['foto_ruangan']; ?>"
                                    width="500" height="500" class="img-thumbnail">
                            </div>
                        </div>




                        <a href="<?= base_url('admin/ruangan') ?>" type="button"
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