@extends('layouts.master')

@section('title', 'Employees')

@section('active', 'Employees')

@push('css')
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/style.bundle.css?v=7.0.8" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    

<script type="text/javascript">
    $(document).ready(function() {
        $('.departement').change(function(){
            var departement_id = $(this).val();
            $.ajax({
                type:"GET", 
                url:"{{ url('master/getDivision') }}/" + departement_id,
                success:function(response)
                {   
                    if(response)
                    {
                        $("#division").empty();
                        $("#division").append('<option value="">== Select Division ==</option>');
                        $.each(response,function(key,value){
                            $("#division").append('<option value="'+value.division_id+'">'+ value.division.name  +'</option>');
                        });
                    }
                },
                error: function () {
                    $("#division").empty();
                    $("#division").append('<option value="">== Select Division ==</option>');
                }
            }); 
        });
    });
</script>
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Employees               
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Create Employees    
    </span>
@endsection

@section('content')
    @component('components.base.request_validation') @endcomponent
    <div class="content kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Create Employees    
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions"></div>    
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('master.employees.store') }}" class="form form-label-right" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="col col-md-12">
                <div class="form-group row">
                    <div class="col-lg-12 pt-4">
                        <label>Nip</label>
                        <input type="text" class="form-control" name="nip" placeholder="Nip" value="{{ mt_rand(100000000,999999999) }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group row">
                    <div class="col-lg-12">
                    <label>Telp</label>
                    <input type="text" class="form-control" name="telp" placeholder="Telp" value="{{ old('telp') }}">
                </div>
            </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-12">Departement:</label>
                <div class="col-lg-12">
                <select class="departement form-control" name="departement_id">
                    <option value="">== Select Departement == </option>
                    @foreach($departements as $departement)
                        <option value="{{ $departement->id }}">{{ ucwords($departement->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12 pt-4">
                <label>Division</label>
                <select class="form-control" name="division_id" id="division">
                    <option value="">== Pilih Division ==</option>
                </select>
            </div>
            </div>
                <div class="btn-process">
                    @component('components.base.btn-save', [
                        'close' => 'Cancel', 'save' => 'Save'
                    ]) @endcomponent
                </div>
            </div>        
        </div>
    </form>
@endsection