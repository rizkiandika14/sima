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

    <!-- <p align="center" style="font-weight: bold; font-size: 14px;"><u>Untuk Bagian <?= $divisi ?></u></p> -->
    <table class="table table-no-bordered">





    </table>


    <div class="isi" style="margin: 0 auto;">

        <p style="color: black; text-align: left;"> No : 0001/BA/UPB/AMIKOMPWT/II/2023 <br>
            <!-- Tanggal pesan : <?php echo tanggal_indo($tanggal) ?> <br> -->
            <!-- Unit Yang Mengajukan : <b><?= $divisi ?></b> <br> -->
            Lampiran : - <br>
            Hal : Berita Acara Penyerahan Pengadaan Barang

        </p>

        <p>
            Kepada Yth. <br>
            Kepala <?= $divisi ?> <br>
            Universitas Amikom Purwokerto <br>
            Di Tempat.
        </p>

        <p>
            Dengan Hormat,
            Sehubungan dengan surat Saudara tentang Permohonan Pengajuan pengadaan barang pada
            tanggal <?= tanggal_indo($tanggal) ?>, dengan ini kami dari Unit Pengadaan Barang Universitas Amikom
            Purwokerto menyerahkan hasil pengadaan
            barang/jasa seperti pada daftar sebagai berikut.

        </p>


        <table class="tabel2">
            <thead>
                <tr>
                    <th style="text-align: center;  "><b>No.</b></th>
                    <th style="text-align: center;  "><b>Nama Barang</b></th>
                    <!-- <th style="text-align: center;  "><b>Jumlah</b></th> -->
                    <th style="text-align: center;  "><b>Jumlah</b></th>
                    <th style="text-align: center;  "><b>Harga</b></th>
                    <th style="text-align: center;  "><b>Total</b></th>



                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;
                foreach ($dpengajuanpr as $dpr) : ?>
                <tr>
                    <td style="text-align: center; font-size: 12px;"><?php echo $no++; ?></td>
                    <td style="text-align: left; font-size: 12px;"><?= $dpr['nama_brg']; ?></td>
                    <!-- <td style="text-align: left; font-size: 12px;"><?= $dpr['jumlah']; ?></td> -->
                    <td style="text-align: left; font-size: 12px;"><?= $dpr['realisasi']; ?></td>
                    <td style="text-align: left; font-size: 12px;">Rp. <?= number_format($dpr['harga']); ?></td>
                    <td style="text-align: left; font-size: 12px;">Rp. <?= number_format($dpr['total']); ?></td>

                </tr>
                <?php endforeach;
                ?>
            </tbody>
            <tfoot>
                <?php

                $totalp = $this->db->query("SELECT sum(total) as totalp FROM pengajuan Where minggu = $minggu AND waktu_pengajuan = '$tanggal' AND divisi = '$divisi' AND status = 'Telah Diterima'");

                foreach ($totalp->result() as $total) {
                ?>
                <tr>
                    <td colspan="4">
                        <b>GRAND TOTAL</b>
                    </td colspan="1">
                    <td><b><?php echo 'Rp. ' . number_format($total->totalp) ?></b></td>
                </tr>

                <?php } ?>

            </tfoot>
        </table>
    </div>

    <p>
        Barang tersebut di atas kami serahkan kepada unit pemesan dalam keadaan baik. Demikian surat ini kami sampaikan
        atas perhatian dan kerjasamanya kami ucapkan terima kasih.
    </p>

    <?php
    $user = $this->db->query("SELECT nama_ketua, nama_divisi, ttd FROM jabatan Where id_jabatan = '2'");

    foreach ($user->result() as $users) {
    ?>


    <div class="kanan" style="margin: 0 auto;">
        <p>Ka. <?php echo $users->nama_divisi ?></p>
        <br>
        <br>
        <br>
        <!-- <p><img src="<?= base_url('assets/'); ?>images/centang.png" style="width:50px;height:50px" /></p> -->
        <b>
            <p><u><?php echo $users->nama_ketua ?></u><br></p>

        </b>
    </div>
    <?php } ?>


</body>

<script type="text/javascript">
window.print();
</script>


<script src="assets/bootstrap/js/bootstrap.min.js"></script>

</html>