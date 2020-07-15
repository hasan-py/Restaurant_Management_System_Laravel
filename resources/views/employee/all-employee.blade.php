@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Employee</title>


  <div class="container-fluid">

    <nav aria-label="breadcrumb mb-3">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/dashboard">RMS</a></li>
	    <li class="breadcrumb-item active" aria-current="page">All Employee</li>
	  </ol>
	</nav>

	@if(Session::get('message'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>{{ Session::get('message') }}</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif

	<div class="container">
		<div class="row">
			<h3>Employee List</h3>
		</div>
		<div class="row">
			<table class="table table-hover table-responsive">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Profile</th>
			      <th scope="col">Role</th>
			      <th scope="col">Name</th>
			      <th scope="col">Username</th>
			      <th scope="col">Email</th>
			      <th scope="col">Profile Pic</th>
			      <th scope="col">Created at</th>
			      <th scope="col">Updated at</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if(count($users)>0)
				  	@foreach($users as $user)
					    <tr>
					      <td scope="row">{{ $index }}</td>
					      <td><a href="{{ url('profile/'.$user->username) }}" class="btn btn-sm btn-dark text-light"><i class="fas fa-eye"></a></td>
					      <td scope="row">{{ $user->role }}</td>
					      <td>{{ $user->name }}</td>
					      <td>{{ $user->username }}</td>
					      <td>{{ $user->email }}</td>
					      <td><img style="height:50px;" class="rounded-circle" src="{{ asset($user->profile_pic) }}" alt=""></td>
					      <td>{{ $user->created_at->format('d/m/Y') }}</td>
					      <td>{{ $user->updated_at->format('d/m/Y') }}</td>
					      <td>
					      	{{-- edit-user/{{ $user['id'] }} --}}
					      	<a class="btn btn-sm btn-warning m-1" href="{{ url('/user/edit-user/'.$user->id) }}" ><i class="fas fa-edit"></i></a>
					      	<a class="btn btn-sm btn-danger m-1" onclick="return confirm('Are you sure delete {{ $user->name }} ?')" href="{{ url('/user/delete-user/'.$user->id) }}"><i class="fas fa-trash"></i></a>
					      </td>
					    </tr>
					    {{-- Serial Number --}}
					    @php
					   	 $index++;
					    @endphp
				    @endforeach
				@else
					<tr>
						<td colspan="5"><h3>No table found. </h3></td>
					</tr>
			    @endif
			  </tbody>
			</table>
		</div>
	</div>

  </div>

@include('partials/footer')



