@extends('layouts.master')

@section('title', 'Users Detail')

@section('active', 'Users')

@push('css')
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/style.bundle.css?v=7.0.8" rel="stylesheet" type="text/css" />
@endpush

@push('js')

@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Users               
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Users Detail 
    </span>
@endsection

@section('content')
    <div class="content kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon2-line-chart"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Users Detail 
            </h3>
        </div>
        
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                    @can('roles-update')
                        @component('components.base.btn-detail', [
                            'route' => 'master.roles.show',
                            'params' => $user->roles[0]->id,
                            'title' => 'Roles Permissions',
                            'detail' => 'Roles Permissions'
                        ]) @endcomponent   
                    @endcan
                </div>    
            </div>
        </div>
    </div>
    
    <div class="col col-md-12 pt-3">
        <div class="form-group row">
            <div class="col-lg-12 pt-4">
                <label>Nama</label>
                <input class="form-control" placeholder="Nama" name="name" type="text" value="{{ $user->name }}" disabled>
            </div>
            <div class="col-lg-12 pt-4">
                <label>Email</label>
                <input class="form-control" placeholder="Email" name="name" type="text" value="{{ $user->email }}" disabled>
            </div>
            <div class="col-lg-12 pt-4">
                <label>Roles</label>
                <input class="form-control" placeholder="Roles" name="name" type="text" value="{{ $user->roles[0]->name ?? '' }}" disabled>
            </div>
            <div class="col-lg-12 pt-4">
                <label>Last Activity</label>
                <input class="form-control" placeholder="Last Activity" name="name" type="text" value=" {{ get_session()->last_activity ? carbon_parse(get_session()->last_activity, 'Y-m-d') : '' }}" disabled>
            </div>
        </div>
    </div>
@endsection