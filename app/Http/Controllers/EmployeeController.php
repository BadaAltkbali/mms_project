<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Wahadat;
use App\Models\Emp_data;
use App\Models\Employee;
use App\Models\BankBranch;
use App\Models\UnitBranch;
use Illuminate\Http\Request;
use App\Models\bankBranch_id;
use App\Imports\EmployeeImport;
use App\Models\employeesOfficer;
use App\Models\AdjectiveEmployee;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Artisan;
use App\Exports\EmployeeExport;



class EmployeeController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:emp-all|emp-list|emp-create|emp-update|emp-delete|emp-show', ['only' => ['index', 'store']]);
        $this->middleware('permission:emp-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:emp-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:emp-delete', ['only' => ['destroy']]);
    }

    public function exportDataInExcel(Request $request)
    {
        if($request->type == 'xlsx'){

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }
        elseif($request->type == 'csv'){

            $fileExt = 'csv';
            $exportFormat = \Maatwebsite\Excel\Excel::CSV;
        }
        elseif($request->type == 'xls'){

            $fileExt = 'xls';
            $exportFormat = \Maatwebsite\Excel\Excel::XLS;
        }
        else{

            $fileExt = 'xlsx';
            $exportFormat = \Maatwebsite\Excel\Excel::XLSX;
        }


        $filename = "Emloyees-".date('d-m-Y').".".$fileExt;
        return Excel::download(new EmployeeExport, $filename, $exportFormat);
    }
    
    public function upload(Request $request)
    {
        $request->validate([
            'employees_data' => 'required|max:2048'
        ]);

        Excel::import(new EmployeeImport, $request->file('employees_data'));
        return back()->with('massage', 'User Imported Successfully');
    }

    public function PrintEmployees()
    {
        
        $employees = Employee::orderBy('financial_Figure')->paginate(3000);
       
        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        $UnitBranches = UnitBranch::pluck('unitBranch_Name', 'id');


        return view('employees.print', compact('employees', 'Adjectives' , 'UnitBranches'))->with('i');
    }
    
    public function index()
    {
        if (request('search')) {
            $employees = Employee::where('financial_Figure', 'like', '%' . request('search') . '%')
            ->orWhere('full_name', 'like', '%' . request('search') . '%')
            ->orWhere('bank_accountNo', 'like', '%' . request('search') . '%')
            ->orWhere('familyHandbook_No', 'like', '%' . request('search') . '%')
            ->orWhere('national_no', 'like', '%' . request('search') . '%')->get();
            // $employees::orderBy('id')->paginate(20);
        } else {
            $employees = Employee::orderBy('financial_Figure')->paginate(3000);
        }
        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        $UnitBranches = UnitBranch::pluck('unitBranch_Name', 'id');

        // return view('welcome')->with('users', ＄searchResult);

        return view('employees.index', compact('employees', 'Adjectives' , 'UnitBranches'))->with('i');
    }

    public function allEmployees()
    {
        // if (request('search')) {
        // $employees = Employee::where('full_name', 'national_no', 'like', '%' . request('search') . '%')->get();
        // $employees::orderBy('id')->paginate(20);
        // } else {
        // $employees = Employee::orderBy('id')->paginate(100);
        // }

        if (request('search')) {
            $employees = Employee::where('national_no', 'like', '%' . request('search') . '%')->get();

            $employeesOfficer = employeesOfficer::where('national_no', 'like', '%' . request('search') . '%')->get();
            // $employees::orderBy('id')->paginate(20);
        } else {
            $employees = Employee::orderBy('id')->paginate(3000);
            $employeesOfficer = employeesOfficer::orderBy('id')->paginate(3000);
        }
        // $employees = Employee::orderBy('id')->paginate(100);



        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');

        // $emp_data['emp_data'] = Emp_data::all();
        // $Adjectives_id = AdjectiveEmployee::pluck('id');
        // $Adjectives_name = AdjectiveEmployee::pluck('AdjName');
        // $adjective['adjective'] = AdjectiveEmployee::all();



        // ＄searchResult = Employee::where('name', 'like', '%' . request('search') . '%');




        // return view('welcome')->with('users', ＄searchResult);

        return view('employees.allEmployees', compact('employees', 'Adjectives', 'employeesOfficer'))->with('i');
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $products = DB::table('employees')->where('full_name', 'LIKE', '%' . $request->search . "%")->get();
            if ($products) {

                $output = "search is Succes         ";

                return Response($output);
            }
        }
    }

    public function create()
    {

        // Artisan::call('down');

        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        $Banks = Bank::pluck('BankName', 'id');
        $Branches = BankBranch::pluck('BranchName', 'id');
        $wahadat = UnitBranch::pluck('unitBranch_Name', 'id');

        return view('employees.create', compact('wahadat', 'Banks', 'Branches', 'Adjectives'));
    }

    public function store(Request $request)
    {

        #region Save Employee Data 

        $employees = new Employee;

        $employees->full_name = $request->full_name;
        $employees->national_no = $request->national_no;
        $employees->financial_Figure = $request->financial_Figure;
        $employees->birth_d = $request->birth_d;
        $employees->place_birth = $request->place_birth;
        $employees->place_residence = $request->place_residence;
        $employees->closest_point = $request->closest_point;
        $employees->nationality = $request->nationality;
        $employees->religion = $request->religion;
        $employees->blood_t = $request->blood_t;
        $employees->phone_n = $request->phone_n;
        $employees->marital_status = $request->marital_status;
        $employees->sons = $request->sons;
        $employees->daughter = $request->daughter;
        $employees->closest_relatives = $request->closest_relatives;
        $employees->closest_relatives_Phone = $request->closest_relatives_Phone;
        $employees->passport_or_card = $request->passport_or_card;
        $employees->passport = $request->passport;
        // $employees->passport_releaseDate = $request->passport_releaseDate;
        // $employees->passport_placeOfissue = $request->passport_placeOfissue;
        $employees->id_card = $request->id_card;
        $employees->id_card_releaseDate = $request->id_card_releaseDate;
        $employees->id_card_placeOfissue = $request->id_card_placeOfissue;
        $employees->familyHandbook_No = $request->familyHandbook_No;
        $employees->familyRegistration_No = $request->familyRegistration_No;
        $employees->familyPaper_No = $request->familyPaper_No;
        $employees->familyHandbook_No___releaseDate = $request->familyHandbook_No___releaseDate;
        $employees->familyHandbook_No___placeOfissue = $request->familyHandbook_No___placeOfissue;
        $employees->adjective_id = $request->adjective_id;
        // $employees->military_number = $request->military_number;
        // $employees->Rank = $request->Rank;
        $employees->bankName_id = $request->bankName_id;
        $employees->bankBranch_id = $request->bankBranch_id;
        $employees->bank_accountNo = $request->bank_accountNo;
        $employees->unitName = $request->unitName;
        $employees->unitBranch_id = $request->unitBranch_id;
        $employees->classificationEmpContract = $request->classificationEmpContract;
        $employees->hiringDate = $request->hiringDate;
        $employees->startJopDate = $request->startJopDate;
        $employees->appointment_decision = $request->appointment_decision;
        $employees->Contract_registrationNo = $request->Contract_registrationNo;
        $employees->lastPromotion = $request->lastPromotion;
        $employees->current_grade = $request->current_grade;
        $employees->current_grade_date = $request->current_grade_date;
        $employees->courses_obtained = $request->courses_obtained;
        $employees->diseases = $request->diseases;
        $employees->notes = $request->notes;
        $employees->vacations = $request->vacations;
        $employees->medical_comfort = $request->medical_comfort;
        $employees->altasweat = $request->altasweat;
        $employees->placement = $request->placement;
        $employees->graduationDate = $request->graduationDate;
        $employees->qualification = $request->qualification;
        $employees->specialization = $request->specialization;
        $employees->graduationPlace = $request->graduationPlace;
        $employees->workplace = $request->workplace;

        $employees->stopping = ($request->stopping) ? 'on' : 'off';
        $employees->fleeing = ($request->fleeing) ? 'on' : 'off';
        $employees->retired = ($request->retired) ? 'on' : 'off';
        $employees->mandate = ($request->mandate) ? 'on' : 'off';
        $employees->doomed = ($request->doomed) ? 'on' : 'off';

        #endregion

        if (($employees->national_no) == null && ($employees->bank_accountNo) == null && ($employees->current_grade_date) == null) {

            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name',
                    'financial_Figure' => 'required|unique:employees,financial_Figure',
                    // 'national_no' => 'unique:employees,national_no|max:12',
                    // 'bank_accountNo' => 'unique:employees'
                    // 'current_grade_date' => 'after:startJopDate|before:tomorrow'

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    // 'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    // 'national_no.max'=> 'الحد الأقصى للادخال 12 رقم'
                    // 'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                    // 'current_grade_date.after' => 'يجب ان يكون التاريخ بعد تاريخ مباشره العمل',
                    // 'current_grade_date.before' => 'يجب ان يكون التاريخ قبل تاريخ الغد',
                ]
            );

            $employees->save();


            return redirect()->route('employees.index')->with('success', 'تم حفظ الموظف بنجاح');
        }
        if (($employees->national_no) == null && ($employees->bank_accountNo) == null) {
            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name',
                    'financial_Figure' => 'required|unique:employees,financial_Figure',
                    // 'national_no' => 'unique:employees,national_no|max:12',
                    // 'bank_accountNo' => 'unique:employees'
                    'current_grade_date' => 'after:startJopDate|before:tomorrow'

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    // 'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    // 'national_no.max'=> 'الحد الأقصى للادخال 12 رقم'
                    // 'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                    'current_grade_date.after' => 'يجب ان يكون التاريخ بعد تاريخ المباشره ',
                    'current_grade_date.before' => 'يجب ان يكون التاريخ قبل تاريخ الغد',
                ]
            );

            $employees->save();


            return redirect()->route('employees.index')->with('success', 'تم حفظ الموظف بنجاح');
        }
        if (($employees->bank_accountNo) == null  && ($employees->current_grade_date) == null) {

            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name',
                    'financial_Figure' => 'required|unique:employees,financial_Figure',
                    'national_no' => 'unique:employees,national_no|max:12',
                    // 'bank_accountNo' => 'unique:employees'
                    // 'current_grade_date' => 'after:startJopDate|before:tomorrow'

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    'national_no.max' => 'الحد الأقصى للادخال 12 رقم',
                    // 'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                    // 'current_grade_date.after' => 'يجب ان يكون التاريخ بعد تاريخ مباشره العمل',
                    // 'current_grade_date.before' => 'يجب ان يكون التاريخ قبل تاريخ الغد',
                ]
            );

            $employees->save();


            return redirect()->route('employees.index')->with('success', 'تم حفظ الموظف بنجاح');
        }
        if (($employees->national_no) == null && ($employees->current_grade_date) == null) {

            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name',
                    'financial_Figure' => 'required|unique:employees,financial_Figure',
                    // 'national_no' => 'unique:employees,national_no|max:12',
                    'bank_accountNo' => 'unique:employees',
                    // 'current_grade_date' => 'after:startJopDate|before:tomorrow'

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    // 'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    // 'national_no.max' => 'الحد الأقصى للادخال 12 رقم',
                    'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                    // 'current_grade_date.after' => 'يجب ان يكون التاريخ بعد تاريخ مباشره العمل',
                    // 'current_grade_date.before' => 'يجب ان يكون التاريخ قبل تاريخ الغد',
                ]
            );

            $employees->save();


            return redirect()->route('employees.index')->with('success', 'تم حفظ الموظف بنجاح');
        }
        if (($employees->current_grade_date) == null) {

            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name',
                    'financial_Figure' => 'required|unique:employees,financial_Figure',
                    'national_no' => 'unique:employees,national_no|max:12',
                    'bank_accountNo' => 'unique:employees',
                    // 'current_grade_date' => 'after:startJopDate|before:tomorrow'

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    'national_no.max' => 'الحد الأقصى للادخال 12 رقم',
                    'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                    // 'current_grade_date.after' => 'يجب ان يكون التاريخ بعد تاريخ مباشره العمل',
                    // 'current_grade_date.before' => 'يجب ان يكون التاريخ قبل تاريخ الغد',
                ]
            );

            $employees->save();


            return redirect()->route('employees.index')->with('success', 'تم حفظ الموظف بنجاح');
        }
        if (($employees->national_no) == null) {

            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name',
                    'financial_Figure' => 'required|unique:employees,financial_Figure',
                    // 'national_no' => 'unique:employees,national_no|max:12',
                    'bank_accountNo' => 'unique:employees',
                    'current_grade_date' => 'after:startJopDate|before:tomorrow',

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    // 'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    // 'national_no.max'=> 'الحد الأقصى للادخال 12 رقم'
                    'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                    'current_grade_date.after' => 'يجب ان يكون التاريخ بعد تاريخ مباشره العمل',
                    'current_grade_date.before' => 'يجب ان يكون التاريخ قبل تاريخ الغد',
                ]
            );

            $employees->save();


            return redirect()->route('employees.index')->with('success', 'تم حفظ الموظف بنجاح');
        }
        if (($employees->bank_accountNo) == null) {

            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name',
                    'financial_Figure' => 'required|unique:employees,financial_Figure',
                    'national_no' => 'unique:employees,national_no|max:12',
                    // 'bank_accountNo' => 'unique:employees'
                    'current_grade_date' => 'after:startJopDate|before:tomorrow'

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    'national_no.max' => 'الحد الأقصى للادخال 12 رقم',
                    // 'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                    'current_grade_date.after' => 'يجب ان يكون التاريخ بعد تاريخ مباشره العمل',
                    'current_grade_date.before' => 'يجب ان يكون التاريخ قبل تاريخ الغد',
                ]
            );

            $employees->save();


            return redirect()->route('employees.index')->with('success', 'تم حفظ الموظف بنجاح');
        } else {
            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name',
                    'financial_Figure' => 'required|unique:employees,financial_Figure',
                    'national_no' => 'unique:employees,national_no|max:12',
                    'bank_accountNo' => 'unique:employees',
                    'current_grade_date' => 'after:startJopDate|before:tomorrow'

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                    'current_grade_date.after' => 'يجب ان يكون التاريخ بعد تاريخ المباشره ',
                    'current_grade_date.before' => 'يجب ان يكون التاريخ قبل تاريخ الغد',
                ]
            );




            $employees->save();


            return redirect()->route('employees.index')->with('success', 'تم حفظ الموظف بنجاح');
        }


        // if (($employees->stopping) == 'on') {
        //     $employees->save();
        // } else {
        //     $employees->stopping = 'off';
        //     $employees->save();
        // }
        $employees->save();
        return redirect()->route('employees.index')->with('success', 'تم حفظ الموظف بنجاح');
    }

    public function show(Employee $employee)
    {
        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        $Banks = Bank::pluck('BankName', 'id');
        $BankBranches = BankBranch::pluck('BranchName', 'id');
        $UnitBranches = UnitBranch::pluck('unitBranch_Name', 'id');

        $date = now()->format('Y-m-d');

        return view('employees.show', compact('employee', 'Adjectives', 'Banks', 'BankBranches', 'UnitBranches', 'date'));
    }

    public function edit(Employee $employee)
    {
        $Adjectives = AdjectiveEmployee::pluck('AdjName', 'id');
        $Banks = Bank::pluck('BankName', 'id');
        $Branches = BankBranch::pluck('BranchName', 'id');
        $wahadat = UnitBranch::pluck('unitBranch_Name', 'id');

        return view('employees.edit', compact('employee', 'Adjectives', 'Banks', 'Branches', 'wahadat'));
    }

    public function update(Request $request, $id)
    {

        $employees = Employee::find($id);

        #region Update Employee Data

        $employees->full_name = $request->full_name;
        $employees->national_no = $request->national_no;
        $employees->financial_Figure = $request->financial_Figure;
        $employees->birth_d = $request->birth_d;
        $employees->place_birth = $request->place_birth;
        $employees->place_residence = $request->place_residence;
        $employees->closest_point = $request->closest_point;
        $employees->nationality = $request->nationality;
        $employees->religion = $request->religion;
        $employees->blood_t = $request->blood_t;
        $employees->phone_n = $request->phone_n;
        $employees->marital_status = $request->marital_status;
        $employees->sons = $request->sons;
        $employees->daughter = $request->daughter;
        $employees->closest_relatives = $request->closest_relatives;
        $employees->closest_relatives_Phone = $request->closest_relatives_Phone;
        $employees->passport_or_card = $request->passport_or_card;
        $employees->passport = $request->passport;
        // $employees->passport_releaseDate = $request->passport_releaseDate;
        // $employees->passport_placeOfissue = $request->passport_placeOfissue;
        $employees->id_card = $request->id_card;
        $employees->id_card_releaseDate = $request->id_card_releaseDate;
        $employees->id_card_placeOfissue = $request->id_card_placeOfissue;
        $employees->familyHandbook_No = $request->familyHandbook_No;
        $employees->familyRegistration_No = $request->familyRegistration_No;
        $employees->familyPaper_No = $request->familyPaper_No;
        $employees->familyHandbook_No___releaseDate = $request->familyHandbook_No___releaseDate;
        $employees->familyHandbook_No___placeOfissue = $request->familyHandbook_No___placeOfissue;
        $employees->adjective_id = $request->adjective_id;
        // $employees->military_number = $request->military_number;
        // $employees->Rank = $request->Rank;
        $employees->bankName_id = $request->bankName_id;
        $employees->bankBranch_id = $request->bankBranch_id;
        $employees->bank_accountNo = $request->bank_accountNo;
        $employees->unitName = $request->unitName;
        $employees->unitBranch_id = $request->unitBranch_id;
        $employees->classificationEmpContract = $request->classificationEmpContract;
        $employees->hiringDate = $request->hiringDate;
        $employees->startJopDate = $request->startJopDate;
        $employees->appointment_decision = $request->appointment_decision;
        $employees->Contract_registrationNo = $request->Contract_registrationNo;
        $employees->lastPromotion = $request->lastPromotion;
        $employees->current_grade = $request->current_grade;
        $employees->current_grade_date = $request->current_grade_date;
        $employees->courses_obtained = $request->courses_obtained;
        $employees->diseases = $request->diseases;
        $employees->notes = $request->notes;
        $employees->vacations = $request->vacations;
        $employees->medical_comfort = $request->medical_comfort;
        $employees->altasweat = $request->altasweat;
        $employees->placement = $request->placement;
        $employees->graduationDate = $request->graduationDate;
        $employees->qualification = $request->qualification;
        $employees->specialization = $request->specialization;
        $employees->graduationPlace = $request->graduationPlace;
        $employees->workplace = $request->workplace;
        $employees->stopping = ($request->stopping) ? 'on' : 'off';
        $employees->fleeing = ($request->fleeing) ? 'on' : 'off';
        $employees->retired = ($request->retired) ? 'on' : 'off';
        $employees->mandate = ($request->mandate) ? 'on' : 'off';
        $employees->doomed = ($request->doomed) ? 'on' : 'off';

        #endregion 

        if (($employees->national_no) == null && ($employees->bank_accountNo) == null) {

            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name,' . $id . '',
                    'financial_Figure' => 'required|unique:employees,financial_Figure,' . $id . '',
                    // 'national_no' => 'unique:employees,national_no|max:12',
                    // 'bank_accountNo' => 'unique:employees'

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    // 'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    'national_no.max' => 'الحد الأقصى للادخال 12 رقم'
                    // 'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                ]
            );

            $employees->update();


            return redirect()->route('employees.index')->with('success', 'تم تعديل الموظف بنجاح');
        }
        if (($employees->bank_accountNo) == null) {

            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name,' . $id . '',
                    'financial_Figure' => 'required|unique:employees,financial_Figure,' . $id . '',
                    'national_no' => 'unique:employees,national_no,' . $id . '|max:12',
                    // 'bank_accountNo' => 'unique:employees'

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    'national_no.max' => 'الحد الأقصى للادخال 12 رقم'
                    // 'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                ]
            );

            $employees->update();


            return redirect()->route('employees.index')->with('success', 'تم تعديل الموظف بنجاح');
        }
        if (($employees->national_no) == null) {

            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name,' . $id . '',
                    'financial_Figure' => 'required|unique:employees,financial_Figure,' . $id . '',
                    // 'national_no' => 'unique:employees,national_no|max:12',
                    'bank_accountNo' => 'unique:employees,bank_accountNo,' . $id . ''

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    // 'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    'national_no.max' => 'الحد الأقصى للادخال 12 رقم',
                    'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                ]
            );

            $employees->update();


            return redirect()->route('employees.index')->with('success', 'تم تعديل الموظف بنجاح');
        } else {
            $request->validate(
                [
                    'full_name' => 'required|unique:employees,full_name,' . $id . '',
                    'financial_Figure' => 'required|unique:employees,financial_Figure,' . $id . '',
                    'national_no' => 'unique:employees,national_no,' . $id . '|max:12',
                    'bank_accountNo' => 'unique:employees,bank_accountNo,' . $id . ''

                ],
                [
                    'financial_Figure.required' => 'الرجاء ادخال الرقم المالي',
                    'financial_Figure.unique' => 'الرقم المالي موجود مسبقاً ',
                    'full_name.required' => 'الرجاء ادخال اسم الموظف ',
                    'full_name.unique' => 'اسم الموظف موجود مسبقا',
                    'national_no.unique' => 'الرقم الوطني الذي ادخلته موجود مسبقاً',
                    'national_no.max' => 'الحد الأقصى للادخال 12 رقم',
                    'bank_accountNo.unique' => 'رقم الحساب الذي ادخلته موجود مسبقاً',
                ]
            );

            $employees->update();


            return redirect()->route('employees.index')->with('success', 'تم تعديل الموظف بنجاح');
        }


        $employees->update();

        return redirect()->route('employees.index')->with('success', 'تم تعديل الموظف بنجاح');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();
        return back();
        // return redirect()->route('employees.index')->with('success', 'تم حذف الموظف بنجاح');
    }
}