@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Absensi')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Absensi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Absensi</a></li>
              <li class="breadcrumb-item active">Input Absensi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
	
    <!-- Main content -->
    <section class="content">
	<div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
		  
        </div>
        <div class="card-body">
			<section class="content">
			  <div class="container-fluid">
				<div class="row">
				  <div class="col-12">
						<div class="card card-primary">
						  <div class="card-header">
							<h3 class="card-title">Input Absensi</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form action="{{url('absensi/update', $absen->id)}}" method="post">
							{{ csrf_field() }}
							<div class="card-body">
							  <div class="form-group">
								<input type="hidden" class="form-control" id="id" name="id" value="{{ $absen->id }}" readonly>
							  </div>
							  <div class="form-group">
								<label for="pegawai_id">Nama Pegawai</label>
								<input type="text" class="form-control" id="pegawai_id" name="pegawai_id" value="{{$absen->pegawai->nama}}" readonly>
							  </div>
							  <div class="form-group">
								<label for="ketidakhadiran_perhari">Input Ketidakhadiran perhari</label>
								<input type="number" class="form-control" id="ketidakhadiran_perhari" name="ketidakhadiran_perhari" value="{{ $absen->ketidakhadiran_perhari }}" required="required">
							  </div>
							  
							  <div class="form-group">
								<label for="potongan_transport_perhari">Input Potongan Transport Perhari</label>
								<input type="number" class="form-control" id="potongan_transport_perhari" name="potongan_transport_perhari" value="{{ $absen->potongan_transport_perhari }}" required="required">
							  </div>
							  
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
							  <button type="submit" class="btn btn-primary">Simpan</button>
							  <a href="/absensi" class="btn btn-danger">Kembali</a>
							</div>
						  </form>
						</div>
					  <!-- /.card-body -->
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
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
    </section>
	  
@endsection