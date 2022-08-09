<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use App\Models\Salary;
use App\Models\Site;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {

        return view('livewire.admin.dashboard', [
        ]);
    }
}
