@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Foods</title>

  <div class="container-fluid">

    <nav aria-label="breadcrumb mb-3">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/dashboard">RMS</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Foods</li>
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
			<h3>Foods Table</h3>
		</div>
		<div class="row">
			<table  id="example" class="table table-hover {{-- table-responsive --}}">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Quantity</th>
			      <th scope="col">Price</th>
			      <th scope="col">Updated at</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if(count($foods)>0)
				  	@foreach($foods as $food)
					    <tr>
					      <td scope="row">{{ $index }}</td>
					      <td>{{ $food->food_name }}</td>
					      <td>{{ $food->quantity }}</td>
					      <td>{{ $food->price }}</td>
					      <td>{{ $food->updated_at->format('d/m/Y h:i:sA') }}</td>
					      <td>
					      	<a href="/foods/edit-food/{{ $food['id'] }}" style="color:lightgreen; cursor:pointer; margin:5px;" ><i class="fas fa-edit"></i></a>
					      	<a href="/foods/delete-food/{{ $food['id'] }}" style="color:tomato; cursor:pointer; margin:5px;" ><i class="fas fa-trash"></i></a>
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



