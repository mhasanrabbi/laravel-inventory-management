<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {

        $image = $request->file('customer_image');
        $name_gen = date('YmdHi') . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension(); // 343434.png
        Image::make($image)->resize(200, 200)->save('upload/customer/' . $name_gen);
        $save_url = 'upload/customer/' . $name_gen;

        Customer::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'customer_image' => $save_url,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }

    public function edit($id)
    {
        $Customer = customer::findOrFail($id);

        return view('customer.edit', compact('customer'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        Customer::findOrFail($id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Customer Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }

    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();


        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('customer.all')->with($notification);
    }
}