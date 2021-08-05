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
            <h1>Data Gaji</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Gaji</a></li>
              <li class="breadcrumb-item active">Halaman Gaji</li>
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
						  <center>Data Gaji Pegawai </center>
						  <center>___________________________________________________________________________________________________________________</center><br/>
						  <thead>
						  <tr>
							<th>No</th>
							<th>Nama Pegawai</th>
							<th>Gaji Pokok</th>
							<th>Tunjangan Jabatan</th>
							<th>Kalkulasi Potongan</th>
							<th>Total Gaji Diterima</th>
							<th>Tanda Tangan</th>
						  </tr>
						  </thead>
						  <tbody>
							<?php $no=1; ?>
							@foreach($dataGaji as $g)
							<tr>
								
								<td>{{ $no++ }}</td>
								<td>{{ $g->pegawai->nama }}</td>
								<td>{{ number_format($g->gaji_pokok) }}</td>
								<td>{{ number_format($g->tunjangan_jabatan) }}</td>
								<td style="color:red">{{ number_format($g->kalkulasi_potongan) }}</td>
								<td style="color:green">Rp.<H3><b>{{ number_format($g->gaji_pokok + $g->tunjangan_jabatan - $g->kalkulasi_potongan) }}</b></H3></td>
								<td></td>
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