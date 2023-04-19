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
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header">
                    <h2>
                        Pengajuan Minggu ke 3</h2>
                </div>
                <div class="body">
                    <form method="post" action="<?= base_url('admin/add_temp3'); ?>">
                        <input type="text" data-toggle="modal" data-target="#defaultModal" name="nama_brg" id="nama_brg"
                            placeholder="Nama Barang" class="form-control ui-autocomplete-input" value=""
                            autocomplete="on" readonly>
                        <br>
                        <input type="number" name="harga" id="harga" placeholder="Harga"
                            class="form-control ui-autocomplete-input" value="" autocomplete="off">
                        <br>
                        <input type="hidden" name="barang_id" id="barang_id" placeholder="id barang"
                            class="form-control ui-autocomplete-input" value="" autocomplete="off" readonly>
                        <br>
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group float">
                                    <div class="form-line">
                                        <select name="satuan" id="satuan" class="form-control" required>
                                            <option value="">--Pilih Satuan--</option>
                                            <?php
                                            foreach ($satuans as $satuan) : ?>
                                            <option value="<?php echo $satuan['satuan']; ?>">
                                                <?php echo $satuan['satuan']; ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="number" name="jumlah" id="jumlah" placeholder="Jumlah"
                            class="form-control ui-autocomplete-input" value="" autocomplete="off">

                        <input type="hidden" name="total" id="total">
                        <input type="hidden" name="minggu" id="minggu" value="3">
                        <input type="hidden" name="user_id" id="user_id" value="<?= $user['id']; ?>">
                        <input type="hidden" name="divisi" id="divisi" value="<?= $user['divisi']; ?>">

                        <div class="js-sweetalert">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect"
                                data-type="with-custom-icon">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!--  -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Data Pengajuan
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-basic-example"
                                id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>

                                </thead>



                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($barang_temp as $tmp) : ?>


                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?= $tmp['nama_brg']; ?></td>
                                        <td><?= $tmp['jumlah']; ?></td>
                                        <td><?= $tmp['satuan']; ?></td>
                                        <td>Rp. <?= number_format($tmp['harga']);  ?></td>
                                        <td>Rp. <?= number_format($tmp['total']); ?></td>

                                        <td>

                                            <a class="btn btn-sm btn-danger tombol-hapus"
                                                href="<?= base_url() ?>admin/fungsi_delete_temp3/<?= $tmp['id_tmp']; ?>"><span
                                                    class="fa fa-trash tombol-hapus"></span>
                                                Hapus</a>


                                        </td>


                                    </tr>

                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>

                                    <?php
                                    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                                    $user_id = $this->session->userdata('id');
                                    $totalp = $this->db->query("SELECT sum(total) as totalp FROM barang_temp Where user_id = $user_id AND minggu = 3");

                                    foreach ($totalp->result() as $total) {
                                    ?>
                                    <tr>
                                        <td colspan="5">
                                            <b>TOTAL</b>
                                        </td colspan="2">
                                        <td><b><?php echo 'Rp. ' . number_format($total->totalp) ?></b></td>
                                    </tr>

                                    <?php } ?>
                                </tfoot>
                            </table>
                            <form method="post" action="<?= base_url('admin/fungsi_pengajuan3') ?>">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Ajukan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

<!-- MODAL ADD -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
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
</div>


<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#nama_brg').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '<?= base_url() ?>admin/barangList',
                type: 'post',
                dataType: 'json',
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            $('#nama_brg').val(ui.item.label);
            $('#id').val(ui.item.value);

            return false;
        }
    });
});
</script>
<script>
$(document).ready(function() {
    $(document).on('click', '#pilih', function() {
        var nama_barang = $(this).data('barang');
        var id = $(this).data('id');
        $('#nama_brg').val(nama_barang);
        $('#barang_id').val(id);
        $('#defaultModal').modal('hide');
    })
});
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#jumlah, #harga").keyup(function() {
        var harga = $("#harga").val();
        var jumlah = $("#jumlah").val();




        var total = parseInt(harga) * parseInt(jumlah);


        $("#total").val(total);

    });
});
</script>
<script>
$('.tombol-tambah').on('click', function(e) {

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