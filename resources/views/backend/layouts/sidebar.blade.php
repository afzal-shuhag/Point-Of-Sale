@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp

<!-- Sidebar Menu -->
@if(Auth::user()->approved == '1')
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    @if(Auth::user()->role == 'Admin')
    <li class="nav-item {{ ($prefix == '/users') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          User
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('users.view') }}" class="nav-link {{ ($route == 'users.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View User</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('unapprovedusers.view') }}" class="nav-link {{ ($route == 'unapprovedusers.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Approve User</p>
          </a>
        </li>

      </ul>
    </li>
    @endif

    <li class="nav-item {{ ($prefix == '/profiles') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Proile
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('profiles.view') }}" class="nav-link {{ ($route == 'profiles.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Your Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('profiles.password.view') }}" class="nav-link {{ ($route == 'profiles.password.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Change Password</p>
          </a>
        </li>

      </ul>
    </li>

  @if(Auth::user()->role == 'Admin')
    <li class="nav-item {{ ($prefix == '/employee') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tree"></i>
      <p>
        Employees
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('employee.registration.view') }}" class="nav-link {{ ($route == 'employee.registration.view') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Registration</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('employee.salary.view') }}" class="nav-link {{ ($route == 'employee.salary.view') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Salary</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('employee.leave.view') }}" class="nav-link {{ ($route == 'employee.leave.view') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Leave</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('employee.attendance.view') }}" class="nav-link {{ ($route == 'employee.attendance.view') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Attendance</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('employee.monthly.salary.view') }}" class="nav-link {{ ($route == 'employee.monthly.salary.view') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Monthly Salary</p>
        </a>
      </li>
    </ul>
  </li>


    <li class="nav-item {{ ($prefix == '/suppliers') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
         Suppliers
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('suppliers.view') }}" class="nav-link {{ ($route == 'suppliers.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Suppliers</p>
          </a>
        </li>

      </ul>
    </li>
  @endif
    <li class="nav-item {{ ($prefix == '/customers') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Customers
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('customers.view') }}" class="nav-link {{ ($route == 'customers.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Customers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('customers.credit') }}" class="nav-link {{ ($route == 'customers.credit') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Credit Customers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('customers.paid') }}" class="nav-link {{ ($route == 'customers.paid') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Paid Customers</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('customers.individual.report') }}" class="nav-link {{ ($route == 'customers.individual.report') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Customer wise Report</p>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item {{ ($prefix == '/units') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-calendar-alt"></i>
        <p>
          Units
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('units.view') }}" class="nav-link {{ ($route == 'units.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Units</p>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item {{ ($prefix == '/categories') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
          Category
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('categories.view') }}" class="nav-link {{ ($route == 'categories.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Category</p>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item {{ ($prefix == '/products') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
          Products
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('products.view') }}" class="nav-link {{ ($route == 'products.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Products</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item {{ ($prefix == '/purchases') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Purchase
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('purchases.view') }}" class="nav-link {{ ($route == 'purchases.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Purchase</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('purchases.pending.list') }}" class="nav-link {{ ($route == 'purchases.pending.list') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Approval Purchase</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('purchases.report') }}" class="nav-link {{ ($route == 'purchases.report') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Daily Purchase Report</p>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item {{ ($prefix == '/invoice') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-plus-square"></i>
        <p>
          Invoice
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('invoice.view') }}" class="nav-link {{ ($route == 'invoice.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View Invoice</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('invoice.pending.list') }}" class="nav-link {{ ($route == 'invoice.pending.list') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Approval Invoice</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('invoice.print') }}" class="nav-link {{ ($route == 'invoice.print') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Print Invoice</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('invoice.daily.report') }}" class="nav-link {{ ($route == 'invoice.daily.report') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Daily Invoice Report</p>
          </a>
        </li>

      </ul>
    </li>
    <li class="nav-item {{ ($prefix == '/stock') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Stock
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('stock.report') }}" class="nav-link {{ ($route == 'stock.report') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Stock Report</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('stock.report.supplier.product.wise') }}" class="nav-link {{ ($route == 'stock.report.supplier.product.wise') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Custom Report</p>
          </a>
        </li>

      </ul>
    </li>
    @if(Auth::user()->role == 'Admin')
  <li class="nav-item {{ ($prefix == '/setups') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-book"></i>
      <p>
        Employee Types
        <i class="fas fa-angle-left right"></i>

      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('setups.student.designation.view') }}" class="nav-link {{ ($route == 'setups.designation.subject.view') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Position</p>
        </a>
      </li>
    </ul>
  </li>
  @endif
  <li class="nav-item {{ ($prefix == '/account') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Expenditure
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('account.cost.view') }}" class="nav-link {{ ($route == 'account.cost.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Others Cost</p>
          </a>
        </li>
      </ul>
    </li>
  <li class="nav-item {{ ($prefix == '/orders') ? 'menu-open' : '' }}">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Ecommerce
          <i class="fas fa-angle-left right"></i>

        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('admin.orders') }}" class="nav-link {{ ($route == 'admin.orders') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Manage Orders</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('eproducts.view') }}" class="nav-link {{ ($route == 'eproducts.view') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View E-Products</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('eproducts.category') }}" class="nav-link {{ ($route == 'eproducts.category') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>View E-Category</p>
          </a>
        </li>
      </ul>
    </li>


      </ul>
    </li>

  </ul>
</nav>
@endif

<!-- /.sidebar-menu -->
