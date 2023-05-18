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
                            Data Barang
                        </h2>


                        <a href="add_barang" type="button" class="btn btn-primary waves-effect m-r-20"> <i
                                class="material-icons">add</i> <span class="icon-name"></i>Add data</a>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable-3"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Tanggal Perolehan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Tanggal Perolehan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php

                                    foreach ($barang as $brg) : ?>
                                    <tr>

                                        <td><?= $brg['nama_barang']; ?></td>
                                        <td><?= $brg['jumlah_barang']; ?></td>
                                        <td><?= $brg['harga_perolehan']; ?></td>
                                        <td><?= $brg['tanggal_perolehan']; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-info"
                                                href="<?= base_url() ?>upb/updatebarang/<?= $brg['id_barang']; ?>"><i
                                                    class="material-icons"></i> <span class="icon-name"></span>
                                                edit</a>

                                            <a class="btn btn-sm btn-danger waves-effect " data-type="success"
                                                href="<?= base_url() ?>upb/fungsi_delete_barang/<?= $brg['id_barang']; ?>"><span
                                                    class="fa fa-trash tombol-hapus"></span>
                                                Hapus</a>

                                            <a class="btn btn-xs btn-info"
                                                href="<?= base_url() ?>upb/detail_barang/<?= $brg['id_barang']; ?>"><i
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