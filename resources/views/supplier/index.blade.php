@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-6">
                <div class="page-title-box d-sm-flex align-items-start justify-content-start">
                    <h4 class="mb-sm-0">Supplier</h4>
                </div>
            </div>
            <div class="col-6">
                <div class="page-title-box d-sm-flex align-items-end justify-content-end">

                    <a href="{{ route('supplier.create')}}" class="btn btn-dark btn-rounded waves-effect waves-light">
                        Add Supplier
                    </a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <h4 class="card-title">Supplier List</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach($suppliers as $key => $supplier)
                                <tr>
                                    <td> {{ $key+1}} </td>
                                    <td> {{ $supplier->name }} </td>
                                    <td> {{ $supplier->mobile_no }} </td>
                                    <td> {{ $supplier->email }} </td>
                                    <td> {{ $supplier->address }} </td>

                                    <td>
                                        <a href="{{ route('supplier.edit', $supplier->id)}}" class="btn btn-info sm"
                                            title="Edit Data"> <i class="fas fa-edit"></i> </a>

                                        <a href="{{ route('supplier.delete', $supplier->id)}}" class="btn btn-danger sm"
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
