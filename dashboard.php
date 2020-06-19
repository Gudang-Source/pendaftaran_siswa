<?php  
  error_reporting(0);
  session_start();
  include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEM PENDAFTARAN SISWA BARU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="shortcut icon" href="images/logo_11.png" />
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-yellow navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <table bgcolor="white">
      <tr>
        <td>
          <a href="?module=home" class="brand-link">
           <center>
            <font color="black">PPDB DP-I</font>
            </center>
          </a>
        </td>
      </tr>
    </table>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php  
          if($_SESSION["level"]=="user")
          {
            $sql=mysqli_query($koneksi, "SELECT foto FROM siswa WHERE username='$_SESSION[username]'");
            $data=mysqli_fetch_array($sql);
            if($data["foto"]=="")
            {
              ?>
                <img src="dist/img/users.png" class="img-circle elevation-2" alt="User Image">
              <?php 
            }else{
              ?>
                <img src="foto/<?php echo $data['foto'] ?>" class="img-circle elevation-2" alt="User Image">
              <?php 
            }
          }else{
             ?>
                <img src="dist/img/users.png" class="img-circle elevation-2" alt="User Image">
              <?php 
          }
           

          ?>
          
        </div>
        <div class="info">
          <a href="?module=edit_user&id=<?php echo $_SESSION['id']; ?>" class="d-block"><?php echo $_SESSION["nama"] ?></a>
        </div>
      </div>

      <!-- jika login sebagai admin, maka tampilan menunya data siswa, user, dan keluar -->
     <?php  
      if($_SESSION["level"]=="admin")
      {
        ?>
         <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- menu calon asisten -->
            <li class="nav-item">
              <a href="?module=siswa" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Data Siswa</p>
              </a>
            </li>

            <!-- menu user -->
            <li class="nav-item">
              <a href="?module=data_user" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>User</p>
              </a>
            </li>

            <!-- menu keluar -->
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Keluar</p>
              </a>
            </li>
          </ul>

        <!-- jika login sebagai user, maka tampilan menunya data siswa, user, dan keluar -->
        <?php 
      }elseif($_SESSION["level"]=="user")
      {
        ?>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="?module=siswa_user" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Data Siswa Baru</p>
              </a>
            </li>
        
            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Keluar</p>
              </a>
            </li>
          </ul>

        </nav>
        <?php 
      }
     ?>
    </div>
  </aside>

  
  <div class="content-wrapper">
        <!-- halaman beranda untuk admin -->
        <?php  
        $module=$_GET["module"];
        
            switch ($module) {
              default:
                # code...
                if($_SESSION["level"]=="admin")
                {
                    ?>

                      <div class="content-header">
                        <div class="container-fluid">
                          <div class="row mb-2">
                            <div class="col-sm-6">
                              <h1 class="m-0 text-dark">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                              <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                              </ol>
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                      </div>
                      <!-- /.content-header -->


                      <!-- Main content -->
                      <section class="content">
                        <div class="container-fluid">
                          <!-- Small boxes (Stat box) -->
                          <div class="row">
                            <div class="col-12 col-sm-6 col-md-3">
                              <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

                                <!-- menghitung jumlah siswa yang ada di database -->
                                <div class="info-box-content">
                                  <span class="info-box-text">Data Siswa Baru</span>
                                  <?php 
                                  $sql=mysqli_query($koneksi, "SELECT COUNT(id_siswa) AS jumlah FROM siswa");
                                  $data=mysqli_fetch_array($sql);
                                  ?>
                                  <span class="info-box-number">
                                    <?php echo $data["jumlah"] ?>
                                  </span>
                                </div>
                                <!-- /.info-box-content -->
                              </div>
                              <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                                <!-- Main content -->
                      

                         
                 <!-- halaman beranda untuk user -->
                  <?php 
                }elseif($_SESSION["level"]=="user")
                {
                  ?>
                    <div class="content-header">
                        <div class="container-fluid">
                          <div class="row mb-2">
                            <div class="col-sm-6">
                              <h1 class="m-0 text-dark">Dashboard</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                              <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                              </ol>
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                      </div>
                      <!-- /.content-header -->
                      <!-- Main content -->
                      <section class="content">
                        <div class="container-fluid">
                          <!-- Small boxes (Stat box) -->
                            <!-- /.content-header -->
                             <div class="card">
                                  <div class="card-body">
                                   <p>Selamat Datang</p>
                                   <p>Di Halaman Utama Sistem Pendaftaran Siswa Baru SMK Dinamika Pembangunan I</p>
                                  </div>
                              <!-- /.card-body -->
                            </div>
                          </div>
                        </section>
                  <?php 
                }
                
                break;
                
                case "siswa" :
                        include "modul/siswa/siswa.php";
                break;
                case "edit_siswa" :
                        include "modul/siswa/edit.php";
                break;
                case "input_siswa" :
                        include "modul/siswa/input.php";
                break;
                
                case "data_user" :
                        include "modul/user/data_user.php";
                break;
                case "input_user" :
                        include "modul/user/input_user.php";
                break;
                case "edit_user" :
                        include "modul/user/edit_user.php";
                break;
                
                case "siswa_user" :
                        include "modul/siswa/siswa_user.php";
                break;
                case "detail_siswa" :
                        include "modul/siswa/detail.php";
                break;
            }
        ?>
        <!-- Main row -->
        <div class="row">
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Sistem Pendaftaran Siswa Baru SMK Dinamika Pembangunan I</a></strong>
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 1000);
</script>
<!-- <script type="text/javascript" src="style/jquery.js"></script> -->
  <script type="text/javascript"  src="style/rupiah.js"></script>

  <!-- editor-->
  <script type="text/javascript"  src="ckeditor-full/ckeditor.js"></script>
</body>
</html>
