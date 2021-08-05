@extends('adminlte::page')
@section('content')
@section('judul_halaman', 'User')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Tambah User</li>
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
							<h3 class="card-title">Tambah User</h3>
						  </div>
						  <!-- /.card-header -->
						  <!-- form start -->
						  <form action="/user/store" method="post">
							{{ csrf_field() }}
							<div class="card-body">
							  <div class="form-group">
								<label for="nama">Nama User</label>
								<input type="text" class="form-control" name="name" required="required" placeholder="Enter name">
							  </div>
							  <div class="form-group">
								<label for="nama">Email</label>
								<input type="text" class="form-control" name="email" required="required" placeholder="Enter email">
							  </div>
							  <div class="form-group">
								<label for="nama">Password</label>
								<input type="text" class="form-control" name="password" required="required" placeholder="Enter password">
							  </div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
							  <button type="submit" class="btn btn-primary">Submit</button>
							  <a href="/user" class="btn btn-danger">Kembali</a>
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