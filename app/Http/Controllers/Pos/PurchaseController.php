<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;

class PurchaseController extends Controller
{
    public function index()
    {
        $data = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('purchase.index', compact('data'));
    }

    public function create()
    {
        $supplier = Supplier::all();
        $unit = Unit::all();
        $category = Category::all();
        return view('purchase.create', compact('supplier', 'unit', 'category'));
    }
}