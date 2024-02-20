<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\AdjectiveEmployee;
use App\Models\employeesOfficer;
use App\Models\UnitBranch;
use Illuminate\Support\Facades\DB;

class Filter extends Controller
{

    function __construct()
    {
        $this->middleware('permission:filter-all|filter-emp|filter-empOffice|filter-emp_Print|filter-empOffice_Print', ['only' => ['index']]);
    }

    public function index()
    {
        $national_no = Employee::select('national_no')
            ->groupBy('national_no')
            ->get();

        $financs = Employee::select('financial_Figure')
            ->groupBy('financial_Figure')
            ->get();

        $unitBranch = UnitBranch::pluck('unitBranch_Name', 'id');


        return view('print.filter', compact('national_no', 'financs', 'unitBranch'));
    }


    public function indexOffice()
    {
        $national_no = employeesOfficer::select('national_no')
            ->groupBy('national_no')
            ->get();

        $financs = employeesOfficer::select('military_number')
            ->groupBy('military_number')
            ->get();

        $unitBranch = UnitBranch::pluck('unitBranch_Name', 'id');


        return view('print.filter_officeEmp', compact('national_no', 'financs', 'unitBranch'));
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
        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        return view('branchList.fleeing', compact('fleeings', 'Adjectives'))->with('i');
    }

    public function getStopping()
    {
        $stoppings = Employee::where('stopping', 'LIKE', "%on%")->get();
        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        return view('branchList.stopping', compact('stoppings', 'Adjectives'))->with('i');
    }

    public function getRetired()
    {
        $retireds = Employee::where('retired', 'LIKE', "%on%")->get();
        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        return view('branchList.retired', compact('retireds', 'Adjectives'))->with('i');
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
