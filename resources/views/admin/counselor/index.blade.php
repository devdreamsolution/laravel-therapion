@extends('layouts.admin')
@section('content')
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor"{{ $pageTitle }}</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('admin.home') }}">{{ __('admin.home') }}</a>
			</li>
			<li class="breadcrumb-item active">{{ $pageTitle }}</li>
			</ol>
		</div>
	</div>
</div>
<div class="container-fluid">
	@if (session()->get('status'))
	<div class="alert alert-{{ session()->get('status') }}">
		<i class="ti-user"></i> {{ session()->get('message') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
	</div>
	@endif
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<a href="{{ route('admin.counselors.create') }}" class="btn waves-effect waves-light btn-secondary">
						<i class="fas fa-plus"></i> {{ __('admin.counselor.create') }}
					</a>
					<div class="table-responsive mt-2">
						<table id="dataTable" class="datatables-demo table table-striped table-bordered">
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Title</th>
									<th>Photo</th>
									<th>Email</th>
									<th style="min-width: 88px">Created At</th>
									<th style="min-width: 118px;">Action</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Title</th>
									<th>Photo</th>
									<th>Email</th>
									<th style="min-width: 88px">Created At</th>
									<th style="min-width: 118px;">Action</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables/datatables.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}">
<style>
	.counselor-avatar {
		width: 100px;
		height: 100px;
		object-fit: cover;
	}
</style>
@endpush

@push('js')
<script src="{{ asset('assets/vendor/libs/datatables/datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script>
	$('#dataTable').dataTable({
		'processing': true,
		'serverSide': true,
		'ajax': {
			'url': "{{ route('admin.counselors.index') }}",
			'type': 'GET'
		},
		'columns': [
			{'data': 'id'},
			{'data': 'name'},
			{'data': 'title'},
			{'data': 'photo'},
			{'data': 'email'},
			{'data': 'created_at'},
			{'data': 'action'},
		]
	});

	function deleteData(dataId) {
		Swal.fire({
			title: "{{ __('admin.swal.del.title') }}", 
			text: "{{ __('admin.swal.del.text') }}",
			type: 'warning',
			showCancelButton: true,
			customClass: {
				confirmButton: 'btn btn-secondary btn-lg',
				cancelButton: 'btn btn-default btn-lg'
			}
		}).then(function (result) {
			if (result.value) {
				$('#deleteForm'+dataId).submit();
			}
		})
    }
</script>
@endpush