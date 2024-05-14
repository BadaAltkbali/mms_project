<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\AdjectiveEmployee;
use App\Models\employeesOfficer;
use App\Models\UnitBranch;
use App\Models\Bank;
use App\Models\BankBranch;
use Illuminate\Support\Facades\DB;

class Filter extends Controller
{

    function __construct()
    {
        $this->middleware('permission:filter-all|filter-emp|filter-empOffice|filter-emp_Print|filter-empOffice_Print', ['only' => ['index']]);
    }

    public function index()
    {

        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        $UnitBranches = UnitBranch::pluck('unitBranch_Name', 'id');
        $Banks = Bank::pluck('BankName', 'id');
        $BanksBranchs = BankBranch::pluck('BranchName', 'id');

        if (request('search')) {

        $employees = DB::table('employees')
        
            ->join('adjective_employees', 'employees.adjective_id', '=', 'adjective_employees.id')
            // ->join('banks', 'employees.bankName_id', '=', 'banks.id')
            // ->join('bank_branches', 'employees.bankBranch_id', '=', 'bank_branches.id')
            ->join('unit_branches', 'employees.unitBranch_id', '=', 'unit_branches.id')
            ->Where('full_name', 'LIKE','%' . request('search') .'%')
            ->orWhere('financial_Figure', 'LIKE','%' . request('search') .'%')
            // ->orWhere('bank_accountNo', 'LIKE','%' . request('search') .'%')
            ->orWhere('national_no', 'LIKE','%' . request('search') .'%')
            // ->orWhere('familyHandbook_No', 'LIKE','%' . request('search') .'%')
            // ->orWhere('passport_or_card', 'LIKE','%' . request('search') .'%')
            // ->orWhere('passport', 'LIKE','%' . request('search') .'%')
            // ->orWhere('current_grade', 'LIKE','%' . request('search') .'%')
            // ->orWhere('current_grade_date', 'LIKE','%' . request('search') .'%')
            // ->orWhere('banks.BankName', 'LIKE','%' . request('search') .'%')
            ->orWhere('adjective_employees.AdjName', 'LIKE','%' . request('search') .'%')
            // ->orWhere('bank_branches.BranchName', 'LIKE','%' . request('search') .'%')
            ->orWhere('unit_branches.unitBranch_Name', 'LIKE','%' . request('search') .'%')
            ->get();

        }else {
            $employees = Employee::orderBy('id')->paginate(3000); 
        }

      
        return view('print.filter', compact('employees', 'Adjectives', 'UnitBranches', 'Banks' ,'BanksBranchs'))->with('i');
    }

    public function indexOffice()
    {

        $UnitsBranche = UnitBranch::pluck('unitBranch_Name', 'id');
        $Banks = Bank::pluck('BankName', 'id');
        $BanksBranchs = BankBranch::pluck('BranchName', 'id');

        
        if (request('search')) {

        $employees = DB::table('employees_officers')
        
            // ->join('banks', 'employees_officers.bankName_id', '=', 'banks.id')
            // ->join('bank_branches', 'employees_officers.bankBranch_id', '=', 'bank_branches.id')
            ->join('unit_branches', 'employees_officers.unitBranch_id', '=', 'unit_branches.id')

            ->Where('full_name', 'LIKE','%' . request('search') .'%')
            ->orWhere('military_number', 'LIKE','%' . request('search') .'%')
            // ->orWhere('bank_accountNo', 'LIKE','%' . request('search') .'%')
            ->orWhere('national_no', 'LIKE','%' . request('search') .'%')
            ->orWhere('Rank', 'LIKE','%' . request('search') .'%')

            // ->orWhere('familyHandbook_No', 'LIKE','%' . request('search') .'%')
            // ->orWhere('passport_or_card', 'LIKE','%' . request('search') .'%')
            // ->orWhere('passport', 'LIKE','%' . request('search') .'%')
            // ->orWhere('current_grade', 'LIKE','%' . request('search') .'%')
            // ->orWhere('current_grade_date', 'LIKE','%' . request('search') .'%')
            ->orWhere('unit_branches.unitBranch_Name', 'LIKE','%' . request('search') .'%')
            // ->orWhere('banks.BankName', 'LIKE','%' . request('search') .'%')
            // ->orWhere('bank_branches.BranchName', 'LIKE','%' . request('search') .'%')
            ->get();

        }else {
            $employees = employeesOfficer::orderBy('id')->paginate(3000); 
        }

        return view('print.filter_officeEmp', compact('employees', 'UnitsBranche',  'Banks' ,'BanksBranchs'))->with('i');

    }

