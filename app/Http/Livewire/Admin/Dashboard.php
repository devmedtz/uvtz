<?php

namespace App\Http\Livewire\Admin;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Expenses;
use App\Models\Product;
use App\Models\Salary;
use App\Models\Sales;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public $customerCount;
    public $orderToday;
    public $orderThisWeek;
    public $orderThisMonth;
    public $expensesToday;
    public $expensesThisWeek;
    public $expensesThisMonth;
    public $orderThisYear;
    public $expensesThisYear;
    public $latestOrders = [];
    public $availableProducts = [];

    public function mount(){
        $this->getOrders();
        $this->getExpenses();
        $this->getLatestOrder();
        $this->getCustomerCount();
        $this->getAvailableProducts();
    }

    public function getCustomerCount(){
        $this->customerCount = Customer::count();
    }
    public function getOrders(){
        $this->orderToday = Sales::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->sum('total_amount');
        $this->orderThisWeek = Sales::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total_amount');
        $this->orderThisMonth = Sales::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('total_amount');
        $this->orderThisYear = Sales::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('total_amount');
    }
    public function getExpenses(){
        $this->expensesToday = Expenses::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->sum('amount');
        $this->expensesThisWeek = Expenses::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
        $this->expensesThisMonth = Expenses::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount');
        $this->expensesThisYear = Expenses::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount');
    }
    public function getLatestOrder(){
        $this->latestOrders = Sales::latest()->take(10)->get();
    }

    public function getAvailableProducts(){
        $this->availableProducts = Product::all();
    }
    public function render()
    {

        return view('livewire.admin.dashboard', [
        ]);
    }
}
