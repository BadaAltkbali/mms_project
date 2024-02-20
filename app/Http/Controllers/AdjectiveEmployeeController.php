<?php

namespace App\Http\Controllers;

use App\Models\AdjectiveEmployee;
use Illuminate\Http\Request;

class AdjectiveEmployeeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:mainInfo-adjectives', ['only' => ['index','create', 'store', 'edit', 'update', 'destroy']]);
    }

    public function index()
    {
        $adjectives['adjectives'] = AdjectiveEmployee::orderBy('id')->paginate(20);
        return view('main_info.Adjectives.index', $adjectives);
    }


    public function create()
    {
        return view('main_info.Adjectives.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'AdjName' => 'required|unique:adjective_employees,AdjName',
        ]);

        $Adjs = new AdjectiveEmployee;
        $Adjs->AdjName = $request->AdjName;
        $Adjs->save();

        return redirect()->route('Adjective.index')->with('success', 'تم حفظ الصفه بنجاح');
    }


    public function show($Banks)
    {
        // return view('main_info.Banks.show',compact('Banks'));
    }


    public function edit(AdjectiveEmployee $Adjective)
    {
        return view('main_info.Adjectives.edit', compact('Adjective'));
    }


    public function update(Request $request, $id)
    {

        $request->validate(
            [
                'AdjName' => 'required|unique:adjective_employees,AdjName,' . $id . '',

            ],
            [
                'AdjName.required' => 'الرجاء ادخال الصفه',
                'AdjName.unique' => 'الصفه موجوده مسبقاً ',
            ]
        );

        $Adjectives = AdjectiveEmployee::find($id);
        $Adjectives->AdjName = $request->AdjName;
        $Adjectives->update();

        return redirect()->route('Adjective.index')->with('success', 'تم تعديل الصفه بنجاح');
    }


    public function destroy($id)
    {
        // $Banks = AdjectiveEmployee::findOrFail($id);
        // $Banks->delete();

        // return redirect()->route('Bank.index')->with('success','تم حذف المصرف بنجاح');
    }
}