    public function indexAllEmp()
    {

        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        $UnitBranches = UnitBranch::pluck('unitBranch_Name', 'id');
        $Banks = Bank::pluck('BankName', 'id');
        $BanksBranchs = BankBranch::pluck('BranchName', 'id');

        if (request('search')) {

        $employees = DB::table('employees')
        
            ->join('adjective_employees', 'employees.adjective_id', '=', 'adjective_employees.id')
            ->join('banks', 'employees.bankName_id', '=', 'banks.id')
            ->join('bank_branches', 'employees.bankBranch_id', '=', 'bank_branches.id')
            ->join('unit_branches', 'employees.unitBranch_id', '=', 'unit_branches.id')
            ->Where('full_name', 'LIKE','%' . request('search') .'%')
            ->orWhere('financial_Figure', 'LIKE','%' . request('search') .'%')
            ->orWhere('bank_accountNo', 'LIKE','%' . request('search') .'%')
            ->orWhere('national_no', 'LIKE','%' . request('search') .'%')
            ->orWhere('familyHandbook_No', 'LIKE','%' . request('search') .'%')
            ->orWhere('passport_or_card', 'LIKE','%' . request('search') .'%')
            ->orWhere('passport', 'LIKE','%' . request('search') .'%')
            ->orWhere('current_grade', 'LIKE','%' . request('search') .'%')
            ->orWhere('current_grade_date', 'LIKE','%' . request('search') .'%')
            ->orWhere('banks.BankName', 'LIKE','%' . request('search') .'%')
            ->orWhere('adjective_employees.AdjName', 'LIKE','%' . request('search') .'%')
            ->orWhere('bank_branches.BranchName', 'LIKE','%' . request('search') .'%')
            ->orWhere('unit_branches.unitBranch_Name', 'LIKE','%' . request('search') .'%')
            ->get();

        }else {
            $employees = Employee::orderBy('id')->paginate(3000); 
        }

      
        return view('print.filterAllEmp', compact('employees', 'Adjectives', 'UnitBranches', 'Banks' ,'BanksBranchs'))->with('i');
    }

    public function indexAllEmpOffice()
    {

        $UnitsBranche = UnitBranch::pluck('unitBranch_Name', 'id');
        $Banks = Bank::pluck('BankName', 'id');
        $BanksBranchs = BankBranch::pluck('BranchName', 'id');

        
        if (request('search')) {

        $employees = DB::table('employees_officers')
        
            ->join('banks', 'employees_officers.bankName_id', '=', 'banks.id')
            ->join('bank_branches', 'employees_officers.bankBranch_id', '=', 'bank_branches.id')
            ->join('unit_branches', 'employees_officers.unitBranch_id', '=', 'unit_branches.id')

            ->Where('full_name', 'LIKE','%' . request('search') .'%')
            ->orWhere('military_number', 'LIKE','%' . request('search') .'%')
            ->orWhere('bank_accountNo', 'LIKE','%' . request('search') .'%')
            ->orWhere('national_no', 'LIKE','%' . request('search') .'%')
            ->orWhere('Rank', 'LIKE','%' . request('search') .'%')

            ->orWhere('familyHandbook_No', 'LIKE','%' . request('search') .'%')
            ->orWhere('passport_or_card', 'LIKE','%' . request('search') .'%')
            ->orWhere('passport', 'LIKE','%' . request('search') .'%')
            ->orWhere('current_grade', 'LIKE','%' . request('search') .'%')
            ->orWhere('current_grade_date', 'LIKE','%' . request('search') .'%')
            ->orWhere('unit_branches.unitBranch_Name', 'LIKE','%' . request('search') .'%')
            ->orWhere('banks.BankName', 'LIKE','%' . request('search') .'%')
            ->orWhere('bank_branches.BranchName', 'LIKE','%' . request('search') .'%')
            ->get();

        }else {
            $employees = employeesOfficer::orderBy('id')->paginate(3000); 
        }
        
        return view('print.filter_officeAllEmp', compact('employees', 'UnitsBranche',  'Banks' ,'BanksBranchs'))->with('i');

    }
    
    public function getNational(Request $request)
    {
        if ($request->ajax()) {
            $nationals = Employee::select('national_no')
                ->groupBy('national_no')
                ->get();

            return response()->json($nationals);
        }
    }

    public function getNationalOffice(Request $request)
    {
        if ($request->ajax()) {
            $nationals = employeesOfficer::select('national_no')
                ->groupBy('national_no')
                ->get();

            return response()->json($nationals);
        }
    }

    public function getaccountNo(Request $request)
    {
        if ($request->ajax()) {

            $accountNo = Employee::select('bank_accountNo')
                ->groupBy('bank_accountNo')
                ->get();

            return response()->json($accountNo);
        }
    }

    public function records(Request $request)
    {
        if ($request->ajax()) {

            if (request('std') && request('res')) {
                $employees = Employee::where('national_no', '=', request('std'))->where('financial_Figure', '=', request('res'))
                    ->latest()
                    ->get();
            } else {
                $employees = Employee::when(request('std'), function ($query) {
                    $query->where('national_no', '=', request('std'));
                })
                    ->when(request('res'), function ($query) {
                        $query->where('financial_Figure', '=', request('res'));
                    })
                    ->latest()
                    ->get();
            }

            return response()->json([
                'employees' => $employees
            ]);
        } else {
            abort(403);
        }
    }

