@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')


	
  <div class="container-fluid">
	@if(Session::get("message"))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		  <strong>{{ Session::get("message") }}</strong> 
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	@endif
    <h1 class="mt-4"> Welcome, Dashboard</h1>
    <hr>
	
<!-- 	<div class="row">
	<div class="col-md-3 col-sm-12 mx-sm-auto">
		<div class="card border-success mb-3" style="max-width: 18rem;">
		  <div class="card-header bg-transparent border-success">Food</div>
		  <div class="card-body text-success">
		    <h3 class="card-title">Employee: 10 </h3>
		    <h3 class="card-title">Customer: 200</h3>
		  </div>
		  <div class="card-footer bg-transparent border-success"><button class="btn btn-success">View Details > </button></div>
		</div>
	</div>
	<div class="col-md-3 col-sm-12 mx-sm-auto">
		<div class="card border-danger mb-3" style="max-width: 18rem;">
		  <div class="card-header bg-transparent border-danger">Table Service</div>
		  <div class="card-body text-danger">
		    <h3 class="card-title">Employee: 10 </h3>
		    <h3 class="card-title">Customer: 200</h3>
		  </div>
		  <div class="card-footer bg-transparent border-danger"><button class="btn btn-danger">View Details > </button></div>
		</div>
	</div>
	<div class="col-md-3 col-sm-12 mx-sm-auto">
		<div class="card border-warning mb-3" style="max-width: 18rem;">
		  <div class="card-header bg-transparent border-warning">Users</div>
		  <div class="card-body text-warning">
		    <h3 class="card-title">Employee: 10 </h3>
		    <h3 class="card-title">Customer: 200</h3>
		  </div>
		  <div class="card-footer bg-transparent border-warning"><button class="btn btn-warning">View Details > </button></div>
		</div>
	</div>
	<div class="col-md-3 col-sm-12 mx-sm-auto">
		<div class="card border-info mb-3" style="max-width: 18rem;">
		  <div class="card-header bg-transparent border-info">Orders</div>
		  <div class="card-body text-info">
		    <h3 class="card-title">Employee: 10 </h3>
		    <h3 class="card-title">Customer: 200</h3>
		  </div>
		  <div class="card-footer bg-transparent border-info"><button class="btn btn-info">View Details > </button></div>
		</div>
	</div>
</div> -->
  </div>


@include('partials/footer')





