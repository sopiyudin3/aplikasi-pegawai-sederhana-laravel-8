@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Pegawai')
<!-- Content Header (Page header) -->
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
			
           <div class="col-md-4">
		    <button class="btn btn-lg btn-default float-left">
		    <a href="/pegawai/tambah" > Tambah Pegawai</a></button>
			
           </div>
          
		  <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="/pegawai/cari" method = "GET">
                        <div class="input-group">
                            <input type="search" name = "cari" class="form-control form-control-lg" placeholder="Cari Pegawai.." value ="{{ old('cari') }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default" value ="CARI">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
		  
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
						  <thead>
						  <tr>
							<th>Foto</th>
							<th>Nama</th>
							<th>Alamat Rumah</th>
							<th>Alamat Kantor</th>
							<th>Umur</th>
							<th>Jabatan</th>
							<th>Opsi</th>
						  </tr>
						  </thead>
						  <tbody>
							@foreach($dataPegawai as $p)
							<tr>
								<td><img width="125px" src="{{ url('/foto_pegawai/'.$p->image) }}"></td>
								<td>{{ $p->nama }}</td>
								<td>{{ $p->alamat_rumah }}</td>
								<td>{{ $p->alamat_kantor }}</td>
								<td>{{ $p->umur }}</td>
								<td>
									{{ $p->jabatan->nama_jabatan }}
								</td>
								<td>
									<a href="pegawai/edit/{{ $p->id }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
									</i> Edit</a>
									<a href="/pegawai/hapus/{{ $p->id }}" onClick="return confirm('Apakah anda yakin mau menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt">
									</i> Hapus</a>
								</td>
							</tr>
							@endforeach
						  </tbody>
						</table>
					  </div>
					  <!-- /.card-body -->
					</div>
				
					<div class="card-footer">
						<div class="row">
						
							<div class="col md-4">
								{{ $dataPegawai->links() }}
							</div>
							
							<div class="col md-4">
								<a href="/pegawai/cetak_pdf" class="btn btn-warning" target="_blank">
								<i class="fas fa-print"></i> Print Data Pegawai</a>
							</div>
							
							<div class="col md-4 float-right">
								Halaman ke : <b>{{ $dataPegawai->currentPage() }}</b> <br/>
								Total Data Pegawai : <b>{{ $dataPegawai->total() }}</b>
							</div>

						</div>
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
@endsection