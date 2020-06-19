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
      </div>
    </div>
  </div>
</div>

<!-- proses delete data -->
<section class="content">
  <div class="row">
    <div class="col-12">
    	<?php
			if(isset($_GET['aksi']) == 'delete'){
				$delete = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$_GET[id]'");
				if($delete){
					echo '<div class="alert alert-success" role="alert">
						  <strong>Sukses!</strong> Data berhasil Dihapus
						  </div>';
				}else{
					echo '<div class="alert alert-danger" role="alert">
						  <strong>Sukses!</strong> Data berhasil Dihapus
						  </div>';
				}
			}
			
		?>

		  <!-- proses ambil data pada database -->
	      <div class="card">
	        <div class="card-body">
		       	<div class="box-body table-responsive no-padding">
		          <table id="example1" class="table table-bordered table-striped">
		            <thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Tanggal Lahir</th>
							<th>Warga Negara</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>Nomor HP</th>
							<th>Asal SMP</th>
							<th>Nama Ayah</th>
							<th>Nama Ibu</th>
							<th>Penghasilan Ortu</th>
							<th>Foto</th>
							<th>Username</th>
							<th>Aksi</th>
						</tr>
					</thead>

					<tbody>
					<?php
					$sql =  mysqli_query($koneksi, "SELECT * FROM siswa, user WHERE siswa.username=user.username") or die(mysqli_error($koneksi));
						$no = 1;
						while($row = mysqli_fetch_array($sql)){
					?>
			
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $row['nama'];?></td>
							<td><?php echo date('d-F-Y', strtotime($row['ttl'])); ?></td>
							<td><?php echo $row['warga_negara'];?></td>
							<td><?php echo $row['alamat'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['no_hp'];?></td>
							<td><?php echo $row['asal'];?></td>
							<td><?php echo $row['nama_ayah'];?></td>
							<td><?php echo $row['nama_ibu'];?></td>
							<td align="right"><?php echo number_format($row['penghasilan']).",-"; ?></td>
							<td><img src="foto/<?php echo $row['foto'];?>" width="100px"></td>

							<td><?php echo $row['username'];?></td>
							<td width="100">
								<!-- button edit -->
								<a style="margin-bottom: 10px" href="?module=edit_siswa&id=<?php echo $row['id_siswa']; ?>" title="Edit Data" class="btn btn-warning btn-sm"><i class="nav-icon fas fa-edit"></i>Edit</a> 

								<!-- button hapus -->
								<a href="?module=siswa&aksi=delete&id=<?php echo $row['id_siswa']; ?>" title="Hapus Data" onclick="return confirm('Anda yakin akan menghapus data')" class="btn btn-danger btn-sm"> <i class="nav-icon fas fa-trash"></i> Hapus</a>
							</td>
						</tr>
						
					<?php
					$no++;
					
				}
				?>
			</tbody>
			</table>
			</div>
		</div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</section>


	