@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Users</title>

<div class="container-fluid">

    <nav aria-label="breadcrumb mb-3">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/dashboard">RMS</a></li>
	    <li class="breadcrumb-item active"><a href="/dashboard">User</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add User</li>
	  </ol>
	</nav>
	<div class="col-md-6 offset-md-3">
		<form action="{{ url('user/add-user') }}" method="post">
			@csrf
			<div class="form-group">
				<label for="name">Full Name</label>
				<input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name">
				
				@error('name')
				 <small id="emailHelp" class="form-text" style="color:red">{{ $message }}</small>
				@enderror

				</div>
			<div class="form-group">
				<label for="username">Username</label>
				<input value="{{ old('username') }}" type="text" class="form-control" id="username" name="username">
				
				@error('username')
				 <small id="emailHelp" class="form-text" style="color:red">{{ $message }}</small>
				@enderror

			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input value="{{ old('email') }}" type="text" class="form-control" id="email" name="email">
				
				@error('email')
				 <small id="emailHelp" class="form-text" style="color:red">{{ $message }}
					@if(Session::get('message'))
						{{ Session::get('message') }}
					@endif
				 </small>
				@enderror

			</div>
			
			<div class="form-group">
				<label for="email">Role</label>
				<select class="form-control" name="role">
					<option value="customer">Customer</option>
					<option value="employee">Employee</option>
					<option value="admin">Admin</option>
				</select>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password">
				
				@error('password')
				 <small id="emailHelp" class="form-text" style="color:red">{{ $message }}</small>
				@enderror

			</div>
			<div class="form-group">
				<label for="confirm_password">Confirm Password</label>
				<input type="password" class="form-control" id="confirm_password" name="confirm_password">
				
				@error('confirm_password')
				 <small id="emailHelp" class="form-text" style="color:red">{{ $message }}</small>
				@enderror

			</div>
			<button class="btn btn-info mb-3">ADD USERS</button>
		</form>
	</div>
</div>



@include('partials/footer')




