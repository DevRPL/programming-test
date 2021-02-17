@extends('layouts.master')

@section('title', 'Menu')

@section('active', 'Menu')

@push('css')
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/style.bundle.css?v=7.0.8" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Menu               
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Create Menu    
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
                Create Menu    
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions"></div>    
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('master.menus.store') }}" class="form form-label-right" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col col-md-12 pt-3">
            <div class="form-group row">
                 <div class="col-lg-12 pt-4">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Menu" value="{{ old('name') }}">
                </div>
            </div>
            <div class="btn-process">
                @component('components.base.btn-save', [
                    'close' => 'Cancel', 'save' => 'Save'
                ]) @endcomponent
            </div>
        </div>
    </form>
@endsection