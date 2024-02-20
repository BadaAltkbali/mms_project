<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankBranch;
use Illuminate\Http\Request;

class BanksController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:mainInfo-banks', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $Banks['Banks'] = Bank::orderBy('id')->paginate(20);
        $Branches['Branches'] = BankBranch::orderBy('id')->paginate(20);
        return view(
            'main_info.Banks.index',
            $Banks,
            $Branches
        );
    }


    public function create()
    {
        return view('main_info.Banks.create');
    }


    public function store(Request $request)
    {

        $request->validate(
            [
                'BankName' => 'required|unique:banks,BankName',
            ],
            [
                'BankName.required' => 'الرجاء ادخال اسم المصرف',
                'BankName.unique' => 'هذا المصرف موجود مسبقاً',

            ]
        );

        $Banks = new Bank;
        $Banks->BankName = $request->BankName;
        $Banks->save();

        return redirect()->route('Bank.index')->with('success', 'تم حفظ المصرف بنجاح');
    }


    public function show($Banks)
    {
        // return view('main_info.Banks.show',compact('Banks'));
    }


    public function edit(Bank $Bank)
    {
        return view('main_info.Banks.edit', compact('Bank'));
    }


    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'BankName' => 'required|unique:banks,BankName,' . $id . '',
            ],
            [
                'BankName.required' => 'الرجاء ادخال اسم المصرف',
                'BankName.unique' => 'هذا المصرف موجود مسبقاً',

            ]
        );

        $Banks = Bank::find($id);
        $Banks->BankName = $request->BankName;
        $Banks->update();

        return redirect()->route('Bank.index')->with('success', 'تم تعديل المصرف بنجاح');
    }


    public function destroy($id)
    {
        // $Banks = Bank::findOrFail($id);
        // $Banks->delete();

        // return redirect()->route('Bank.index')->with('success','تم حذف المصرف بنجاح');
    }
}
