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

<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
      	<div class="card-header">
          <h3 class="card-title"> Data Siswa Baru</h3>
        </div>
            <?php
				$sql =  mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$_GET['id']'") or die(mysqli_error($koneksi));
					$no = 1;
					$row = mysqli_fetch_array($sql);
				?>
			          <div class="card-body">
			           	<div class="box-body table-responsive no-padding">
			           		<center><img src="foto/<?php echo $row["foto"] ?>" width="200px"></center>
			              <table width="50%" align="center" class="table table-bordered table-striped">
			                <thead>
								<tr>
									<th width="50%">Nama Siswa</th>
									<td width="50%">: <?php echo $row['nama'];?></td>
								</tr>

								<tr>
									<th width="50%">Tanggal Lahir</th>
									<td width="50%">: <?php echo $row['ttl'];?></td>
								</tr>

								<tr>
									<th width="50%">Warga Negara</th>
									<td width="50%">: <?php echo $row['warga_negara'];?></td>
								</tr>

								<tr>
									<th width="50%">Alamat</th>
									<td width="50%">: <?php echo $row['alamat'];?></td>
								</tr>

								<tr>
									<th width="50%">Email</th>
									<td width="50%">: <?php echo $row['email'];?></td>
								</tr>

								<tr>
									<th width="50%">No Handphone</th>
									<td width="50%">: <?php echo $row['no_hp'];?></td>
								</tr>

								<tr>
									<th width="50%">Asal SMP</th>
									<td width="50%">: <?php echo $row['asal'];?></td>
								</tr>

								<tr>
									<th width="50%">Nama Ayah</th>
									<td width="50%">: <?php echo $row['nama_ayah'];?></td>
								</tr>
								<tr>
									<th width="50%">Nama Ibu</th>
									<td width="50%">: <?php echo $row['nama_ibu'];?></td>
								</tr>
								<tr>
									<th width="50%">Penghasilan Ortu</th>
									<td width="50%">: <?php echo $row['penghasilan'];?></td>
								</tr>
							</thead>
						</table>
						<br>
						</div>
					</div>
	          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content --

	