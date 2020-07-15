@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Table-Service</title>

  <div class="container-fluid">

    <nav aria-label="breadcrumb mb-3">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/dashboard">RMS</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Table Service</li>
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
			<h3>All Table</h3>
		</div>
		<div class="row">
			<table  id="example" class="table table-hover {{-- table-responsive --}}">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Table Name</th>
			      <th scope="col">Total Customer</th>
			      <th scope="col">Last Update</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if(count($tables)>0)
				  	@foreach($tables as $table)
					    <tr>
					      <td scope="row">{{ $index }}</td>
					      <td>{{ $table->table_name }}</td>
					      <td>{{ $table->total_customer }}</td>
					      <td>{{ $table->updated_at->format('d/m/Y') }}</td>
					      <td>
					      	<a href="/table-service/edit-table/{{ $table['id'] }}" style="color:lightgreen; cursor:pointer; margin:5px;" ><i class="fas fa-edit"></i></a>
					      	<a href="/table-service/delete-table/{{ $table['id'] }}" style="color:tomato; cursor:pointer; margin:5px;" ><i class="fas fa-trash"></i></a>
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



