<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Employee;
use App\Models\employeesOfficer;
use App\Models\UnitBranch;
use App\Models\User;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index()
    {

        $users = User::count();
        $employees = Employee::count();
        $employeesOfficer = employeesOfficer::count();
        $unitBranch = UnitBranch::count();

        $unitsBranch = UnitBranch::count();
        $Banks = Bank::count();

        $retireds = Employee::where('retired', 'LIKE', "%on%")->get()->count();
        $stoppings = Employee::where('stopping', 'LIKE', "%on%")->get()->count();
        $fleeings = Employee::where('fleeing', 'LIKE', "%on%")->get()->count();

        $allEmployees =  $employees + $employeesOfficer;

        return view('index', compact('users', 'employees', 'employeesOfficer', 'unitBranch', 'retireds', 'stoppings', 'fleeings', 'allEmployees' , 'Banks' , 'unitsBranch'));
    }
    public function save()
    {
        return view('layout.save');
    }

    public function fleeing()
    {
        return view('branchList.fleeing');
    }
}
