 <?php
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/register', function () {
    // return redirect('/register');
    return view('auth.register');
});


// Route::get('/test-mail', function () {
//   try{
//
//     Mail::to('wall.mate@gmail.com')->send(new TestMail('it is work'));
//
//   }catch(\Exception $e){
//     dd($e);
//   }
//
//   return 'Success';
//
// });


Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', 'Backend\RegisterController@view')->name('registerrr');
Route::post('/register/storw', 'Backend\RegisterController@register')->name('reg.store');
Route::get('/verify', 'Backend\RegisterController@everify')->name('everify');
Route::post('/verify/login', 'Backend\RegisterController@verify_login')->name('verify.login');

Route::group(['middleware' => 'auth'], function(){

  //chat
  Route::get('/chat', 'Backend\ChatController@view')->name('chat');
  Route::post('/chat/store', 'Backend\ChatController@store')->name('chat.store');
  Route::post('/chat/store/individual', 'Backend\ChatController@individualStore')->name('chat.store.individual');
  Route::get('/chat/individual', 'Backend\ChatController@chatIndividual')->name('chat.individual');

  //GroupChat
  Route::get('/group/chat/add', 'Backend\GroupChatController@add')->name('group.chat.add');
  Route::post('/group/chat/create', 'Backend\GroupChatController@create')->name('group.chat.create');
  Route::get('/custom/group/chat', 'Backend\GroupChatController@customGroupView')->name('group.custom.chat');
  Route::post('/group/chat/store', 'Backend\GroupChatController@store')->name('group.chat.store');

    Route::prefix('users')->group(function(){
        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/approve/{id}', 'Backend\UserController@approve')->name('users.approve');
        Route::get('/unapproved/view', 'Backend\UserController@viewUnapprove')->name('unapprovedusers.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::post('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/update/{id}', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
    });

    Route::prefix('suppliers')->group(function(){
        Route::get('/view', 'Backend\SupplierController@view')->name('suppliers.view');
        Route::get('/add', 'Backend\SupplierController@add')->name('suppliers.add');
        Route::post('/store', 'Backend\SupplierController@store')->name('suppliers.store');
        Route::get('/edit/{id}', 'Backend\SupplierController@edit')->name('suppliers.edit');
        Route::post('/update/{id}', 'Backend\SupplierController@update')->name('suppliers.update');
        Route::post('/delete/{id}', 'Backend\SupplierController@delete')->name('suppliers.delete');
    });

    Route::prefix('customers')->group(function(){
        Route::get('/view', 'Backend\CustomerController@view')->name('customers.view');
        Route::get('/add', 'Backend\CustomerController@add')->name('customers.add');
        Route::post('/store', 'Backend\CustomerController@store')->name('customers.store');
        Route::get('/edit/{id}', 'Backend\CustomerController@edit')->name('customers.edit');
        Route::post('/update/{id}', 'Backend\CustomerController@update')->name('customers.update');
        Route::post('/delete/{id}', 'Backend\CustomerController@delete')->name('customers.delete');
        Route::get('/credit', 'Backend\CustomerController@creditCustomer')->name('customers.credit');
        Route::get('/credit/pdf', 'Backend\CustomerController@creditCustomerPdf')->name('customers.credit.pdf');
        Route::get('/invoice/edit/{invoice_id}', 'Backend\CustomerController@invoiceEdit')->name('invoice.edit');
        Route::post('/invoice/update/{invoice_id}', 'Backend\CustomerController@invoiceUpdate')->name('invoice.update');
        Route::get('/invoice/details/pdf/{invoice_id}', 'Backend\CustomerController@invoiceDetailsPdf')->name('invoice.details.pdf');
        Route::get('/paid', 'Backend\CustomerController@paidCustomer')->name('customers.paid');
        Route::get('/paid/pdf', 'Backend\CustomerController@paidCustomerPdf')->name('customers.paid.pdf');
        Route::get('/individual/report', 'Backend\CustomerController@customerWiseReport')->name('customers.individual.report');
        Route::get('/individual/credit/report', 'Backend\CustomerController@customerWiseCreditReport')->name('customers.individual.report.credit');
        Route::get('/individual/paid/report', 'Backend\CustomerController@customerWisePaidReport')->name('customers.individual.report.paid');
    });

    Route::prefix('units')->group(function(){
        Route::get('/view', 'Backend\UnitController@view')->name('units.view');
        Route::get('/add', 'Backend\UnitController@add')->name('units.add');
        Route::post('/store', 'Backend\UnitController@store')->name('units.store');
        Route::get('/edit/{id}', 'Backend\UnitController@edit')->name('units.edit');
        Route::post('/update/{id}', 'Backend\UnitController@update')->name('units.update');
        Route::post('/delete/{id}', 'Backend\UnitController@delete')->name('units.delete');
    });

    Route::prefix('categories')->group(function(){
        Route::get('/view', 'Backend\CategoryController@view')->name('categories.view');
        Route::get('/add', 'Backend\CategoryController@add')->name('categories.add');
        Route::get('/ecat/add', 'Backend\CategoryController@ecatadd')->name('ecategories.add');
        Route::post('/store', 'Backend\CategoryController@store')->name('categories.store');
        Route::post('/ecat/store', 'Backend\CategoryController@ecatstore')->name('ecategories.store');
        Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}', 'Backend\CategoryController@update')->name('categories.update');
        Route::post('/delete/{id}', 'Backend\CategoryController@delete')->name('categories.delete');
    });

    Route::prefix('products')->group(function(){
        Route::get('/view', 'Backend\ProductController@view')->name('products.view');
        Route::get('/add', 'Backend\ProductController@add')->name('products.add');
        Route::post('/store', 'Backend\ProductController@store')->name('products.store');
        Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('products.edit');
        Route::post('/update/{id}', 'Backend\ProductController@update')->name('products.update');
        Route::post('/delete/{id}', 'Backend\ProductController@delete')->name('products.delete');

        Route::get('/eview', 'Backend\ProductController@eview')->name('eproducts.view');
        Route::get('/eadd', 'Backend\ProductController@eadd')->name('eproducts.add');
        Route::post('/estore', 'Backend\ProductController@estore')->name('eproducts.store');
        Route::get('/eedit/{id}', 'Backend\ProductController@eedit')->name('eproducts.edit');
        Route::post('/eupdate/{id}', 'Backend\ProductController@eupdate')->name('eproducts.update');
        Route::post('/edelete/{id}', 'Backend\ProductController@edelete')->name('eproducts.delete');

        Route::get('/ecat', 'Backend\CategoryController@ecatview')->name('eproducts.category');
    });

    Route::prefix('purchases')->group(function(){
        Route::get('/view', 'Backend\PurchaseController@view')->name('purchases.view');
        Route::get('/add', 'Backend\PurchaseController@add')->name('purchases.add');
        Route::post('/store', 'Backend\PurchaseController@store')->name('purchases.store');
        Route::get('/approaval/pending', 'Backend\PurchaseController@pendingApproval')->name('purchases.pending.list');
        Route::post('/approve/{id}', 'Backend\PurchaseController@approve')->name('purchases.approve');
        Route::post('/delete/{id}', 'Backend\PurchaseController@delete')->name('purchases.delete');
        Route::get('/report', 'Backend\PurchaseController@purchaseReport')->name('purchases.report');
        Route::get('/report/pdf', 'Backend\PurchaseController@purchaseReportPdf')->name('purchases.report.pdf');
    });

    Route::get('/get-category', 'Backend\DefaultController@getCategory')->name('get-category');
    Route::get('/get-product', 'Backend\DefaultController@getProduct')->name('get-product');
    Route::get('/get-stock', 'Backend\DefaultController@getStock')->name('check-product-stock');

    Route::prefix('invoice')->group(function(){
        Route::get('/view', 'Backend\InvoiceController@view')->name('invoice.view');
        Route::get('/add', 'Backend\InvoiceController@add')->name('invoice.add');
        Route::post('/store', 'Backend\InvoiceController@store')->name('invoice.store');
        Route::get('/approaval/pending', 'Backend\InvoiceController@pendingApproval')->name('invoice.pending.list');
        Route::get('/approve/{id}', 'Backend\InvoiceController@approve')->name('invoice.approve');
        Route::post('/delete/{id}', 'Backend\InvoiceController@delete')->name('invoice.delete');
        Route::post('/approve/store/{id}', 'Backend\InvoiceController@approvalStore')->name('approval.store');
        Route::get('/print/list', 'Backend\InvoiceController@printInvoice')->name('invoice.print');
        Route::get('/print/{id}', 'Backend\InvoiceController@printInvoiceDo')->name('invoice.print.do');
        Route::get('/daily/report', 'Backend\InvoiceController@dailyReport')->name('invoice.daily.report');
        Route::get('/daily/report/pdf', 'Backend\InvoiceController@dailyReportPdf')->name('invoice.daily.report.pdf');
    });

    Route::prefix('stock')->group(function(){
        Route::get('/report', 'Backend\StockController@stockReport')->name('stock.report');
        Route::get('/report/pdf', 'Backend\StockController@stockReportPdf')->name('stock.report.pdf');
        Route::get('/report/supplier-product/wise', 'Backend\StockController@supplierProductWise')->name('stock.report.supplier.product.wise');
        Route::get('/report/supplier-product/wise/pdf', 'Backend\StockController@supplierWisePdf')->name('stock.report.supplier.product.wise.pdf');
        Route::get('/report/product/wise/pdf', 'Backend\StockController@productWisePdf')->name('stock.report.product.wise.pdf');
    });

    Route::prefix('employee')->group(function(){
      //Registration
      Route::get('/reg/view', 'Backend\Employee\EmployeeRegController@view')->name('employee.registration.view');
      Route::get('/reg/add', 'Backend\Employee\EmployeeRegController@add')->name('employee.registration.add');
      Route::post('/reg/store', 'Backend\Employee\EmployeeRegController@store')->name('employee.registration.store');
      Route::get('/reg/edit/{id}', 'Backend\Employee\EmployeeRegController@edit')->name('employee.registration.edit');
      Route::post('/reg/update/{id}', 'Backend\Employee\EmployeeRegController@update')->name('employee.registration.update');
      Route::get('/reg/details/{id}', 'Backend\Employee\EmployeeRegController@details')->name('employee.registration.details');

      //Salary
      Route::get('/salary/view', 'Backend\Employee\EmployeeSalaryController@view')->name('employee.salary.view');
      Route::get('/salary/increment/{id}', 'Backend\Employee\EmployeeSalaryController@increment')->name('employee.salary.increment');
      Route::post('/salary/update/{id}', 'Backend\Employee\EmployeeSalaryController@update')->name('employee.salary.update');
      Route::get('/salary/details/{id}', 'Backend\Employee\EmployeeSalaryController@details')->name('employee.salary.details');

      //Employee Leave
      Route::get('/leave/view', 'Backend\Employee\EmployeeLeaveController@view')->name('employee.leave.view');
      Route::get('/leave/add', 'Backend\Employee\EmployeeLeaveController@add')->name('employee.leave.add');
      Route::post('/leave/store', 'Backend\Employee\EmployeeLeaveController@store')->name('employee.leave.store');
      Route::get('/leave/edit/{id}', 'Backend\Employee\EmployeeLeaveController@edit')->name('employee.leave.edit');
      Route::post('/leave/update/{id}', 'Backend\Employee\EmployeeLeaveController@update')->name('employee.leave.update');

      //Employee Attendance
      Route::get('/attendance/view', 'Backend\Employee\EmployeeAttendanceController@view')->name('employee.attendance.view');
      Route::get('/attendance/add', 'Backend\Employee\EmployeeAttendanceController@add')->name('employee.attendance.add');
      Route::post('/attendance/store', 'Backend\Employee\EmployeeAttendanceController@store')->name('employee.attendance.store');
      Route::get('/attendance/edit/{date}', 'Backend\Employee\EmployeeAttendanceController@edit')->name('employee.attendance.edit');
      Route::get('/attendance/details/{date}', 'Backend\Employee\EmployeeAttendanceController@details')->name('employee.attendance.details');

      //Employee Monthly Salary
      Route::get('/monthly/salary/view', 'Backend\Employee\MonthlySalaryController@view')->name('employee.monthly.salary.view');
      Route::get('/monthly/salary/get', 'Backend\Employee\MonthlySalaryController@getSalary')->name('employee.monthly.salary.get');
      Route::get('/monthly/salary/payslip/{employee_id}', 'Backend\Employee\MonthlySalaryController@payslip')->name('employee.monthly.salary.payslip');
    });

    Route::prefix('setups')->group(function(){
      //Designation
        Route::get('/student/designation/view', 'Backend\Setup\DesignationController@view')->name('setups.student.designation.view');
        Route::get('/student/designation/add', 'Backend\Setup\DesignationController@add')->name('setups.student.designation.add');
        Route::post('/student/designation/store', 'Backend\Setup\DesignationController@store')->name('setups.student.designation.store');
        Route::get('/student/designation/edit/{id}', 'Backend\Setup\DesignationController@edit')->name('setups.student.designation.edit');
        Route::post('/student/designation/update/{id}', 'Backend\Setup\DesignationController@update')->name('setups.student.designation.update');
        Route::post('/student/designation/delete/{id}', 'Backend\Setup\DesignationController@delete')->name('setups.student.designation.delete');
    });

    Route::prefix('notices')->group(function(){
      //Notices
      Route::get('/notices/view', 'Backend\NoticesController@view')->name('notices.view');
      Route::get('/notices/add', 'Backend\NoticesController@add')->name('notices.add');
      Route::post('/notices/store', 'Backend\NoticesController@store')->name('notices.store');
      Route::get('/notices/edit', 'Backend\NoticesController@edit')->name('notices.edit');
      Route::post('/notices/update', 'Backend\NoticesController@update')->name('notices.update');
      Route::get('/notices/delete/{id}', 'Backend\NoticesController@delete')->name('notices.delete');
    });

    Route::prefix('account')->group(function(){
      //Others Cost
      Route::get('/cost/view', 'Backend\Account\OtherCostController@view')->name('account.cost.view');
      Route::get('/cost/add', 'Backend\Account\OtherCostController@add')->name('account.cost.add');
      Route::post('/cost/store', 'Backend\Account\OtherCostController@store')->name('account.cost.store');
      Route::get('/cost/edit/{id}', 'Backend\Account\OtherCostController@edit')->name('account.cost.edit');
      Route::post('/cost/update/{id}', 'Backend\Account\OtherCostController@update')->name('account.cost.update');
    });

    //Orders Routes
    Route::group(['prefix'=>'orders'], function(){

      Route::get('/', 'Backend\OrdersController@index')->name('admin.orders');
      Route::get('/view/{id}', 'Backend\OrdersController@show')->name('admin.order.show');
      Route::post('/delete/{id}', 'Backend\OrdersController@delete')->name('admin.order.delete');

      Route::post('/completed/{id}', 'Backend\OrdersController@completed')->name('admin.order.completed');
      Route::post('/paid/{id}', 'Backend\OrdersController@paid')->name('admin.order.paid');

      Route::post('/charge-update/{id}', 'Backend\OrdersController@chargeUpdate')->name('admin.order.charge');
      Route::get('/invoice/{id}', 'Backend\OrdersController@generateInvoice')->name('admin.order.invoice');


    });

});
//
// Route::get('/ecommerce', function () {
//     // return redirect('/register');
//     return view('frontend.pages.index');
// });
 Route::get('/ecommerce', 'Frontend\ProductController@index')->name('frontend.index');
 Route::get('/ecommerce/product/{cat_id}', 'Frontend\ProductController@cat_product')->name('frontend.product.cat');
 Route::get('/ecommerce/product/details/{id}', 'Frontend\ProductController@product_details')->name('frontend.product.details');

 //carts Routes
