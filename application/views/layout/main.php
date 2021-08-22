<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('layout/head') ?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view('layout/navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('layout/sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php $this->load->view($page) ?>
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('layout/footer') ?>
        <!-- Control Sidebar -->
        <!-- <aside class="control-sidebar control-sidebar-dark">
        </aside> -->
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

   <?php $this->load->view('layout/script') ?>
</body>

</html>