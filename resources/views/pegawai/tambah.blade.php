@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Pegawai')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
              <li class="breadcrumb-item active">Tambah Pegawai</li>
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
							<h3 class="card-title">Tambah Pegawai</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form action="/pegawai/proses" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="card-body">
							  <div class="form-group">
								<label>Foto</label>
								<input class="form-control" type="file" name="image" placeholder="image">
							  </div>
							  <div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" name="nama" required="required" placeholder="Enter name">
							  </div>
							  <div class="form-group">
								<label for="alamat_rumah">Alamat Rumah </label>
								<textarea class="form-control" name="alamat_rumah" required="required" placeholder="Enter alamat rumah"></textarea>
							  </div>
							  <div class="form-group">
								<label for="alamat_kantor">Alamat Kantor </label>
								<textarea class="form-control" name="alamat_kantor" required="required" placeholder="Enter alamat kantor"></textarea>
							  </div>
							  <div class="form-group">
								<label for="umur">Umur</label>
								<input type="number" class="form-control" name="umur" required="required" placeholder="Enter umur">
							  </div>
							  <div class="form-group">
								<label for="jabatan_id">Jabatan</label>
								<select name="jabatan_id" class="form-control" required="required">
									<option value=""> - Pilih - </option>
									@foreach ($jabatans as $item)
									<option value="{{$item->id}}">{{$item->nama_jabatan}}</option>
									@endforeach
								</select>
							  </div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
							  <button type="submit" class="btn btn-primary">Submit</button>
							  <a href="/pegawai" class="btn btn-danger">Kembali</a>
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