@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Users</title>

<div class="container-fluid">

    <nav aria-label="breadcrumb mb-3">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/dashboard">RMS</a></li>
	    <li class="breadcrumb-item active"><a href="/dashboard">User</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
	  </ol>
	</nav>
	<div class="col-md-6 offset-md-3">
		<form action="{{ url('user/edit-user') }}" method="post" enctype="multipart/form-data">
			@csrf
			<input type="hidden" value="{{ $userDetails->id }}" name="id">
			<div class="form-group">
				<label for="name">Full Name</label>
				<input value="{{ $userDetails->name }}" type="text" class="form-control" id="name" name="name">
				
				@error('name')
				 <small class="form-text" style="color:red">{{ $message }}</small>
				@enderror

				</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input readonly value="{{ $userDetails->username }}" type="text" class="form-control" id="username">
				 <small class="form-text text-muted">Can't change username</small>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input readonly value="{{ $userDetails->email }}" type="text" class="form-control" id="email">
				<small  class="form-text text-muted">Can't change email</small>
			</div>
			<div class="form-group">
				<label for="email">Role</label>
				<select class="form-control" name="role">
					@if($userDetails->role == "admin")
						<option value="admin" selected>Admin</option>
						<option value="customer">Customer</option>
						<option value="employee">Employee</option>
					@endif 
					@if($userDetails->role == "employee")
						<option value="admin">Admin</option>
						<option value="customer">Customer</option>
						<option value="employee" selected>Employee</option>
					@endif 
					@if($userDetails->role == "customer")
						<option value="admin">Admin</option>
						<option value="customer" selected>Customer</option>
						<option value="employee">Employee</option>
					@endif 
				</select>
			</div>
			<button class="btn btn-info mb-3">UPDATE USER</button>
		</form>
	</div>
</div>


@include('partials/footer')




