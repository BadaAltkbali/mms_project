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
        $mandates = Employee::where('mandate', 'LIKE', "%on%")->get()->count();
        $doomeds = Employee::where('doomed', 'LIKE', "%on%")->get()->count();

        $retiredsOfficer = employeesOfficer::where('retired', 'LIKE', "%on%")->get()->count();
        $stoppingsOfficer = employeesOfficer::where('stopping', 'LIKE', "%on%")->get()->count();
        $fleeingsOfficer = employeesOfficer::where('fleeing', 'LIKE', "%on%")->get()->count();
        $mandatesOfficer = employeesOfficer::where('mandate', 'LIKE', "%on%")->get()->count();
        $doomedsOfficer = employeesOfficer::where('doomed', 'LIKE', "%on%")->get()->count();

        $NonCommissOfficers = employeesOfficer::where('Rank', 'like', 'رئيس عرفه وحدة')
        ->orWhere('Rank', 'like', 'رئيس عرفه سريه')
        ->orWhere('Rank', 'like', 'عريف')
        ->orWhere('Rank', 'like', 'نائب عريف')
        ->orWhere('Rank', 'like', 'جندي أول')
        ->orWhere('Rank', 'like', 'جندي')->get()->count();


        $allEmployees =  $employees + $employeesOfficer;

        return view('index', compact('users', 'employees', 'employeesOfficer', 'NonCommissOfficers', 'unitBranch', 'retireds', 'stoppings', 'fleeings','mandates', 'doomeds',
        'retiredsOfficer', 'stoppingsOfficer', 'fleeingsOfficer' , 'mandatesOfficer', 'doomedsOfficer' ,'allEmployees' , 'Banks' , 'unitsBranch' , 'BanksBranchs'));
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