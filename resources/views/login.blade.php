@include('partials/header')

  <div class="container">
	
	{{-- Unauthorized Login message --}}
	@if(Session::get('unauthorizedLogin'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>{{ Session::get('unauthorizedLogin') }}</strong> 
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif

	<div class="card mt-5 p-md-5 p-sm-2">
		<div class="col-md-6 offset-md-3">
			<div class="card-header border-0 my-4 text-center"><h3>RMS | Login</h3></div>
			<form action="{{ url('/login') }}" method="post">
				@csrf

				{{-- Signup Success Message --}}
				@if(Session::get('message'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>{{ Session::get('message') }}</strong> 
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
				@endif
				
				{{-- Login Error message --}}
				@if(Session::get('loginError'))
					<small id="emailHelp" class="form-text" style="color:red">
						{{ Session::get('loginError') }}
					</small>
				@endif

				<div class="form-group">
					<label for="email">Email</label>
					<input required value="{{ old('email') }}" type="text" class="form-control" id="email" name="email" >
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input required type="password" class="form-control" id="password" name="password" >
				</div>
				<button class="btn btn-info mb-3">LOGIN</button>
				<p>Have't an account? Goto create one <a href="{{ route('signup') }}">SIGNUP</a></p>
			</form>
		</div>
	</div>

  </div>


@include('partials/footer')




