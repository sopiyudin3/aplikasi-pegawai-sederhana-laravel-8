@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Jabatan')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Jabatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Jabatan</a></li>
              <li class="breadcrumb-item active">Edit Jabatan</li>
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
							<h3 class="card-title">Edit Jabatan</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form action="{{url('jabatan/update', $jab->id)}}" method="post">
							{{ csrf_field() }}
							<div class="card-body">
							  <div class="form-group">
								<label for="nama">Nama Jabatan</label>
								<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="{{ $jab->nama_jabatan }}" required="required">
							  </div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
							  <button type="submit" class="btn btn-primary">Simpan</button>
							  <a href="/jabatan" class="btn btn-danger">Kembali</a>
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