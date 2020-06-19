<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Siswa Baru</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?module=home">Beranda</a></li>
          <li class="breadcrumb-item active">Data Siswa Baru</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
			
			<?php
			if(isset($_POST['add'])){
				
			    // cari data siswa dengan nama
			    $sql=mysqli_query($koneksi, "SELECT COUNT(nama) As jumlah FROM siswa WHERE username='$_POST[nama]'");
			    $data=mysqli_fetch_array($sql);
			    if($data["jumlah"]>0)
				{
					?>
						<script type="text/javascript">
							alert("Data sudah diinput, jika ada perubahan silahkan lakukan pengeditan data");
							window.location.href="?module=siswa";
						</script>
					<?php  
				}else{
							 $nama					= $_POST['nama'];
							 $ttl					= $_SESSION['ttl'];
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

							 move_uploaded_file($file_temp, "$folder/$nama_file_pdf"); //fungsi upload
							 $insert = mysqli_query($koneksi, "INSERT INTO siswa(
																 					nama, 
																 					ttl, 
																 					warga_negara, 
																 					alamat,
																 					email,
																 					no_hp,
																 					asal,
																 					nama_ayah,
																 					nama_ibu,
																 					penghasilan, 
																 					foto)
															 				 VALUES('$nama', 
																 					'$ttl', 
																 					'$warga_negara',
																 					'$alamat',
																 					'$email',
																 					'$no_hp',
																 					'$asal',
																 					'$nama_ayah',
																 					'$nama_ibu',
																 					'$penghasilan',
																 					'$fileName')") or die(mysqli_error($koneksi));
							
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
                    <h3 class="card-title">Form Tambah Data Siswa</h3>
                      </div>
						
						<form class="form-horizontal" action="" method="post" enctype='multipart/form-data'>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Siswa</label>
								<div class="col-sm-12">
									<input type="text" name="nama" class="form-control" required>
								</div>
							</div>	

							<div class="form-group">
								<label class="col-sm-3 control-label">Tanggal Lahir</label>
								<div class="col-sm-12">
									<input type="date" name="ttl" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Warga Negara</label>
								<div class="col-sm-12">
									<input type="text" name="warga_negara" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-12">
									<input type="text" name="alamat" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Email</label>
								<div class="col-sm-12">
									<input type="text" name="email" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Nomor Hp</label>
								<div class="col-sm-12">
									<input type="text" name="no_hp" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Asal SMP</label>
								<div class="col-sm-12">
									<input type="text" name="asal" class="form-control" required>
								</div>
							</div>	

							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Ayah</label>
								<div class="col-sm-12">
									<input type="text" name="nama_ayah" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Nama Ibu</label>
								<div class="col-sm-12">
									<input type="text" name="nama_ibu" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Penghasilan</label>
								<div class="col-sm-12">
									<input type="text" name="penghasilan" class="form-control" required>
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


<script>
	function Desimal(obj){
    a=obj.value; 
    var reg=new RegExp(/[0-9]+(?:\.[0-9]{0,2})?/g)
    b=a.match(reg,'');
    if(b==null){
        obj.value='';
    }else{
        obj.value=b[0];
    }
   
}
</script>