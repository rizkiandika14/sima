<section class="content">
    <div class="container-fluid">
        <div class="block-header">

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        FILTER
                    </h2>

                </div>
                <div class="body">

                    <div class="row clearfix">



                        <?= form_open('upb/datepengajuan'); ?>
                        <form method="POST" id="cari" action="">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label">
                                <label for="dari_tgl">Dari Tanggal</label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="tgla" id="tgla" class="form-control" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 form-control-label">
                                <label for="sampai_tgl">Sampai Tanggal</label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="tglb" id="tglb" class="form-control" required>

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select id="status" name="status" class="form-control" required="">
                                            <option value="">--PILIH STATUS--</option>
                                            <option value="disetujui">DISETUJUI </option>
                                            <option value="ditolak">DITOLAK </option>
                                            <option value="diusulkan">DIUSULKAN </option>

                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-control-label" style="text-align: left;">
                                <button type="submit" class="btn btn-sm btn-info" name="tampilkan"
                                    value="proses">Cari</button>
                            </div>
                            <br>
                            <?= form_close(); ?>
                            <?= form_open('upb/datapengajuan'); ?>
                            <div class="form-control-label" style="text-align: left;">
                                <button type="submit" class="btn btn-sm btn-success" name="tampilkan"
                                    value="proses">Semua
                                    Data</button>
                            </div>

                            <?= form_close(); ?>

                        </form>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                            id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Validasi</th>
                                    <th>keterangan</th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($pencarian_data as $dp) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?= $dp['waktu_pengajuan']; ?></td>
                                    <td><?= $dp['nama_brg']; ?></td>
                                    <td><?= $dp['jumlah']; ?></td>
                                    <td><?= $dp['satuan']; ?></td>
                                    <td>Rp. <?= number_format($dp['harga']);  ?></td>
                                    <td>Rp. <?= number_format($dp['total']); ?></td>
                                    <td><?= $dp['status']; ?></td>
                                    <td><?= $dp['validasi']; ?></td>
                                    <td><?= $dp['keterangan']; ?></td>


                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- #END# Exportable Table -->
    </div>

</section>