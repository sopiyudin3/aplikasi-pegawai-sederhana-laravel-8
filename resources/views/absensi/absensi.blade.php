@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Absensi')
<!-- Content Header (Page header) -->
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
			
                <div class="col-md-4">
		  <button class="btn btn-lg btn-default float-left">
		  <a href="/absensi/tambah" > Tambah Absensi</a></button>
                </div>
          
		  
		  <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="/absensi/cari" method = "GET">
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
							<th>Nama Pegawai</th>
							<th>Ketidakhadiran Perhari</th>
							<th>Potongan Transport Perhari</th>
							<th>Total Kalkulasi Potongan</th>
							<th>Opsi</th>
						  </tr>
						  </thead>
						  <tbody>
							@foreach($dataAbsensi as $a)
							<tr>
								<td>{{ $a->pegawai->nama }}</td>
								<td>{{ number_format($a->ketidakhadiran_perhari * 100000) }}</td>
								<td>{{ number_format($a->potongan_transport_perhari * 50000) }}</td>
								<td style="color:red">Rp.<H3>{{ number_format($a->ketidakhadiran_perhari * 100000 + $a->potongan_transport_perhari * 50000) }}</H3></td>
								<td>
									<a href="/absensi/edit/{{ $a->id }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
									</i> Input</a>
									<a href="/absensi/hapus/{{ $a->id }}" onClick="return confirm('Apakah anda yakin mau menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt">
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
								{{ $dataAbsensi->links() }}
							</div>
							<div class="col md-4">
								<a href="/absensi/cetak_pdf" class="btn btn-warning" target="_blank">
								<i class="fas fa-print"></i> Print Data Absensi</a>
							</div>
							<div class="col md-4 float-right">
								Halaman ke : <b>{{ $dataAbsensi->currentPage() }}</b> <br/>
								Total Data Absensi : <b>{{ $dataAbsensi->total() }}</b>
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