Route::group(['prefix'=>'carts'], function(){

  Route::get('/ecommerce', 'Frontend\CartsController@index')->name('carts');
  Route::post('/ecommerce/store', 'Frontend\CartsController@store')->name('carts.store');
  Route::post('/ecommerce/update/{id}', 'Frontend\CartsController@update')->name('carts.update');
  Route::post('/ecommerce/delete/{id}', 'Frontend\CartsController@destroy')->name('carts.delete');
});

//checkout Routes
Route::group(['prefix'=>'checkout'], function(){

  Route::get('/ecommerce', 'Frontend\CheckoutsController@index')->name('checkouts');
  Route::post('/ecommerce/store', 'Frontend\CheckoutsController@store')->name('checkouts.store');
});






// User Management		Adding users	List of users	Removing Users
//
// Profile		Showing Profile	Editing Profile	Changing Password
//
// Company		Details 	List
//
// Customers		Details	List 	Customers Due	Paid Customers report
//
// Products		Price	Stock	Details
//
// Category		Products Brand	 Category	Categories 	Management
//
// Expenses		Details
//
// Invoice		Customers Report of invoice after selling products
//
// Employees List		This is unique idea as we haven't found this features in others softwares
//
// Notices		This is also unique idea we have found. We will try to apply thsese
//
// Login Registration		Login with Email	Registration	Verification
//
//
// <td>{{ $loop->index + 1 }}</td>
// <td>{{ $purchase->purchase_no }}</td>
// <td>{{ $purchase->product->name }}</td>
// <td>{{ $purchase->unit->name }}</td>
// <td>{{ $purchase->date }}</td>

