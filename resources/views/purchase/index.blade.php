@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-6">
                <div class="page-title-box d-sm-flex align-items-start justify-content-start">
                    <h4 class="mb-sm-0">Purchase</h4>
                </div>
            </div>
            <div class="col-6">
                <div class="page-title-box d-sm-flex align-items-end justify-content-end">

                    <a href="{{ route('purchase.create')}}" class="btn btn-dark btn-rounded waves-effect waves-light">
                        Add Purchase
                    </a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Purchase List</h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Purhase No</th>
                                    <th>Date </th>
                                    <th>Supplier</th>
                                    <th>Category</th>
                                    <th>Qty</th>
                                    <th>Product Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $purchase)
                                <tr>
                                    <td> {{ $key+1}} </td>
                                    <td> {{ $purchase->purchase_no }} </td>
                                    <td> {{ $purchase->date }} </td>
                                    <td> {{ $purchase->supplier_id }} </td>
                                    <td> {{ $purchase->category_id }} </td>
                                    <td> {{ $purchase->buying_qty }} </td>
                                    <td> {{ $purchase->product_id }} </td>
                                    <td> <span class="btn btn-warning">Pending</span> </td>
                                    <td>
                                        <a href="{{ route('purchase.delete',$purchase->id) }}" class="btn btn-danger sm"
                                            title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>


@endsection
