@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Profile | {{ $user->name }} </title>
<link rel="stylesheet" href="{{ asset('./css/profile.css') }}">

<div class="container mb-5">
	<div class="twPc-div">
    <a class="twPc-bg twPc-block"></a>

	<div>
		<div class="twPc-button">
			<button class="btn btn-lg btn-info">{{ $user->role }}</button>
		</div>

		<a title="Mert S. Kaplan" href="https://twitter.com/mertskaplan" class="twPc-avatarLink">
			<img alt="{{ $user->name }}" src="{{ asset($user->profile_pic) }}" class="twPc-avatarImg">
		</a>

		<div class="twPc-divUser my-5">
			<div class="twPc-divName">
				<h1 class="display-3">{{ $user->name }}</h1>
				<span>
					<a class="font-weight-light">@<span>{{ $user->username }}</span></a>
					<p style="font-size:13px;" class="text-muted font-weight-light">Join on {{ $user->created_at->format('d/m/Y') }} </p>
				</span>
			</div>
			<hr>
		</div>
	</div>
	
	{{-- Edit Profile Options for logged in users --}}
	@if(Session::get('username')==$user->username && Session::get('id')==$user->id)
		<div class="container mb-5">
			<h1 class="font-weight-light">Edit Profile</h1>
			<hr>

			@if(Session::get('message'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				  <strong>{{ Session::get('message') }}</strong>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			@endif

			<div class="col-md-6">
				<form action="{{ url('profile/edit-profile') }}" method="post" enctype="multipart/form-data">
				@csrf
					<input type="hidden" value="{{ $user->id }}" name="id">
					<input type="hidden" value="{{ $user->username }}" name="username">
					<input type="hidden" value="{{ $user->profile_pic }}" name="oldpic">
					<div class="form-group">
						<label for="name">Full Name</label>
						<input value="{{ $user->name }}" type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input readonly value="{{ $user->username }}" type="text" class="form-control" id="username">
						 <small class="form-text text-muted">Can't change username</small>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input readonly value="{{ $user->email }}" type="text" class="form-control" id="email">
						<small class="form-text text-muted">Can't change email</small>
					</div>
					<div class="form-group">
						<label for="email">Image</label>
						<img height="200px" class="rounded-circle" src="{{ asset($user->profile_pic) }}" alt="{{ $user->profile_pic }}">
						<input type="file" class="form-control" name="profile_pic">
						<small class="form-text text-muted">Max-size 2 mb</small>
					</div>
					<button type="submit" class="btn btn-sm btn-success mb-3">Update</button>
				</form>
			</div>
		</div>
	@endif
</div>

</div>
  
@include('partials/footer')



