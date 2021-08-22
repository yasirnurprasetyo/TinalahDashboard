<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= site_url("welcome") ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tambah Data User</li>
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
                        <h4>Tambah User</h4>
                    </div>
                    <div class="card-body">
                        <form id="form-tambah-user" enctype="multipart/form-data" method="post" action="<?= site_url("user/proses_tambah") ?>">
                            <div class="form-group">
                                <label for="nama-user">Nama User</label>
                                <input required type="text" name="nama_user" id="name_user" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="mail-user">Email User</label>
                                <input required type="text" name="email_user" id="email_user" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="password-user">Password User</label>
                                <input required type="password" name="password_user" id="password_user" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="phone-user">Phone User</label>
                                <input type="text" name="phone_user" id="phone_user" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="image-user">Gambar User</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image_user" class="custom-file-input" id="image_user">
                                        <label class="custom-file-label" for="image-user">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <button id="btn-save" class="btn btn-success"><i class="fas fa-save"></i> SIMPAN</button>
                        <button id="btn-reset" type="reset" class="btn btn-info"><i class="fas fa-redo"></i> RESET</button>
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
                            <img src="<?php echo base_url(); ?>assets/dist/img/no_image.png" alt="User Avatar" id="imgView" class="card-img-top img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        $("#btn-save").click(function() {
            prosesUpload()
        })

        function prosesUpload() {
            var reader = new FileReader();
            var f = document.getElementById("image_user").files;
            reader.onloadend = function() {
                var gambar = reader.result.toString().replace(/^data:(.*,)?/, '');
                Swal.fire({
                    title: "Processing Data..",
                    text: "Data Sedang Berproses",
                    imageUrl: '<?= base_url() ?>' + "assets/img/loading.gif",
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
                $.ajax({
                    type: "POST",
                    url: '<?= base_url() ?>' + 'user/prosesSimpan',
                    data: {
                        name_user: $("#name_user").val(),
                        email_user: $("#email_user").val(),
                        password_user: $("#password_user").val(),
                        phone_user: $("#phone_user").val(),
                        image_user: gambar
                    },
                    success: function(data) {
                        if (data === "201") {
                            window.location.replace("<?= site_url("user") ?>");
                        } else {
                            Swal.fire("Input data yang anda masukkan salah", data, "error");
                        }
                    }
                })
            }
            reader.readAsDataURL(f[0]);
        }
    })
</script>
<script>
    $("#image_user").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#image_user").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#image_user").val();
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