    public function recordsOffice(Request $request)
    {
        if ($request->ajax()) {

            if (request('std') && request('res')) {
                $employees = employeesOfficer::where('national_no', '=', request('std'))->where('military_number', '=', request('res'))
                    ->latest()
                    ->get();
            } else {
                $employees = employeesOfficer::when(request('std'), function ($query) {
                    $query->where('national_no', '=', request('std'));
                })
                    ->when(request('res'), function ($query) {
                        $query->where('military_number', '=', request('res'));
                    })
                    ->latest()
                    ->get();
            }

            return response()->json([
                'employees_officers' => $employees
            ]);
        } else {
            abort(403);
        }
    }

    public function getFleeing()
    {

        $fleeings = Employee::where('fleeing', 'LIKE', "%on%")->get();

        $fleeingsOfficer = employeesOfficer::where('fleeing', 'LIKE', "%on%")->get();
        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        return view('branchList.fleeing', compact('fleeings', 'Adjectives' ,'fleeingsOfficer'))->with('i');
    }

    public function getStopping()
    {
        $stoppings = Employee::where('stopping', 'LIKE', "%on%")->get();
        $stoppingsOfficer = employeesOfficer::where('stopping', 'LIKE', "%on%")->get();

        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        return view('branchList.stopping', compact('stoppings', 'Adjectives' , 'stoppingsOfficer'))->with('i');
    }

    public function getRetired()
    {
        $retireds = Employee::where('retired', 'LIKE', "%on%")->get();
        $retiredsOfficer = employeesOfficer::where('retired', 'LIKE', "%on%")->get();

        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        return view('branchList.retired', compact('retireds', 'Adjectives' , 'retiredsOfficer'))->with('i');
    }

    public function getMandate()
    {
        $mandates = Employee::where('mandate', 'LIKE', "%on%")->get();
        $mandatesOfficer = employeesOfficer::where('mandate', 'LIKE', "%on%")->get();

        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        return view('branchList.mandate', compact('mandates', 'Adjectives' , 'mandatesOfficer'))->with('i');
    }

    public function getDoomed()
    {
        $doomeds = Employee::where('doomed', 'LIKE', "%on%")->get();
        $doomedsOfficer = employeesOfficer::where('doomed', 'LIKE', "%on%")->get();

        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        return view('branchList.doomed', compact('doomeds', 'Adjectives' , 'doomedsOfficer'))->with('i');
    }
























    // public function index()
    // {
    //     $names = Employee::select('full_name')
    //         ->groupBy('full_name')
    //         ->get();

    //     $nationals = Employee::select('national_no')
    //         ->groupBy('national_no')
    //         ->get();

    //     $financs = Employee::select('financial_Figure')
    //         ->groupBy('financial_Figure')
    //         ->get();



    //     return view('print.filter', compact('names', 'nationals', 'financs'));
    // }

    // public function getNational(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $nationals = Employee::select('national_no')
    //             ->groupBy('national_no')
    //             ->get();

    //         return response()->json($nationals);
    //     }
    // }

    // public function getfinanc(Request $request)
    // {
    //     if ($request->ajax()) {

    //         $financ = Employee::select('financial_figure')
    //             ->groupBy('financial_figure')
    //             ->get();

    //         return response()->json($financ);
    //     }
    // }

    // public function records(Request $request)
    // {
    //     if ($request->ajax()) {

    //         if (request('std') && request('res')) {
    //             $students = Employee::where('national_no', '=', request('std'))->where('financial_Figure', '=', request('res'))
    //                 ->latest()
    //                 ->get();
    //         } else {
    //             $students = Employee::when(request('std'), function ($query) {
    //                 $query->where('national_no', '=', request('std'));
    //             })
    //                 ->when(request('res'), function ($query) {
    //                     $query->where('financial_Figure', '=', request('res'));
    //                 })
    //                 ->latest()
    //                 ->get();
    //         }

    //         return response()->json([
    //             'students' => $students
    //         ]);
    //     } else {
    //         abort(403);
    //     }
    //     // if ($request->ajax()) {

    //     //     $employees = Employee::all();
    //     //     return response()->json([
    //     //         'employees' => $employees
    //     //     ]);
    //     //     if (request('std') && request('res')) {
    //     //         $employee = Employee::where('national_no', '=', request('std'))->where('financial_Figure', '=', request('res'))
    //     //             ->latest()
    //     //             ->get();
    //     //     } else {
    //     //         $employee = Employee::when(request('std'), function ($query) {
    //     //             $query->where('national_no', '=', request('std'));
    //     //         })
    //     //             ->when(request('res'), function ($query) {
    //     //                 $query->where('financial_Figure', '=', request('res'));
    //     //             })
    //     //             ->latest()
    //     //             ->get();
    //     //     }

    //     //     return response()->json([
    //     //         'employee' => $employee
    //     //     ]);
    //     // } else {
    //     //     abort(403);
    //     // }
    // }


}