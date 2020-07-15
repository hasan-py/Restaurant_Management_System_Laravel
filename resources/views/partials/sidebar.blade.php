
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">RMS</div>
      <div class="list-group list-group-flush">
        
        <a style="color:black" href="/dashboard" class="list-group-item list-group-item-action bg-light">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
        </a>

        @if(Session::get('role')!="customer")
        <div style="cursor:pointer;" class="dropdown">
            <a class="dropdown-toggle list-group-item list-group-item-action bg-light" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-scroll"></i>
              Orders
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ url('orders/all-orders') }}">All Orders</a>
              <a class="dropdown-item" href="{{ url('orders/add-order') }}">Add Order</a>
            </div>
          </div>
          <div style="cursor:pointer;" class="dropdown">
            <a class="dropdown-toggle list-group-item list-group-item-action bg-light" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{-- <i class="fas fa-scroll"></i> --}}
              <i class="fas fa-hamburger"></i>
              Foods
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ url('foods/all-food') }}">Foods</a>
              <a class="dropdown-item" href="{{ url('foods/add-food') }}">Add Foods</a>
            </div>
          </div>
          <div style="cursor:pointer;" class="dropdown">
            <a class="dropdown-toggle list-group-item list-group-item-action bg-light" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-utensils"></i>
              Table Service
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ url('table-service/all-table') }}">All Table</a>
              <a class="dropdown-item" href="{{ url('table-service/add-table') }}">Add table</a>
            </div>
          </div>
          <a style="color:black" href="{{ url('rms/all-customer') }}" class="list-group-item list-group-item-action bg-light">
           <i class="fas fa-users"></i>
          Customer
          </a>
        @endif

        @if(Session::get('role')=="admin")
           <a style="color:black" href="{{ url('rms/all-employee') }}" class="list-group-item list-group-item-action bg-light">
           <i class="fas fa-users"></i>
          Employee
          </a>
          <div style="cursor:pointer;" class="dropdown">
            <a class="dropdown-toggle list-group-item list-group-item-action bg-light" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle"></i>
              Users
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ url('user/all-user') }}">All User</a>
              <a class="dropdown-item" href="{{ url('user/add-user') }}">Add User</a>
            </div>
          </div>
        @endif

        @if(Session::get('role')=="customer")
           <a style="color:black" href="{{ url('profile/'.Session::get('username')) }}" class="list-group-item list-group-item-action bg-light">
           <i class="fas fa-user-circle"></i>
          Profile
          </a>
        @endif
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">