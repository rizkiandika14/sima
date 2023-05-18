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
                            Data Bangunan
                        </h2>


                        <a href="add_bangunan" type="button" class="btn btn-primary waves-effect m-r-20"> <i
                                class="material-icons">add</i> <span class="icon-name"></i>Add data</a>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable-5"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>Kode Barang Bangunan</th>
                                        <th>Kode Lahan</th>
                                        <th>Nama Lahan</th>
                                        <th>Kode Bangunan</th>
                                        <th>Nama Bangunan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Kode Barang Bangunan</th>
                                        <th>Kode Lahan</th>
                                        <th>Nama Lahan</th>
                                        <th>Kode Bangunan</th>
                                        <th>Nama Bangunan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php

                                    foreach ($bangunans as $bgn) : ?>
                                    <tr>
                                        <td><?= $bgn['kode_barang']; ?></td>
                                        <td><?= $bgn['kode_lahan']; ?></td>
                                        <td><?= $bgn['nama_lahan']; ?></td>
                                        <td><a
                                                href="<?= base_url() ?>admin/bangunan_isi/<?= $bgn['kode_bangunan']; ?>"><?= $bgn['kode_bangunan']; ?></a>
                                        </td>
                                        <td><?= $bgn['nama_bangunan']; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-info"
                                                href="<?= base_url() ?>admin/updatebangunan/<?= $bgn['id_bangunan']; ?>"><i
                                                    class="material-icons"></i> <span class="icon-name"></span>
                                                edit</a>

                                            <a class="btn btn-sm btn-danger waves-effect " data-type="success"
                                                href="<?= base_url() ?>admin/fungsi_delete_bangunan/<?= $bgn['id_bangunan']; ?>"><span
                                                    class="fa fa-trash tombol-hapus"></span>
                                                Hapus</a>

                                            <a class="btn btn-xs btn-info"
                                                href="<?= base_url() ?>admin/detail_bangunan/<?= $bgn['id_bangunan']; ?>"><i
                                                    class="material-icons">visibility</i> <span
                                                    class="icon-name"></span>
                                                Detail</a>







                                        </td>


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