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
                        Rekap Data Barang</h2>
                </div>
                <div class="body">
                    <?= form_open('admin/rekapBarang'); ?>
                    <div class="form-control-label" style="text-align: left;">
                        <button type="submit" class="btn btn-sm btn-info" name="tampilkan" value="proses">Semua
                            Data</button>
                    </div>
                    <br>
                    <?= form_close(); ?>
                    <?= form_open('admin/rekapBarangdet'); ?>
                    <form method="POST" id="cari" action="">

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p>
                                    <b>Dari Tanggal</b>
                                </p>
                                <div class="input-group input-group-md">

                                    <div class="form-line">
                                        <input type="date" name="tgla" id="tgla" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p>
                                    <b>Sampai Tanggal</b>
                                </p>
                                <div class="input-group input-group-md">

                                    <div class="form-line">
                                        <input type="date" name="tglb" id="tglb" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="text" data-toggle="modal" data-target="#barangModal" name="nama_brg" id="nama_brg"
                            placeholder="Nama Barang" class="form-control ui-autocomplete-input" value=""
                            autocomplete="on" readonly required>
                        <br>


                        <input type="text" data-toggle="modal" data-target="#divisiModal" name="nama_divisi"
                            id="nama_divisi" placeholder="Nama Divisi / Bagian"
                            class="form-control ui-autocomplete-input" value="" autocomplete="on" readonly required>
                        <br>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-control-label" style="text-align: left;">
                                    <button type="submit" class="btn btn-sm btn-success" name="tampilkan"
                                        value="proses">Cari
                                        Data</button>
                                </div>
                                <?= form_close(); ?>

                                <input type="hidden" name="barang_id" id="barang_id" placeholder="id barang"
                                    class="form-control ui-autocomplete-input" value="" autocomplete="off" readonly>
                                <input type="hidden" name="divisi_id" id="divisi_id" placeholder="id user"
                                    class="form-control ui-autocomplete-input" value="" autocomplete="off" readonly>

                            </div>
                        </div>




                    </form>
                </div>
            </div>


            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable"
                            id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Divisi</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Validasi</th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($pencarian_data as $dp) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?= $dp['waktu_pengajuan']; ?></td>
                                    <td><?= $dp['divisi']; ?></td>
                                    <td><?= $dp['nama_brg']; ?></td>
                                    <td><?= $dp['jumlah']; ?></td>
                                    <td><?= $dp['satuan']; ?></td>
                                    <td>Rp. <?= number_format($dp['harga']);  ?></td>
                                    <td>Rp. <?= number_format($dp['total']); ?></td>
                                    <td><?= $dp['status']; ?></td>
                                    <td><?= $dp['validasi']; ?></td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot>

                                <?php


                                foreach ($totalp as $total) {
                                ?>
                                <tr>
                                    <td colspan="4">
                                        <b>TOTAL</b>
                                    </td colspan="2">
                                    <td><b><?= $total['totalp']; ?></b></td>
                                </tr>

                                <?php } ?>
                            </tfoot>

                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- MODAL ADD -->
<div class="modal fade" id="barangModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Cari Barang</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover dataTable js-basic-example" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th class="hide">ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($barang as $b) : ?>

                        <tr>
                            <td style="text-align:center;" scope="row">
                                <?= $i; ?>
                            </td>
                            <td><?= $b['nama_brg']; ?></td>
                            <td class="hide"><?= $b['id']; ?></td>
                            <td style="text-align:center;">
                                <button class="btn btn-sm btn-info" id="pilih" data-barang="<?= $b['nama_brg']; ?>"
                                    data-id="<?= $b['id']; ?>">
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
<div class="modal fade" id="divisiModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Cari Barang</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-hover dataTable js-basic-example" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th class="hide">ID</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($user as $u) : ?>

                        <tr>
                            <td style="text-align:center;" scope="row">
                                <?= $i; ?>
                            </td>
                            <td><?= $u['divisi']; ?></td>
                            <td class="hide"><?= $u['id']; ?></td>
                            <td style="text-align:center;">
                                <button class="btn btn-sm btn-info" id="pilih1" data-divisi="<?= $u['divisi']; ?>"
                                    data-id="<?= $u['id']; ?>">
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
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
$(document).ready(function() {
    $(document).on('click', '#pilih', function() {
        var nama_barang = $(this).data('barang');
        var id = $(this).data('id');
        $('#nama_brg').val(nama_barang);
        $('#barang_id').val(id);
        $('#barangModal').modal('hide');
    })
});
</script>
<script>
$(document).ready(function() {
    $(document).on('click', '#pilih1', function() {
        var nama_divisi = $(this).data('divisi');
        var id = $(this).data('id');
        $('#nama_divisi').val(nama_divisi);
        $('#divisi_id').val(id);
        $('#divisiModal').modal('hide');
    })
});
</script>