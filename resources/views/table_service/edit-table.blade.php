@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Table-Service</title>

  <div class="container-fluid">

    <nav aria-label="breadcrumb mb-3">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/dashboard">RMS</a></li>
	    <li class="breadcrumb-item active"><a href="/dashboard">Table</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit Table</li>
	  </ol>
	</nav>
	
	<div class="container">
		<h3 class="text-center">Edit Table</h3>
		<div class="col-md-6 offset-md-3">
			<form action="{{ url('/table-service/edit-table') }}" method="post">
				@csrf
				<input name="id" type="hidden" value="{{ $table->id }}">
				<div class="form-group">
					<label for="table_name">Table Name</label>
					<input value="{{ $table->table_name }}" type="text" class="form-control" id="table_name" name="table_name">
				</div>
				<div class="form-group">
					<label for="total_customer">Total Customer</label>
					<input value="{{ $table->total_customer }}" type="number" class="form-control" id="total_customer" name="total_customer">
				</div>
				<button class="btn btn-info">Update</button>
			</form>
		</div>
	</div>

  </div>


@include('partials/footer')
