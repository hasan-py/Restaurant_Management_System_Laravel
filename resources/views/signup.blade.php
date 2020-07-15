@include('partials/header')

  <div class="container">

	<div class="card mt-5 p-md-5 p-sm-2">
		<div class="col-md-6 offset-md-3">
			<div class="card-header border-0 my-4 text-center"><h3>RMS | Signup</h3></div>
			<form action="{{ url('/signup') }}" method="post">
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
				<button class="btn btn-success mb-3">SIGNUP</button>
				<p>Already an account? Goto <a href="{{ route('login') }}">LOGIN</a></p>
			</form>
		</div>
	</div>

  </div>


@include('partials/footer')




