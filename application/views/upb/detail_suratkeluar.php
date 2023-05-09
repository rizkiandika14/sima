<!-- #Top Bar -->



<section class="content">
    <div class="container-fluid">
        <div class="block-header">

        </div>



        <!-- Blockquotes -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Detail Surat Keluar <br><br>
                            <?php
                            foreach ($suratkeluar as $sk) : ?>
                            <h2><?= $sk['tanggal'] ?></h2>
                            <?php endforeach ?>
                        </h2>
                        <br>
                        <?php
                        foreach ($suratkeluar as $sk) : ?>
                        <h2><?= $sk['judul'] ?></h2>
                        <?php endforeach ?>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <?php
                        foreach ($suratkeluar as $sk) : ?>
                        <h4><?= $sk['isi'] ?></h4>
                        <?php endforeach ?>

                        <a href="<?= base_url('assets/surat/suratkeluar/' . $sk['file']); ?>"><?= $sk['file']; ?></a>

                    </div>

                </div>
            </div>
        </div>
        <!-- #END# Blockquotes -->

    </div>
</section>