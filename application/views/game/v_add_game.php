<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1>Data Game</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url("welcome") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tambah Data Game</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-gray">
                    <div class="card-header">
                        <h4>Tambah Data Game Token</h4>
                    </div>
                    <div class="card-body">
                        <form id="form-tambah-game" enctype="multipart/form-data" method="post" action="<?= site_url("gambar/proses_tambah") ?>">
                            <div class="form-group">
                                <label for="nama-user">Nama Kelompok</label>
                                <input required type="text" name="nama_kelompok" id="nama_kelompok" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Catatan</label>
                                <textarea type="text" name="catatan" id="catatan" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <button id="btn-save" class="btn btn-success"><i class="fas fa-save"></i> SIMPAN</button>
                        <button id="btn-reset" type="reset" class="btn btn-info"><i class="fas fa-redo"></i> RESET</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        $("#btn-save").click(function() {
            Swal.fire({
                title: "Processing Data..",
                text: "Data Sedang Berproses",
                imageUrl: '<?= base_url() ?>' + "assets/img/loading.gif",
                showConfirmButton: false,
                allowOutsideClick: false
            })
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>' + 'tokengame/prosesSimpan',
                data: {
                    nama_tokengame: $("#nama_kelompok").val(),
                    catatan_tokengame: $("#catatan").val()
                },
                success: function(data) {
                    if (data === "201") {
                        window.location.replace("<?= site_url("tokengame") ?>");
                    } else {
                        Swal.fire("Input data yang anda masukkan salah", data, "error");
                    }
                }
            })
        })
    })
</script>