// <ul class="p-0">
//   <li>
//     <div class="row comments mb-2" >
//       @foreach($reciever_messages as $reciever_message)
//       <div class="col-md-2 col-sm-2 col-3 text-center user-img">
//           <!-- <img id="profile-photo" src="url('public/upload/user_images/' . $reciever_message->user->image)" class="rounded-circle" /> -->
//           <img id="profile-photo" class="rounded-circle profile-user-img img-fluid img-circle"
//                src="{{ (!empty($reciever_message->user->image)) ? url('public/upload/user_images/' . $reciever_message->user->image) : url('public/upload/' . 'No_image.png')}}"
//                alt="User profile picture">
//       </div>
//       <div class="col-md-9 col-sm-9 col-9 comment rounded mb-2" style="{{ (Auth::user()->id == $reciever_message->user_id) ? 'background:#138496' : '' }}">
//         <h4 class="m-0"><a href="#">{{ $reciever_message->user->name }}</a></h4>
//           <time class="text-white ml-3">{{ date('M Y H:m',strtotime($reciever_message->created_at)) }}</time>
//           <like></like>
//           <p class="mb-0 text-white">{{ $reciever_message->text }}</p>
//       </div>
//       @endforeach
//       @foreach($my_messages as $my_message)
//       <div class="col-md-9 col-sm-9 col-9 comment rounded mb-2" style="{{ (Auth::user()->id == $my_message->user_id) ? 'background:#138496' : '' }}">
//         <h4 class="m-0"><a href="#">{{ $my_message->user->name }}</a></h4>
//           <time class="text-white ml-3">{{ date('M Y H:m',strtotime($my_message->created_at)) }}</time>
//           <like></like>
//           <p class="mb-0 text-white">{{ $my_message->text }}</p>
//       </div>
//       <div class="col-md-2 col-sm-2 col-3 text-center user-img">
//           <!-- <img id="profile-photo" src="url('public/upload/user_images/' . $my_message->user->image)" class="rounded-circle" /> -->
//           <img id="profile-photo" class="rounded-circle profile-user-img img-fluid img-circle"
//                src="{{ (!empty($my_message->user->image)) ? url('public/upload/user_images/' . $my_message->user->image) : url('public/upload/' . 'No_image.png')}}"
//                alt="User profile picture">
//       </div>
//       @endforeach
//     </div>
//   </li>
// </ul>
