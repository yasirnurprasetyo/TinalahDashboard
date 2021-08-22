<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Master</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url("welcome") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Gambar</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-gray">
            <div class="card-header">
                <h2 class="card-title">Data Gambar</h2>
                <a href="<?= site_url(array("gambar", "add")) ?>" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i>
                    Tambah Data Gambar
                </a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Gambar</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($gambars as $gambar) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $gambar->nama_gambar ?></td>
                                <td><?= $gambar->kategori_gambar ?></td>
                                <td>
                                    <img height="70" onerror="this.onerror=null;this.src='<?= base_url() . 'assets/img/no-image-icon.png' ?>';" src="<?= $gambar->gambar_url ?>" />    
                                </td>
                                <td>
                                    <a href="<?= site_url(array("gambar", "update", $gambar->id_gambar)) ?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="btn btn-sm btn-danger tombolHapus">
                                        <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>