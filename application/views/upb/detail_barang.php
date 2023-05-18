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
                        Detail Barang </h2>
                </div>
                <div class="body">



                    <form>
                        <?php foreach ($detail_barang as $aset) : ?>
                        <!-- <label for="kode_lokasi">Kode Lokasi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="kode_lokasi" name="kode_lokasi" class="form-control"
                                    value="<?= $aset['kode_lokasi']; ?>" readonly>
                            </div>
                        </div> -->

                        <!-- <label for="kode_barang">Kode Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="kode_barang" name="kode_barang" class="form-control"
                                    value="<?= $aset['kode_barang']; ?>" readonly>
                            </div>
                        </div> -->

                        <label for="nama_ruangan">Ruangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control"
                                    value="<?= $aset['nama_ruangan']; ?>" readonly>
                            </div>
                        </div>

                        <!-- <label for="subklasifikasi">Sub Klasifikasi</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="subklasifikasi" name="subklasifikasi" class="form-control"
                                    value="<?= $aset['keterangan_subklas']; ?>" readonly>
                            </div>
                        </div> -->

                        <label for="jenis_barang">Jenis Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="jenis_barang" name="jenis_barang" class="form-control"
                                    value="<?= $aset['jenis_barang']; ?>" readonly>
                            </div>
                        </div>



                        <label for="nama_barang">Nama Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_barang" name="nama_barang" class="form-control"
                                    value="<?= $aset['nama_barang']; ?>" readonly>
                            </div>
                        </div>

                        <label for="jumlah_barang">Jumlah Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="jumlah_barang" id="jumlah_barang"
                                    value="<?= $aset['jumlah_barang']; ?>" class="form-control ui-autocomplete-input"
                                    readonly>
                            </div>
                        </div>

                        <label for="satuan_barang">Satuan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="satuan_barang" id="satuan_barang"
                                    value="<?= $aset['satuan_barang']; ?>" class="form-control ui-autocomplete-input"
                                    readonly>
                            </div>
                        </div>

                        <label for="spesifikasi_teknis">Spesifikasi Teknis</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="spesifikasi_teknis" name="spesifikasi_teknis"
                                    class="form-control" value="<?= $aset['spesifikasi_teknis']; ?>" readonly>
                            </div>
                        </div>

                        <label for="serial_number">Serial Number</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="serial_number" name="serial_number" class="form-control"
                                    value="<?= $aset['serial_number']; ?>" readonly>
                            </div>
                        </div>

                        <label for="model_number">Model Number</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="model_number" name="model_number" class="form-control"
                                    value="<?= $aset['model_number']; ?>" readonly>
                            </div>
                        </div>

                        <label for="nama_asal_barang">Asal Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="nama_asal_barang" name="nama_asal_barang" class="form-control"
                                    value="<?= $aset['nama_asal_barang']; ?>" readonly>
                            </div>
                        </div>



                        <label for="tahun_perolehan">Tahun Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="tahun_perolehan" name="tahun_perolehan" class="form-control"
                                    value="<?= $aset['tahun_perolehan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="tanggal_perolehan">Tanggal Perolehan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="tanggal_perolehan" name="tanggal_perolehan" class="form-control"
                                    value="<?= $aset['tanggal_perolehan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="harga_perolehan">Harga</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="harga_perolehan" name="harga_perolehan" class="form-control"
                                    value="<?= $aset['harga_perolehan']; ?>" readonly>
                            </div>
                        </div>

                        <label for="keadaan_barang">Keadaan Barang</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="keadaan_barang" name="keadaan_barang" class="form-control"
                                    value="<?= $aset['keadaan_barang']; ?>" readonly>
                            </div>
                        </div>

                        <label for="peruntukan">Peruntukan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="peruntukan" name="peruntukan" class="form-control"
                                    value="<?= $aset['peruntukan']; ?>" readonly>
                            </div>
                        </div>


                        <label for="keterangan">Keterangan</label>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="keterangan" name="keterangan" class="form-control"
                                    value="<?= $aset['keterangan']; ?>" readonly>
                            </div>
                        </div>



                        <label for="nama">Foto Barang (jpg/png) max 2mb</label>
                        <div class="form-group">
                            <div class="form-line">
                                <img src="<?= base_url('assets/img/barang/') . $aset['foto_barang']; ?>" width="500"
                                    height="500" class="img-thumbnail">
                            </div>
                        </div>




                        <a href="<?= base_url('upb/barang') ?>" type="button"
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