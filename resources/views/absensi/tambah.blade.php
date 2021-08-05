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
						  <form action="/absensi/store" method="post">
							{{ csrf_field() }}
							<div class="card-body">
							
							  <div class="form-group">
								<label for="pegawai_id">Pilih Pegawai</label>
								<select name="pegawai_id" class="form-control" required="required">
									<option value=""> - Pilih - </option>
									@foreach ($pegawais as $item)
									<option value="{{$item->id}}">{{$item->nama}}</option>
									@endforeach
								</select>
							  </div>
							
							  <div class="form-group">
								<label for="ketidakhadiran_perhari">Ketidakhadiran Perhari <i style="color:red">(1x alfa = -100,000)</i></label>
								<input value =1 readonly type="text" class="form-control" name="ketidakhadiran_perhari" required="required" placeholder="Input ketidakhadiran perhari">
							  </div>
							  <div class="form-group">
								<label for="potongan_transport_perhari">Potongan Transport Perhari <i style="color:red">(1x potongan = -50,000)</i></label>
								<input value =1 readonly type="text" class="form-control" name="potongan_transport_perhari" required="required" placeholder="Input potongan transport perhari">
							  </div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
							  <button type="submit" class="btn btn-primary">Submit</button>
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