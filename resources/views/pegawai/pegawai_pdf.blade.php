@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Pegawai')
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
            <h1>Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
              <li class="breadcrumb-item active">Halaman Pegawai</li>
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
						<center>Data Pegawai </center>
						  <center>___________________________________________________________________________________________________________________</center><br/>
						  <thead>
						  <tr>
							<th>No</th>
							<th>Foto</th>
							<th>Nama</th>
							<th>Alamat Rumah</th>
							<th>Alamat Kantor</th>
							<th>Umur</th>
							<th>Jabatan</th>
						  </tr>
						  </thead>
						  <tbody>
							<?php $no=1; ?>
							@foreach($dataPegawai as $p)
							<tr>
								
								<td>{{ $no++ }}</td>
								<td><img width="150px" src="{{ url('/foto_pegawai/'.$p->image) }}"></td>
								
								<td>{{ $p->nama }}</td>
								<td>{{ $p->alamat_rumah }}</td>
								<td>{{ $p->alamat_kantor }}</td>
								<td>{{ $p->umur }}</td>
								<td>
									{{ $p->jabatan->nama_jabatan }}
								</td>
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