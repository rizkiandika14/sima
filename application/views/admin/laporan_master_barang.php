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
                        Laporan Data Master Barang</h2>
                </div>
                <div class="body">
                    <?= form_open('admin/laporan_master_barang'); ?>
                    <div class="form-control-label" style="text-align: left;">
                        <button type="submit" class="btn btn-sm btn-info" name="tampilkan" value="proses">Semua
                            Data</button>
                    </div>
                    <br>
                    <?= form_close(); ?>
                    <?= form_open('admin/laporan_tahun_master_barang'); ?>
                    <form method="POST" id="cari" action="">

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p>
                                    <b>Tahun</b>
                                </p>
                                <div class="input-group input-group-md">

                                    <div class="form-line">
                                        <input type="number" name="thn" id="thn" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-control-label" style="text-align: left;">
                                    <button type="submit" class="btn btn-sm btn-success" name="tampilkan"
                                        value="proses">Cari
                                        Data</button>
                                </div>
                                <?= form_close(); ?>
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
                                    <th>Kode Lokasi</th>
                                    <th>Kode Barang</th>
                                    <th>Ruangan</th>
                                    <th>Subklasifikasi</th>
                                    <th>Jenis Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                    <th>Satuan</th>
                                    <th>Spesifikasi Teknis</th>
                                    <th>Serial Number</th>
                                    <th>Model Number</th>
                                    <th>Asal Barang</th>
                                    <th>Tahun Perollehan</th>
                                    <th>Tanggal Perolehan</th>
                                    <th>Harga</th>
                                    <th>Keadaan Barang</th>
                                    <th>Peruntukan</th>
                                    <th>Keterangan</th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($pencarian_data as $dp) : ?>
                                <tr>
                                    <td><?= $dp['kode_lokasi']; ?></td>
                                    <td><?= $dp['kode_barang']; ?></td>
                                    <td><?= $dp['nama_ruangan']; ?></td>
                                    <td><?= $dp['keterangan_subklas']; ?></td>
                                    <td><?= $dp['jenis_barang']; ?></td>
                                    <td><?= $dp['nama_barang']; ?></td>
                                    <td><?= $dp['jumlah_barang']; ?></td>
                                    <td><?= $dp['satuan_barang']; ?></td>
                                    <td><?= $dp['spesifikasi_teknis']; ?></td>
                                    <td><?= $dp['serial_number']; ?></td>
                                    <td><?= $dp['model_number']; ?></td>
                                    <td><?= $dp['nama_asal_barang']; ?></td>
                                    <td><?= $dp['tahun_perolehan']; ?></td>
                                    <td><?= $dp['tanggal_perolehan']; ?></td>
                                    <td><?= $dp['harga_perolehan']; ?></td>
                                    <td><?= $dp['keadaan_barang']; ?></td>
                                    <td><?= $dp['peruntukan']; ?></td>
                                    <td><?= $dp['keterangan']; ?></td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>


                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>