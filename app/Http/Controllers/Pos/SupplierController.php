<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::latest()->get();
        return view('supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('supplier.create');
    }

    public function store(Request $request)
    {
        // Supplier::create($request->all());

        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Supplier Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }

    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('supplier.edit', compact('supplier'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        Supplier::findOrFail($id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }

    public function destroy($id)
    {
        Supplier::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('supplier.all')->with($notification);
    }
}