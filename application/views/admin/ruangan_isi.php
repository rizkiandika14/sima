<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>

            </h2>
        </div>
        <!-- Basic Examples -->


        <?= $this->session->flashdata('message'); ?>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Data Barang Ruangan
                        </h2>
                        <br>
                        <form action="<?= base_url('export/cetak_barang_ruangan'); ?>/<?= $kode_ruangan ?>" method="
                            post" enctype="multipart/form-data">
                            <div>
                                <button class='btn btn-primary waves-effect m-r-20' type="submit">
                                    <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                                    Cetak Pdf
                                </button>
                            </div>
                        </form>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable-5"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Kondisi</th>
                                        <th>Cetak</th>
                                        <th class="hide">id</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Kondisi</th>
                                        <th>Cetak</th>
                                        <th class="hide">id</th>
                                        <th>Action</th>

                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php

                                    foreach ($kode_ruang as $bgn) : ?>
                                    <tr>
                                        <td><?= $bgn['kode_barang'] ?></td>
                                        <td><?= $bgn['nama_barang']; ?></td>
                                        <td><?= $bgn['jumlah_barang']; ?></td>
                                        <td><?= $bgn['satuan_barang']; ?></td>
                                        <td><?= $bgn['keadaan_barang']; ?></td>
                                        <td><?= $bgn['cetak']; ?></td>
                                        <td class="hide"><?= $bgn['id_barang']; ?></td>
                                        <td><a class="btn btn-xs btn-info"
                                                href="<?= base_url() ?>admin/cetak_kode_barang/<?= $bgn['id_barang']; ?>"><i
                                                    class="material-icons">print</i> <span class="icon-name"></span>
                                                Cetak</a></td>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
    <!-- Button trigger modal -->

</section>

<script>
$('#tombol-tambah').on('click', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        icon: 'success',
        title: 'Added',
        text: 'Data added'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

})
</script>