@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Add Oder</title>


  <div class="container-fluid">

    <nav aria-label="breadcrumb mb-3">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/dashboard">RMS</a></li>
	    <li class="breadcrumb-item active"><a href="/dashboard">Order</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Add Oder</li>
	  </ol>
	</nav>
	
	<div class="container">
		<h3 class="text-center">Add Oder</h3>
		<hr>
		<div class="col-md-6 offset-md-3">
			<form action="{{ url('orders/add-order') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="customer_name">Customer Name</label>
					<input type="text" class="form-control" id="customer_name" name="customer_name">
				</div>
				<div class="form-group">
					<label for="customer_phone">Customer Phone</label>
					<input type="number" class="form-control" id="customer_phone" name="customer_phone">
				</div>
				<input value="{{ Session::get("username") }}" type="hidden" class="form-control" name="order_accept_employee" >
				<div class="form-group">
					<label for="table_name">Table Name</label>
					<input type="text" class="form-control" id="table_name" name="table_name">
				</div>

				<div class="form-group">
					<label for="total_food">Total Food</label>
					<input type="number" class="form-control" id="total_food" name="total_food">
				</div>
				<div class="form-group">
					<label for="total_price">Total Price</label>
					<input type="number" class="form-control" id="total_price" name="total_price">
				</div>
				<button class="btn btn-success">+ Add</button>
			</form>
		</div>
	</div>

  </div>


@include('partials/footer')



