<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url("welcome") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">List Data User</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-gray">
            <div class="card-header">
                <h4 class="card-title">Tabel User</h4>
                <a href="<?= site_url(array("user", "add")) ?>" class="btn btn-primary float-right"><i class="fas fa-plus-circle"></i>
                    Data User
                </a>
            </div>
            <div class="card-body">
                <br>
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $user->name_user ?></td>
                                <td><?= $user->email_user ?></td>
                                <td><?= $user->phone_user ?></td>
                                <td>
                                    <img height="70" onerror="this.onerror=null;this.src='<?= base_url() . 'images/no_image.png' ?>';" src="<?= $user->image_url  ?>" alt="Gambar" />    
                                </td>
                                <td>
                                    <a href="<?= site_url(array("user", "update", $user->id_user)) ?>" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
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
    </div>
</section>