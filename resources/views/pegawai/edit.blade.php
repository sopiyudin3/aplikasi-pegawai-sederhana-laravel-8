@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Pegawai')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
              <li class="breadcrumb-item active">Edit Pegawai</li>
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
							<h3 class="card-title">Edit Pegawai</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form action="{{url('pegawai/update', $peg->id)}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="card-body">
							  <div class="form-group">
								<label>Ganti Foto</label>
								<input class="form-control" type="file" name="image" placeholder="image"><br/>
								<img width="150px" src="{{ url('/foto_pegawai/'.$peg->image) }}">
							  </div>
							  <div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" value="{{ $peg->nama }}" required="required">
							  </div>
							  <div class="form-group">
								<label for="alamat_rumah">Alamat Rumah </label>
								<textarea class="form-control" name="alamat_rumah" required="required">{{ $peg->alamat_rumah }}</textarea>
							  </div>
							  <div class="form-group">
								<label for="alamat_kantor">Alamat Kantor </label>
								<textarea class="form-control" name="alamat_kantor" required="required">{{ $peg->alamat_kantor }}</textarea>
							  </div>
							  <div class="form-group">
								<label for="umur">Umur</label>
								<input type="number" class="form-control" name="umur" value="{{ $peg->umur }}" required="required">
							  </div>
							  <div class="form-group">
								<label for="jabatan_id">Jabatan</label>
								<select name="jabatan_id" id="jabatan_id" class="form-control" required="required">
									<option value="{{ $peg->jabatan_id }}">{{$peg->jabatan->nama_jabatan}}</option>
									@foreach ($jab as $item)
									<option value="{{$item->id}}">{{$item->nama_jabatan}}</option>
									@endforeach
								</select>
							  </div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
							  <button type="submit" class="btn btn-primary">Simpan</button>
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