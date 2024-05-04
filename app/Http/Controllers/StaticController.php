<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankBranch;
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
        $BanksBranchs = BankBranch::count();

        $retireds = Employee::where('retired', 'LIKE', "%on%")->get()->count();
        $stoppings = Employee::where('stopping', 'LIKE', "%on%")->get()->count();
        $fleeings = Employee::where('fleeing', 'LIKE', "%on%")->get()->count();

        $retiredsOfficer = employeesOfficer::where('retired', 'LIKE', "%on%")->get()->count();
        $stoppingsOfficer = employeesOfficer::where('stopping', 'LIKE', "%on%")->get()->count();
        $fleeingsOfficer = employeesOfficer::where('fleeing', 'LIKE', "%on%")->get()->count();

        $شمسشبOfficer = employeesOfficer::where('retired', 'LIKE', "%on%")->get()->count();


        $allEmployees =  $employees + $employeesOfficer;

        return view('index', compact('users', 'employees', 'employeesOfficer', 'unitBranch', 'retireds', 'stoppings', 'fleeings', 'retiredsOfficer', 'stoppingsOfficer', 'fleeingsOfficer' ,'allEmployees' , 'Banks' , 'unitsBranch' , 'BanksBranchs'));
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