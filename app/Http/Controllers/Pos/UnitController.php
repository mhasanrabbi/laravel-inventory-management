<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::latest()->get();
        return view('unit.index', compact('units'));
    }

    public function create()
    {
        return view('unit.create');
    }

    public function store(Request $request)
    {
        // Supplier::create($request->all());

        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);

        return view('unit.edit', compact('unit'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        Unit::findOrFail($id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'unit Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }

    public function destroy($id)
    {
        Unit::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Unit Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('unit.all')->with($notification);
    }
}