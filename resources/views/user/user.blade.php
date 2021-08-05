@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'User')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Halaman User</li>
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
		  <a href="/user/tambah" > Tambah User</a></button>
                </div>
          
		  
		  <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="/user/cari" method = "GET">
                        <div class="input-group">
                            <input type="search" name = "cari" class="form-control form-control-lg" placeholder="Cari User.." value ="{{ old('cari') }}">
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
							<th>Nama User</th>
							<th>Email</th>
							<th>Password</th>
							<th>Opsi</th>
						  </tr>
						  </thead>
						  <tbody>
							@foreach($dataUser as $u)
							<tr>
								
								<td>{{ $u->name }}</td>
								<td>{{ $u->email }}</td>
								<td>{{ $u->password }}</td>
								<td>
									<a href="/user/edit/{{ $u->id }}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt">
									</i> Edit</a>
									<a href="/user/hapus/{{ $u->id }}" onClick="return confirm('Apakah anda yakin mau menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt">
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
								{{ $dataUser->links() }}
							</div>
							<div class="col md-4">
							</div>
							<div class="col md-4 float-right">
								Halaman ke : <b>{{ $dataUser->currentPage() }}</b> <br/>
								Total Data Pegawai : <b>{{ $dataUser->total() }}</b>
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