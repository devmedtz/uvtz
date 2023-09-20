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
    public $custLatMon;
    public $custThisMon;
    public $orderToday;
    public $orderYesterday;
    public $orderYesterday2;
    public $orderThisWeek;
    public $orderLastWeek;
    public $orderLastWeek2;
    public $orderThisMonth;
    public $orderLastMonth;
    public $orderLastMonth2;
    public $expensesToday;
    public $expensesThisWeek;
    public $expensesThisMonth;
    public $expensesThisMonth2;
    public $orderThisYear;
    public $canceledOrder;
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
        $this->custLatMon = Customer::whereBetween('created_at', [Carbon::now()->subMonth(1), Carbon::now()->endOfMonth()->subMonths(1)])->count();
        $this->custThisMon = Customer::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
    }
    public function getOrders(){
        $this->orderToday = Sales::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->sum('total_amount');
        $this->orderYesterday = Sales::whereBetween('created_at', [Carbon::now()->subDays(1), Carbon::now()->endOfDay()->subDays(1)])->sum('total_amount');
        $this->orderYesterday2 = Sales::whereBetween('created_at', [Carbon::now()->subDays(2), Carbon::now()->endOfDay()->subDays(2)])->sum('total_amount');
        $this->orderThisWeek = Sales::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total_amount');
        $this->orderLastWeek = Sales::whereBetween('created_at', [Carbon::now()->subWeeks(1), Carbon::now()->endOfWeek()->subWeeks(1)])->sum('total_amount');
        $this->orderLastWeek2 = Sales::whereBetween('created_at', [Carbon::now()->subWeeks(2), Carbon::now()->endOfWeek()->subWeeks(2)])->sum('total_amount');
        $this->orderThisMonth = Sales::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('total_amount');
        $this->orderLastMonth = Sales::whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()->endOfMonth()->subMonths(1)])->sum('total_amount');
        $this->orderLastMonth2 = Sales::whereBetween('created_at', [Carbon::now()->subMonths(2), Carbon::now()->endOfMonth()->subMonths(2)])->sum('total_amount');
        $this->orderThisYear = Sales::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('total_amount');
    }
    public function getExpenses(){
        $this->expensesToday = Expenses::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->sum('amount');
        $this->expensesThisWeek = Expenses::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
        $this->expensesThisMonth = Expenses::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount');
        $this->expensesThisMonth2 = Expenses::whereBetween('created_at', [Carbon::now()->subMonths(1), Carbon::now()->endOfMonth()])->sum('amount');
        $this->expensesThisYear = Expenses::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount');
    }
    public function getLatestOrder(){
        $this->latestOrders = Sales::latest()->take(10)->get();
        $this->canceledOrder = Sales::where('status',2)->latest()->take(10)->get();
    }

    public function getAvailableProducts(){
        $this->availableProducts = Product::all();
    }

    public function render()
    {
        // GRAPH DATA
        // $sales_graph_data = Sales::select(DB::raw("DATE_FORMAT(created_at, '%M') as month"),DB::raw('sum(total_amount) as sales'))
        //     ->groupBy('month')->orderBy('created_at')
        //     ->whereYear('created_at',Carbon::now()->startOfYear())
        //     ->get();

        $sales_graph_data = Sales::select(DB::raw("DATE_FORMAT('created_at', '%M') month"), DB::raw('sum(total_amount) as sales'))
            ->groupBy('created_at')->orderBy('created_at')
            ->whereYear('created_at',Carbon::now()->startOfYear())
            ->get();

        // dd($sales_graph_data);

        $g_data = "";
        $sales_data = [];
        $sales_label = [];
        foreach ($sales_graph_data as $val) {
            $g_data .= "['".$val->month."',".$val->sales."],";
            $sales_data[] = $val->sales;
            $sales_label[] = $val->month;
        }

        $exp_graph_data = Expenses::join('expenses_categories','expenses_categories.id','expenses.category_id')
            ->select(
                DB::raw('expenses_categories.category_name as cat_name'),
                DB::raw('sum(expenses.amount) as exp_amount')
            )
            ->groupBy('cat_name')
            ->whereYear('expenses.created_at',Carbon::now()->startOfYear())
            ->get();

        $exp_g_data = "";
        foreach ($exp_graph_data as $val) {
            $exp_g_data .= "['".$val->cat_name."',".$val->exp_amount."],";
        }

//        $expenses_data = Expenses::join('expenses_categories','expenses_categories.id','expenses.category_id')
//            ->select(
//                DB::raw('expenses_categories.category_name as cat_name'),
//                DB::raw("DATE_FORMAT(expenses.created_at, '%M') month"),
//                DB::raw('sum(expenses.amount) as exp_amount')
//            )
//            ->groupBy('month')->orderBy('month', 'DESC')
//            ->whereYear('expenses.created_at',Carbon::now()->startOfYear())
//            ->get();
//        $exp_data = [];
//        foreach ($expenses_data as $val) {
//            $exp_data[] = $val->exp_amount;
//        }

        return view('livewire.admin.dashboard', [
            'exp_g_data' => $exp_g_data,
        ]);
    }
}
