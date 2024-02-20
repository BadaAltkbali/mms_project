<?php

namespace App\Http\Controllers;

use App\Models\BankBranch;
use Illuminate\Http\Request;

class BanksBranchController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:mainInfo-banks', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }
    public function index()
    {
        //
    }


    public function create()
    {
        return view('main_info.Banks.createBranch');
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'BranchName' => 'required|unique:bank_branches,BranchName',
            ],
            [
                'BranchName.required' => 'الرجاء ادخال اسم فرع المصرف',
                'BranchName.unique' => 'اسم فرع المصرف موجود مسبقاً',

            ]
        );

        $Branches = new BankBranch;
        $Branches->BranchName = $request->BranchName;
        $Branches->save();

        return redirect()->route('Bank.index')->with('success', 'تم حفظ فرع المصرف بنجاح');
    }


    public function show($Branches)
    {
        // return view('main_info.wahadat.show',compact('Branches'));
    }


    public function edit(BankBranch $Branch)
    {
        return view('main_info.Banks.editBranch', compact('Branch'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'BranchName' => 'required',

        ]);

        $Branches = BankBranch::find($id);
        $Branches->BranchName = $request->BranchName;
        $Branches->update();

        return redirect()->route('Bank.index')->with('success', 'تم تعديل فرع المصرف بنجاح');
    }


    public function destroy($id)
    {
        // $Branches = BankBranch::findOrFail($id);
        // $Branches->delete();

        // return redirect()->route('Bank.index')->with('success','تم حذف فرع المصرف بنجاح');
    }
}
