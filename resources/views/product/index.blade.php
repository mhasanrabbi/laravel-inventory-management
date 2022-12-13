@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-6">
                <div class="page-title-box d-sm-flex align-items-start justify-content-start">
                    <h4 class="mb-sm-0">Products</h4>
                </div>
            </div>
            <div class="col-6">
                <div class="page-title-box d-sm-flex align-items-end justify-content-end">

                    <a href="{{ route('product.create')}}" class="btn btn-dark btn-rounded waves-effect waves-light">
                        Add Product
                    </a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <h4 class="card-title">Product List</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Supplier</th>
                                    <th>Unit</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                <tr>
                                    <td> {{ $key+1}} </td>
                                    <td> {{ $product->name }} </td>
                                    <td> {{ $product->supplier->name }} </td>
                                    <td> {{ $product->unit->name }} </td>
                                    <td> {{ $product->category->name }} </td>
                                    <td> {{ $product->quantity }} </td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id)}}" class="btn btn-info sm"
                                            title="Edit Data"> <i class="fas fa-edit"></i> </a>

                                        <a href="{{ route('product.delete', $product->id)}}" class="btn btn-danger sm"
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
