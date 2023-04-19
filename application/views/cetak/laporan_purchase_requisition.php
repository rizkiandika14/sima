<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>

    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic-icons.css">
    <!-- Setting CSS bagian header/ kop -->
    <style type="text/css">
    table.page_header {
        width: 1020px;
        border: none;
        background-color: #DDDDFF;
        border-bottom: solid 1mm #AAAADD;
        padding: 2mm
    }

    table.page_footer {
        width: 1020px;
        border: none;
        background-color: #DDDDFF;
        border-top: solid 1mm #AAAADD;
        padding: 2mm
    }
    </style>
    <!-- Setting Margin header/ kop -->
    <!-- Setting CSS Tabel data yang akan ditampilkan -->
    <style type="text/css">
    .tabel2 {
        border-collapse: collapse;
        margin: 0 auto;
        width: 90%;
        margin-left: 30px;
        margin-right: 30px;
    }

    .tabel2 th,
    .tabel2 td {
        padding: 5px 5px;
        border: 1px solid #000000;

    }

    p {
        margin-left: 30px;
    }



    div.kanan {
        position: absolute;

        right: 50px;

    }

    div.tengah {
        position: absolute;

        right: 330px;

    }

    div.kiri {
        position: absolute;

        left: 10px;
    }
    </style>

    <table>
        <tr>
            <th rowspan="3"><img src="<?= base_url('assets/'); ?>images/amik.png" style="width:100px;height:80px" />
            </th>
            <td align="center" style="width: 520px;">
                <font style="font-size: 18px"><b>UNIVERSITAS AMIKOM PURWOKERTO</b></font>
                <br>Jl. Letjen Pol Sumarto Watumas, Purwanegara, Purwokerto Utara, Banyumas, Kode Pos : 53127
                <br>Telepon : (0281) 623321 / (0281) 623196
            </td>

        </tr>
    </table>
    <hr>
    <p align="center" style="font-weight: bold; font-size: 18px;">PURCHASE REQUISITION</p>
    <p align="center" style="font-weight: bold; font-size: 18px;">Unit Pengadaan Barang</p>

    <!-- <p align="center" style="font-weight: bold; font-size: 14px;"><u>Untuk Bagian <?= $divisi ?></u></p> -->

    <div class="isi" style="margin: 0 auto;">

        <p style="color: black; text-align: left;"> No : 045/PR/UPB/AMIKOMPWT/IV/2023 <br>
            Tanggal pengajuan : <?php echo tanggal_indo($tanggal) ?> <br>
            Unit Yang Mengajukan : <b><?= $divisi ?></b>
            </b>
        </p>


        <table class="tabel2">
            <thead>
                <tr>
                    <th style="text-align: center;  "><b>No.</b></th>
                    <th style="text-align: center;  "><b>Nama Barang</b></th>
                    <th style="text-align: center;  "><b>Jumlah</b></th>
                    <th style="text-align: center;  "><b>Realisasi</b></th>
                    <th style="text-align: center;  "><b>Harga</b></th>
                    <th style="text-align: center;  "><b>Total Harga</b></th>



                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($dpengajuanpr as $dpr) : ?>
                <tr>
                    <td style="text-align: center; font-size: 12px;"><?php echo $no++; ?></td>
                    <td style="text-align: left; font-size: 12px;"><?= $dpr['nama_brg']; ?></td>
                    <td style="text-align: left; font-size: 12px;"><?= $dpr['jumlah']; ?></td>
                    <td style="text-align: left; font-size: 12px;"><?= $dpr['realisasi']; ?></td>
                    <td style="text-align: left; font-size: 12px;">Rp. <?= number_format($dpr['harga']); ?></td>
                    <td style="text-align: left; font-size: 12px;">Rp. <?= number_format($dpr['total']); ?></td>

                </tr>
                <?php endforeach;
                ?>
            </tbody>
            <tfoot>
                <?php

                $totalp = $this->db->query("SELECT sum(total) as totalp FROM pengajuan Where minggu = $minggu AND waktu_pengajuan = '$tanggal' AND divisi = '$divisi' AND status = 'waiting approvel'");

                foreach ($totalp->result() as $total) {
                ?>
                <tr>
                    <td colspan="5">
                        <b>TOTAL</b>
                    </td colspan="1">
                    <td><b><?php echo 'Rp. ' . number_format($total->totalp) ?></b></td>
                </tr>

                <?php } ?>

            </tfoot>
        </table>
    </div>

    <?php
    $user = $this->db->query("SELECT username as user FROM user Where divisi = '$divisi'");

    foreach ($user->result() as $users) {
    ?>


    <div class="kiri" style="margin: 0 auto;">
        <p>Yang Bertanggungjawab</p>
        <p>Ka.Unit Pengadaan Barang</p>
        <br>
        <br>
        <br>
        <!-- <p><img src="<?= base_url('assets/'); ?>images/centang.png" style="width:50px;height:50px" /></p> -->
        <b>
            <p><u>Bagus Adhi Kusuma, S.T., M.Eng</u><br></p>
            <p>NIK.2017.05.2.112</p>
        </b>
    </div>
    <?php } ?>

    <div class="kanan" style="margin: 0 auto;">
        <p>Disetujui Oleh</p>
        <p>Dir.Direktorat Keuangan, Kepegawaian dan Aset </p>
        <p></p>
        <p> </p>
        <br>
        <br>
        <br>
        <!-- <p><img src="<?= base_url('assets/'); ?>images/centang.png" style="width:50px;height:50px" /></p> -->
        <b>
            <p><u>Catur Winarsih, S.Kom., M.M</u></p>
            <p>NIK.2007.09.1.004</p>
        </b>
        <br>
        <br>
        <br>

    </div>

</body>

<script type="text/javascript">
window.print();
</script>


<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</html>