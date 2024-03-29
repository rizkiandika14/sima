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
                            Data Ruangan
                        </h2>


                        <a href="add_ruangan" type="button" class="btn btn-primary waves-effect m-r-20"> <i
                                class="material-icons">add</i> <span class="icon-name"></i>Add data</a>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable-4"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>Kode Bangunan</th>
                                        <th>Nama Bangunan</th>
                                        <th>Kode Ruangan</th>
                                        <th>Nama Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Kode Bangunan</th>
                                        <th>Nama Bangunan</th>
                                        <th>Kode Ruangan</th>
                                        <th>Nama Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                    <?php

                                    foreach ($ruangans as $rgn) : ?>
                                    <tr>

                                        <td><?= $rgn['kode_bangunan']; ?></td>
                                        <td><?= $rgn['nama_bangunan']; ?></td>
                                        <td><a
                                                href="<?= base_url() ?>admin/ruangan_isi/<?= $rgn['kode_ruangan']; ?>"><?= $rgn['kode_bangunan']; ?>.<?= $rgn['kode_ruangan']; ?></a>
                                        </td>
                                        <td><?= $rgn['nama_ruangan']; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-info"
                                                href="<?= base_url() ?>admin/updateruangan/<?= $rgn['id_ruangan']; ?>"><i
                                                    class="material-icons"></i> <span class="icon-name"></span>
                                                edit</a>

                                            <a class="btn btn-sm btn-danger waves-effect " data-type="success"
                                                href="<?= base_url() ?>admin/fungsi_delete_ruangan/<?= $rgn['id_ruangan']; ?>"><span
                                                    class="fa fa-trash tombol-hapus"></span>
                                                Hapus</a>

                                            <a class="btn btn-xs btn-info"
                                                href="<?= base_url() ?>admin/detail_ruangan/<?= $rgn['id_ruangan']; ?>"><i
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