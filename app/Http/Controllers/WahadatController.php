<?php

namespace App\Http\Controllers;

use App\Models\Wahadat;
use App\Models\UnitBranch;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class WahadatController extends Controller
{

    public function index()
    {
        $wahadat['wahadat'] = UnitBranch::orderBy('id')->paginate(20);

        return view('main_info.wahadat.index', $wahadat);
    }


    public function create()
    {
        return view('main_info.wahadat.create');
    }


    public function store(Request $request)
    {


        $request->validate(
            [
                'unitBranch_Name' => 'required|unique:unit_branches,unitBranch_Name',
            ],
            [
                'unitBranch_Name.required' => 'الرجاء ادخال اسم الوحدة الفرعيه',
                'unitBranch_Name.unique' => 'اسم الوحدة الفرعيه موجود مسبقاً ',

            ]
        );

        $wahadat = new UnitBranch;

        $wahadat->unitBranch_Name = $request->unitBranch_Name;



        $wahadat->save();


        return redirect()->route('wehda.index')->with('success', 'تم حفظ الوحدة بنجاح');
    }


    public function show($wahda)
    {
        return view('main_info.wahadat.show', compact('wahda'));
    }


    public function edit(UnitBranch $wehda)
    {
        return view('main_info.wahadat.edit', compact('wehda'));
    }


    public function update(Request $request, $id)
    {

        $request->validate(
            [   
                'unitBranch_Name' => 'required|unique:unit_branches,unitBranch_Name',
            ],
            [
                'unitBranch_Name.required' => 'الرجاء ادخال اسم الوحدة الفرعيه',
                'unitBranch_Name.unique' => 'اسم الوحدة الفرعيه موجود مسبقاً ',

            ]
        );

        $wahadat = UnitBranch::find($id);

        $wahadat->unitBranch_Name = $request->unitBranch_Name;


        $wahadat->update();

        return redirect()->route('wehda.index')->with('success', 'تم تعديل الوحدة بنجاح');
    }


    public function destroy($id)
    {
        $wehda = UnitBranch::findOrFail($id);
        $wehda->delete();

        return redirect()->route('wehda.index')->with('success', 'تم حذف الوحدة بنجاح');
    }
}
