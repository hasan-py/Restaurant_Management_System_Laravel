@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Edit Food</title>


  <div class="container-fluid">

    <nav aria-label="breadcrumb mb-3">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/dashboard">RMS</a></li>
	    <li class="breadcrumb-item active"><a href="/dashboard">Food</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Edit Food</li>
	  </ol>
	</nav>
	
	<div class="container">
		<h3 class="text-center">Edit Food</h3>
		<hr>
		<div class="col-md-6 offset-md-3">
			<form action="{{ url('/foods/edit-food') }}" method="post">
				@csrf
				<input type="hidden" value="{{ $food->id }}" name="id">
				<div class="form-group">
					<label for="table_name">Food Name</label>
					<input value="{{ $food->food_name }}" type="text" class="form-control" id="table_name" name="food_name">
				</div>
				<div class="form-group">
					<label for="total_customer">Price</label>
					<input value="{{ $food->price }}" type="number" class="form-control" id="total_customer" name="price">
				</div>
				<div class="form-group">
					<label for="total_customer">Quantity</label>
					<input value="{{ $food->quantity }}" type="number" class="form-control" id="total_customer" name="quantity">
				</div>
				<button class="btn btn-success">Edit</button>
			</form>
		</div>
	</div>

  </div>


@include('partials/footer')



