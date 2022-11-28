<?php

use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Role\Permision;
use App\Http\Livewire\Admin\Role\RoleManagement;
use App\Http\Livewire\Admin\System\SystemSettings;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Expenses\ExpensesCategory;
use App\Http\Livewire\Expenses\ExpensesList;
use App\Http\Livewire\Inventory\InventoryCategory;
use App\Http\Livewire\Inventory\InventoryDetails;
use App\Http\Livewire\Inventory\InventoryProduct;
use App\Http\Livewire\Payroll\PayrollEmployee;
use App\Http\Livewire\Payroll\PayrollPayment;
use App\Http\Livewire\Payroll\PayrollDetails;
use App\Http\Livewire\People\CustomerList;
use App\Http\Livewire\People\SupplierList;
use App\Http\Livewire\Production\ProductionDetails;
use App\Http\Livewire\Production\ProductionMaterial;
use App\Http\Livewire\Report\ProfitLoss;
use App\Http\Livewire\Report\PurchaseReport;
use App\Http\Livewire\Report\SalaryReport;
use App\Http\Livewire\Report\SalesReport;
use App\Http\Livewire\Sales\SalesList;
use App\Http\Livewire\Sales\SalesPos;
use App\Http\Livewire\Sales\CustomerSale;
use App\Http\Livewire\Sales\SaleDetails;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['auth']], function () {
    //Inventory
    Route::get('inventory/category', InventoryCategory::class)->middleware(['role:Admin|Accountant|Manager|Sales Man'])->name('inventory.category');
    Route::get('inventory/products', InventoryProduct::class)->middleware(['role:Admin|Accountant|Manager|Sales Man'])->name('inventory.product');
    Route::get('inventory/details/{product_id?}', InventoryDetails::class)->middleware(['role:Admin|Accountant|Manager|Sales Man'])->name('inventory.details');
    //Expenses
    Route::get('expenses/category', ExpensesCategory::class)->middleware(['role:Admin|Accountant|Manager'])->name('expenses.category');
//    Route::get('expenses/list', ExpensesList::class)->name('expenses');
    Route::get('expenses/details/{category_id?}', ExpensesList::class)->middleware(['role:Admin|Accountant|Manager'])->name('expenses.details');
    //Peoples
    Route::get('people/customer', CustomerList::class)->middleware(['role:Admin|Accountant|Manager|Sales Man'])->name('customer');
    Route::get('people/supplier', SupplierList::class)->middleware(['role:Admin|Accountant|Manager'])->name('supplier');
    //Sales
    Route::get('order', SalesList::class)->middleware(['role:Admin|Accountant|Manager|Sales Man'])->name('sales.list');
    Route::get('pos', SalesPos::class)->middleware(['role:Admin|Accountant|Manager|Sales Man'])->name('sales.pos');
    Route::get('sales/customer/{customer_id}', CustomerSale::class)->middleware(['role:Admin|Accountant|Manager|Sales Man'])->name('sales.customer');
    Route::get('sales/details/{sale_id}', SaleDetails::class)->middleware(['role:Admin|Accountant|Manager|Sales Man'])->name('sales.details');
    //Payroll
    Route::get('payroll/employee', PayrollEmployee::class)->middleware(['role:Admin|Accountant|Manager'])->name('payroll.employee');
    Route::get('payroll/payment', PayrollPayment::class)->middleware(['role:Admin|Accountant|Manager'])->name('payroll.payment');
    Route::get('payroll/details/{emp_id?}', PayrollDetails::class)->middleware(['role:Admin|Accountant|Manager'])->name('payroll.details');
    Route::get('roles/1vs7du/{role_id?}', Permision::class)->middleware(['role:Admin|Accountant|Manager'])->name('roles.1vs7du');
    //Production
    Route::get('production/details/{material_id?}', ProductionDetails::class)->middleware(['role:Admin|Accountant|Manager'])->name('production.details');
    Route::get('production/materials', ProductionMaterial::class)->middleware(['role:Admin|Accountant|Manager'])->name('production.materials');
    //Report
    Route::get('report/profitloss', ProfitLoss::class)->middleware(['role:Admin|Accountant|Manager'])->name('report.profitloss');
    Route::get('report/sales', SalesReport::class)->middleware(['role:Admin|Accountant|Manager'])->name('report.sales');
    Route::get('report/purchase', PurchaseReport::class)->middleware(['role:Admin|Accountant|Manager'])->name('report.purchase');
    Route::get('report/salary', SalaryReport::class)->middleware(['role:Admin|Accountant|Manager'])->name('report.salary');
    //Admin
    Route::get('dashboard', Dashboard::class)->middleware('can:view_dashboard')->name('admin.dashboard');
    Route::get('admin/users', ListUsers::class)->middleware('can:create_user')->name('admin.users');
    Route::get('admin/roles', RoleManagement::class)->middleware('can:view_user')->name('admin.roles');
    Route::get('admin/system', SystemSettings::class)->middleware('can:view_user')->name('admin.system');
});
