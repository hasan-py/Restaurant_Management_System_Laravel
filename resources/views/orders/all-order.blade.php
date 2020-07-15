@include('partials/header')
@include('partials/sidebar')
@include('partials/navber')
<title> RMS | Orders</title>

  <div class="container-fluid">

    <nav aria-label="breadcrumb mb-3">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="/dashboard">RMS</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Orders</li>
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
			<h3>Orders</h3>
			<hr>
		</div>
		<div class="row">
			<table id="example" class="table table-hover table-responsive">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Customer Name</th>
			      <th scope="col">Customer Phone</th>
			      <th scope="col">Payment Accept</th>
			      <th scope="col">Table Use</th>
			      <th scope="col">Total Food</th>
			      <th scope="col">Total Payment</th>
			      <th scope="col">Order date</th>
			      <th scope="col">Actions</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@if(count($orders)>0)
				  	@foreach($orders as $order)
					    <tr>
					      <td scope="row">{{ $index }}</td>
					      <td>{{ $order->customer_name }}</td>
					      <td>{{ $order->customer_phone }}</td>
					      <td>{{ $order->order_accept_employee }}</td>
					      <td>{{ $order->table_name }}</td>
					      <td>{{ $order->total_food }}</td>
					      <td>{{ $order->total_price }}</td>
					      <td>{{ $order->created_at->format('d/m/Y h:i:sA') }}</td>
					      <td>
					      	<a href="/orders/edit-order/{{ $order['id'] }}" style="color:lightgreen; cursor:pointer; margin:5px;" ><i class="fas fa-edit"></i></a>
					      	<a href="/orders/delete-order/{{ $order['id'] }}" style="color:tomato; cursor:pointer; margin:5px;" ><i class="fas fa-trash"></i></a>
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



