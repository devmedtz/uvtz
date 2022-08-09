<?php

use App\Http\Livewire\Admin\Dashboard;
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
    Route::get('inventory/category', InventoryCategory::class)->name('inventory.category');
    Route::get('inventory/products', InventoryProduct::class)->name('inventory.product');
    Route::get('inventory/details/{product_id?}', InventoryDetails::class)->name('inventory.details');
    //Expenses
    Route::get('expenses/category', ExpensesCategory::class)->name('expenses.category');
//    Route::get('expenses/list', ExpensesList::class)->name('expenses');
    Route::get('expenses/details/{category_id?}', ExpensesList::class)->name('expenses.details');
    //Peoples
    Route::get('people/customer', CustomerList::class)->name('customer');
    Route::get('people/supplier', SupplierList::class)->name('supplier');
    //Sales
    Route::get('sales/list', SalesList::class)->name('sales.list');
    Route::get('sales/pos', SalesPos::class)->name('sales.pos');
    //Payroll
    Route::get('payroll/employee', PayrollEmployee::class)->name('payroll.employee');
    Route::get('payroll/payment', PayrollPayment::class)->name('payroll.payment');
    Route::get('payroll/details/{emp_id?}', PayrollDetails::class)->name('payroll.details');
    //Production
    Route::get('production/details/{material_id?}', ProductionDetails::class)->name('production.details');
    Route::get('production/materials', ProductionMaterial::class)->name('production.materials');
    //Report
    Route::get('report/profitloss', ProfitLoss::class)->name('report.profitloss');
    Route::get('report/sales', SalesReport::class)->name('report.sales');
    Route::get('report/purchase', PurchaseReport::class)->name('report.purchase');
    Route::get('report/salary', SalaryReport::class)->name('report.salary');
    //Admin
    Route::get('dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('admin/users', ListUsers::class)->name('admin.users');
    Route::get('admin/roles', RoleManagement::class)->name('admin.roles');
    Route::get('admin/system', SystemSettings::class)->name('admin.system');
});
