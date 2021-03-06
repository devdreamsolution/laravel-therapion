@extends('layouts.admin')
@section('content')
<div class="row page-titles">
	<div class="col-md-5 align-self-center">
		<h4 class="text-themecolor">{{ $pageTitle }}</h4>
	</div>
	<div class="col-md-7 align-self-center text-right">
		<div class="d-flex justify-content-end align-items-center">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('admin.home') }}">{{ __('admin.home') }}</a>
			</li>
			<li class="breadcrumb-item">
				<a href="{{ route('admin.users.index') }}">{{ __('admin.user.title') }}</a>
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
                <!-- Form -->
                <form id="form" method="POST" action="{{ route('admin.users.update', $user->id) }}">
						
						@csrf
						@method('PUT')

						<div class="form-row">
							<div class="form-group col-md-6 col-sm-12">
								<label class="form-label" for="name">{{ __('admin.user.field.name') }} *</label>
								<input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autofocus>
								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
	
							<div class="form-group col-md-6 col-sm-12">
								<label class="form-label" for="email">{{ __('admin.user.field.email') }} *</label>
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="off">
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-6 col-sm-12">
								<label class="form-label" for="password">
								<div>{{ __('admin.user.field.password') }}</div>
								</label>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							
							<div class="form-group col-md-6 col-sm-12">
                        <label class="form-label" for="password-confirm">{{ __('admin.user.field.confirmPassword') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="off">
                    </div>
						</div>

						<div class="text-right m-0">
							<button type="submit" class="btn btn-secondary">{{ __('admin.saveExit') }}</button>
						</div>
				  </form>
				  <!-- / Form -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection