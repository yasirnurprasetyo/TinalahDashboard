<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Gambar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url("welcome") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Ubah Data Gambar</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-gray">
                    <div class="card-header">
                        <h4>Ubah Gambar</h4>
                    </div>
                    <div class="card-body">
                        <form id="form-tambah-gambar" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="nama-user">Nama Gambar</label>
                                <input required type="text" value="<?php echo $gambars->nama_gambar; ?>" name="nama_gambar" id="nama_gambar" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="mail-user">Kategori</label>
                                <input required type="text" value="<?php echo $gambars->kategori_gambar; ?>" name="kategori" id="kategori" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea type="text" name="deskripsi" id="deskripsi" class="form-control"><?php echo $gambars->deskripsi_gambar; ?></textarea>
                                <!-- <input type="text" value="<?php echo $gambars->deskripsi_gambar; ?>" name="deskripsi" id="deskripsi" class="form-control"/> -->
                            </div>
                            <div class="form-group">
                                <label for="image-user">Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" value="<?php echo $gambars->gambar; ?>" name="gambar" class="custom-file-input" id="gambar">
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <button id="btn-save" class="btn btn-success"><i class="fas fa-save"></i> SIMPAN</button>
                        <button id="btn-reset" type="reset" class="btn btn-info"><i class="fas fa-redo"></i> RESET</button>
                        <button id="btn-back" class="btn btn-secondary"><i class="fas fa-arrow-right"></i> Kembali</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-gray">
                    <div class="card-header">
                        <h4>Preview File</h4>
                    </div>
                    <div class="card-body">
                        <div class="imgWrap">
                            <!-- <img src="<?php echo base_url(); ?>assets/dist/img/no_image.png" alt="User Avatar" id="imgView" class="card-img-top img-fluid"> -->
                            <img alt="User Avatar" id="imgView" class="card-img-top img-fluid" src="<?= $gambars->gambar_url ?>" onerror="this.onerror=null; this.src='<?= base_url() . "assets/dist/img/no_image.png" ?>';" alt="<?= $gambars->nama_gambar ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(function() {
        $("#btn-reset").click(function(){
            $("#form-tambah-gambar")[1].reset();
        })

        $("#btn-save").click(function() {
            data = {
                nama_gambar: $("#nama_gambar").val(),
                kategori_gambar: $("#kategori_gambar").val(),
                deskripsi_gambar: $("#deskripsi_gambar").val(),
                gambar: gambar,
                id_gambar: $("#id_gambar").val()
            }

            if ($("#gambar").val() != "") {
                var reader = new FileReader()
                var f = document.getElementById("gambar").files;
                reader.onloadend = function() {
                    var gambar = reader.result.toString().replace(/^data:(.*,)?/, '');
                    data.gambar = gambar;
                    prosesUpdate(data);
                }
                reader.readAsDataURL(f[0]);
            } else {
                prosesUpdate(data);
            }
        })

        function prosesUpdate(data) {
            var strData = JSON.stringify(data)
            swal.fire({
                title: "Processing Data..",
                text: "Data sedang berkelana",
                imageUrl: '<?= base_url() ?>' + "assets/img/loading.gif",
                showConfirmButton: false,
                allowOutsideClick: false
            })
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>' + 'gambar/prosesUbah',
                data: {
                    data: strData
                }, // serializes the form's elements.
                success: function(data) {
                    if (data === "200") {
                        Swal.fire({
                            title: 'Data berhasil DiUpdate!',
                            text: 'success',
                            showConfirmButton: false,
                        });
                        window.location.replace("<?= site_url("gambar") ?>");
                    } else {
                        Swal.fire("Input Data Salah", data, "error");
                        console.log(strData)
                    } // show response from the php script.
                }
            })
        }
    })
</script>

<script>
    $("#gambar").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#gambar").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#gambar").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#imgView').attr('src', e.target.result);
                $('#imgView').hide();
                $('#imgView').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd() {
        fadeInAlert();
    }

    function fadeInAlert(text) {
        $(".alert").text(text).addClass("loadAnimate");
    }
</script>