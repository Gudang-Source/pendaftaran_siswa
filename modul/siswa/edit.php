<?php
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$_GET['id']'");
$row = mysqli_fetch_array($rs);
?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Ubah Data Siswa</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Beranda</a></li>
          <li class="breadcrumb-item active">Ubah Data Siswa</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
			<?php
				 $id_siswa				= $_POST['id_siswa'];
				 $nama					= $_POST['nama'];
				 $ttl					= $_POST['ttl'];
				 $warga_negara			= $_POST["warga_negara"];
				 $alamat				= $_POST["alamat"];
				 $email					= $_POST["email"];
				 $no_hp					= $_POST["no_hp"];
				 $asal					= $_POST["asal"];
				 $nama_ayah				= $_POST["nama_ayah"];
				 $nama_ibu				= $_POST['nama_ibu'];
				 $penghasilan			= $_POST["penghasilan"];

				 $fileName              = $_FILES['foto']['name'];
                 move_uploaded_file($_FILES['foto']['tmp_name'], "foto/" . $_FILES['foto']['name']);

				 $insert = mysqli_query($koneksi, "UPDATE siswa SET
													 			nama ='$nama', 
													 			ttl ='$ttl', 
													 			warga_negara ='$warga_negara', 
													 			alamat ='$alamat',
													 			email ='$email', 
													 			no_hp ='$no_hp',
													 			asal ='$asal',
													 			nama_ayah ='nama_ayah',
													 			nama_ibu ='$nama_ibu',
													 			penghasilan ='$penghasilan',
													 			foto ='$fileName',
													 			username='$username' WHERE id_siswa='$id_siswa'") or die(mysqli_error($koneksi));
							
				if($insert){
					echo '<div class="alert alert-success" role="alert" window.location.replace="?module=siswa";>
						  <strong>Berhasil</strong> Simpan Data Berhasil
						  </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert" window.location.replace="?module=siswa";>
						  <strong>failed!</strong> Simpan Data gagal
						  </div>';
				}	
			}
		}
	?>

	<div class="card card-warning">
      	<div class="card-header">
            <h3 class="card-title">Form Ubah Data Siswa</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
						<form class="form-horizontal" action="" method="post" enctype='multipart/form-data'>
							<input type="hidden" name="id_siswa" value="<?php echo $row['id_siswa'] ?>" class="form-control" required>

							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Siswa</label>
								<div class="col-sm-12">
									<input type="text" name="nama" value="<?php echo $row['nama'] ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal Lahir</label>
								<div class="col-sm-12">
									<input type="text" name="ttl" value="<?php echo $row['ttl'] ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Warga Negara</label>
								<div class="col-sm-12">
									<input type="text" name="warga_negara" value="<?php echo $row['warga_negara'] ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-12">
									<input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Email</label>
								<div class="col-sm-12">
									<input type="text" name="email" value="<?php echo $row['email'] ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">No Handphone</label>
								<div class="col-sm-12">
									<input type="text" name="no_hp" value="<?php echo $row['no_hp'] ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Asal SMP</label>
								<div class="col-sm-12">
									<input type="text" name="asal" value="<?php echo $row['asal'] ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Ayah</label>
								<div class="col-sm-12">
									<input type="text" name="nama_ayah" value="<?php echo $row['nama_ayah'] ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Ibu</label>
								<div class="col-sm-12">
									<input type="text" name="nama_ibu" value="<?php echo $row['nama_ibu'] ?>" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Foto (JPG)</label>
								<div class="col-sm-12">
									<input type="file" name="foto" class="form-control" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-12">
									<input type="submit" name="add" class="btn btn-sm btn-warning" value="Simpan">
									<a href="?module=sub_kriteria" class="btn btn-sm btn-danger">Batal</a>
								</div>
							</div>

						</form>
						
					</div>	
			</div>
		</div>
	</div>
</section>