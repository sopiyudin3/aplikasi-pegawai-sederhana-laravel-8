@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Gaji')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Gaji</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Gaji</a></li>
              <li class="breadcrumb-item active">Input Gaji</li>
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
							<h3 class="card-title">Input Gaji</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form action="/gaji/store" method="post">
							{{ csrf_field() }}
							<div class="card-body">
							  <div class="form-group">
								<label for="pegawai_id">Select Pegawai:</label>
								<select name="pegawai_id" class="form-control" required="required">
									<option value=""> - Pilih - </option>
									@foreach ($dataPegawai as $item)
									<option value="{{$item->id}}">{{$item->nama}}</option>
									@endforeach
								</select>
							  </div>
							  <div class="form-group">
								<label for="gaji_pokok">Gaji Pokok</label>
								<input value=5000000 readonly type="number" class="form-control" name="gaji_pokok" required="required">
							  </div>
							  <div class="form-group">
								<label for="tunjangan_jabatan">Select Tunjangan:</label>
								<select name="tunjangan_jabatan" class="form-control" required="required">
									<option value=""> - Pilih - </option>
									<option value=1000000> Direktur Utama - Rp.1,000,000</option>
									<option value=800000> Kepala CTO - Rp.800,000</option>
									<option value=500000> Programmer - Rp.500,000</option>
									<option value=500000> Admin - Rp.500,000</option>
									<option value=0> (Belum punya tunjangan) </option>
								</select>
							  </div>
							  
							  <div class="form-group">
								<label for="kalkulasi_potongan">Kalkulasi Potongan</label>
								<input type="number" class="form-control" name="kalkulasi_potongan" required="required">
							  </div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
							  <button type="submit" class="btn btn-primary">Submit</button>
							  <a href="/gaji" class="btn btn-danger">Kembali</a>
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
    </script>