<!DOCTYPE html>

<html>
	<head>
		<title>Customer</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	</head>
<body>
	<div class="container">
	@yield('content')
	</div>
</body>
<script>
	$(document).ready(function () {

	/* When click New customer button */
	$('#new-customer').click(function () {
		$('#btn-save').val("create-customer");
		$('#customer').trigger("reset");
		$('#customerCrudModal').html("Add New Customer");
		$('#crud-modal').modal('show');
	});

	/* Edit customer */
	$('body').on('click', '#edit-customer', function () {
		var customer_id = $(this).data('id');
		$.get('customers/'+customer_id+'/edit', function (data) {
			$('#customerCrudModal').html("Edit customer");
			$('#btn-update').val("Update");
			$('#btn-save').prop('disabled',false);
			$('#crud-modal').modal('show');
			$('#cust_id').val(data.id);
			$('#name').val(data.name);
			$('#email').val(data.email);
			$('#address').val(data.address);
		})
	});
	/* Show customer */
	$('body').on('click', '#show-customer', function () {
		$('#customerCrudModal-show').html("Customer Details");
		$('#crud-modal-show').modal('show');
	});

	/* Delete customer */
	$('body').on('click', '#delete-customer', function () {
		var customer_id = $(this).data("id");
		var token = $("meta[name='csrf-token']").attr("content");
		confirm("Are You sure want to delete !");

		$.ajax({
			type: "delete",
			url: "http://localhost/app_pegawai/public/customers/"+customer_id,
			data: {
				"id": customer_id,
				"_token": token,
			},
			success: function (data) {
				$('#msg').html('Customer entry deleted successfully');
				$("#customer_id" + customer_id).remove();
			},
			error: function (data) {
				console.log('Error:', data);
			}
			});
		});
	});
</script>
</html>


@extends('adminlte::page')
@section('content')
<div class="row">
	<div class="col-lg-12" style="text-align: left">
		<div >
		<h2>Data Customers</h2>
		</div>
		<br/>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-right">
			<a href="javascript:void(0)" class="btn btn-success mb-2" id="new-customer" data-toggle="modal">New Customer</a>
		</div>
	</div>
</div>

<p>Cari Data Customer :</p>
	<form action="/customers/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form>

<br/>
@if ($message = Session::get('success'))
<div class="alert alert-success">
	<p id="msg">{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Address</th>
		<th width="280px">Action</th>
	</tr>

	@foreach ($customers as $customer)
	<tr id="customer_id_{{ $customer->id }}">
		<td>{{ $customer->id }}</td>
		<td>{{ $customer->name }}</td>
		<td>{{ $customer->email }}</td>
		<td>{{ $customer->address }}</td>
		<td>
			<form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
				<a class="btn btn-info" id="show-customer" data-toggle="modal" data-id="{{ $customer->id }}" >Show</a>
				<a href="javascript:void(0)" class="btn btn-success" id="edit-customer" data-toggle="modal" data-id="{{ $customer->id }}">Edit </a>
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<a id="delete-customer" data-id="{{ $customer->id }}" class="btn btn-danger delete-user">Delete</a>
			</form>
		</td>
	</tr>
	@endforeach

</table>

{{ $customers->links() }}

<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="customerCrudModal"></h4>
			</div>
			<div class="modal-body">
				<form name="custForm" action="{{ route('customers.store') }}" method="POST">
					<input type="hidden" name="cust_id" id="cust_id" >
					@csrf
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<strong>Name:</strong>
								<input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<strong>Email:</strong>
								<input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12">
							<div class="form-group">
								<strong>Address:</strong>
								<input type="text" name="address" id="address" class="form-control" placeholder="Address" onchange="validate()" onkeypress="validate()">
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 text-center">
							<button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Submit</button>
							<button type="submit" value="submit request" class="btn btn-danger" onclick='return btnClick();'>Cancel</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Show customer modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="customerCrudModal-show"></h4>
			</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2"></div>
					<div class="col-xs-10 col-sm-10 col-md-10 ">
					@if(isset($customer->name))

					<table>
						<tr><td><strong>Name:</strong></td><td>{{$customer->name}}</td></tr>
						<tr><td><strong>Email:</strong></td><td>{{$customer->email}}</td></tr>
						<tr><td><strong>Address:</strong></td><td>{{$customer->address}}</td></tr>
						<tr><td colspan="2" style="text-align: right "><a href="{{ route('customers.index') }}" class="btn btn-danger">OK</a> </td></tr>
					</table>
					@endif
					</div>
			</div>
			</div>
		</div>
	</div>
</div>
@endsection

<script>
	error=false

	function validate()
	{
		if(document.custForm.name.value !='' && document.custForm.email.value !='' && document.custForm.address.value !='')
			document.custForm.btnsave.disabled=false
		else
			document.custForm.btnsave.disabled=true
	}
</script>