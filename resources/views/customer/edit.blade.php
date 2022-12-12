@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit {{ $customer->name}}</h4><br/>

                        <form method="POST" action="{{ route('customer.update') }}" id="myForm">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" value="{{ $customer->id}}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">customer Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{ $customer->name }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">customer Mobile</label>
                                <div class="form-group col-sm-10">
                                    <input  value="{{ $customer->mobile_no }}" name="mobile_no" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">customer Email</label>
                                <div class="form-group col-sm-10">
                                    <input  value="{{ $customer->email }}" name="email" class="form-control" type="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">customer Address</label>
                                <div class="form-group col-sm-10">
                                    <input  value="{{ $customer->address }}" name="address" class="form-control" type="text">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Save">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                mobile_no: {
                    required : true,
                },
                email: {
                    required : true,
                },
                address: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter Name',
                },
                mobile_no: {
                    required : 'Please Enter Mobile Number',
                },
                email: {
                    required : 'Please Enter Email',
                },
                address: {
                    required : 'Please Enter Address',
                },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>


@endsection
