<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><?= $head ?></h3>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List Data <?= $head ?></h2>
                        <div style="float: right;">
                            <a class="btn btn-success menus" href="<?= base_url('takor') ?>">Tambah</a>
                        </div>
                        <!-- <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="collapse-link" href="<?= base_url('index.php/c_kategory/add/tambah') ?>"><i class="fa fa-plus"></i></a>
                            </li>
                        </ul> -->
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="bs-example-popovers">
                            <?php
                            if ($this->session->flashdata('sukses')) { ?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <?= $this->session->flashdata('sukses') ?>
                            </div>
                            <?php } ?>
                            <?php
                            if ($this->session->flashdata('gagal')) { ?>
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <?= $this->session->flashdata('gagal') ?>
                            </div>
                            <?php } ?>
                        </div>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Kategori</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kategori as $k) { ?>
                                <tr>
                                    <td><?= $k->id_kategori ?></td>
                                    <td><?= $k->nama_kategori ?></td>
                                    <td>
                                        <a href="<?= base_url('eddkor/' . $k->id_kategori) ?>" class="btn btn-warning menus">Edit</a>
                                        <a href="<?= base_url('hakor' . $k->id_kategori) ?>" class="btn btn-danger menus">Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /page content -->