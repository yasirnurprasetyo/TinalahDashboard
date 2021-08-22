<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Master</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url("welcome") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Game</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-gray">
            <div class="card-header">
                <h2 class="card-title">Data Game Token</h2>
                <a href="<?= site_url(array("tokengame", "add")) ?>" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i>
                    Tambah Data Game Token
                </a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kelompok Game</th>
                            <th>Token</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($games as $game) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $game->nama_tokengame ?></td>
                                <td><?= $game->token_game ?></td>
                                <td>
                                    <a href="<?= site_url(array("tokengame", "update", $game->id_tokengame)) ?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
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