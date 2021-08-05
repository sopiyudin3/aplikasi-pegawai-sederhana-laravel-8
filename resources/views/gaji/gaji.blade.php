@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'Gaji')
<!-- Content Header (Page header) -->
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
			
           <div class="col-md-4">
		    <button class="btn btn-lg btn-default float-left">
		    <a href="/gaji/tambah" > Input Gaji</a></button>
           </div>
          
		  
		  <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="/gaji/cari" method = "GET">
                        <div class="input-group">
                            <input type="search" name = "cari" class="form-control form-control-lg" placeholder="Cari Gaji.." value ="{{ old('cari') }}">
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
							<th>Gaji Pokok</th>
							<th>Input Tunjangan Jabatan</th>
							<th>Input Kalkulasi Potongan</th>
							<th>Total Gaji Diterima</th>
							<th>Opsi</th>
						  </tr>
						  </thead>
						  <tbody>
							@foreach($dataGaji as $g)
							<tr>
								
								<td>{{ $g->pegawai->nama }} </td>
								<td>{{ number_format($g->gaji_pokok) }}</td>
								<td>{{ number_format($g->tunjangan_jabatan) }}</td>
								<td style="color:red">{{ number_format($g->kalkulasi_potongan) }}</td>
								<td style="color:green">Rp.<H3><b>{{ number_format($g->gaji_pokok + $g->tunjangan_jabatan - $g->kalkulasi_potongan) }}</b></H3></td>
								<td>
									<a href="gaji/edit/{{ $g->id }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
									</i> Edit</a>
									<a href="/gaji/hapus/{{ $g->id }}" onClick="return confirm('Ambil gaji sekarang?')" class="btn btn-success btn-sm"><i class="fas fa-dollar-sign">
									</i> Ambil Gaji</a>
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
								{{ $dataGaji->links() }}
							</div>
							
							<div class="col md-4">
								<a href="/gaji/cetak_pdf" class="btn btn-warning" target="_blank">
								<i class="fas fa-print"></i> Print Data Gaji</a>
							</div>
							
							<div class="col md-4 float-right">
								Halaman ke : <b>{{ $dataGaji->currentPage() }}</b> <br/>
								Total Data Gaji : <b>{{ $dataGaji->total() }}</b>
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