@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Absensi')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pegawai</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.min.css">

	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Absensi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Absensi</a></li>
              <li class="breadcrumb-item active">Halaman Absensi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
	
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <div class="card-body">
			<section class="content">
			  <div class="container-fluid">
				<div class="row">
				  <div class="col-12">
					<div class="card">
					  <!-- /.card-header -->
					  <div class="card-body">
					  
						<table id="example1" class="table table-bordered table-striped">
						  <center>Data Absensi Pegawai </center>
						  <center>___________________________________________________________________________________________________________________</center><br/>
						  <thead>
						  <tr>
							<th>No</th>
							<th>Nama Pegawai</th>
							<th>Ketidakhadiran Perhari</th>
							<th>Potongan Transport Perhari</th>
							<th>Total Kalkulasi Potongan</th>
						  </tr>
						  </thead>
						  <tbody>
							<?php $no=1; ?>
							@foreach($dataAbsensi as $a)
							<tr>
								
								<td>{{ $no++ }}</td>
								<td>{{ $a->pegawai->nama }}</td>
								<td>{{ number_format($a->ketidakhadiran_perhari * 100000) }}</td>
								<td>{{ number_format($a->potongan_transport * 50000) }}</td>
								<td style="color:red">{{ number_format($a->ketidakhadiran_perhari * 100000 + $a->potongan_transport_perhari * 50000) }}</td>
							</tr>
							@endforeach
						  </tbody>
						</table>
						
					  </div>
					  <!-- /.card-body -->
					</div>
					<!-- /.card -->
				  </div>
				  <!-- /.col -->
				</div>
				<!-- /.row -->
			  </div>
			  <!-- /.container-fluid -->
			</section>
		
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>

<script>
  window.addEventListener("load", window.print());
</script>


@endsection