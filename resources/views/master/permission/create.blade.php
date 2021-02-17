@extends('layouts.master')

@section('title', 'Permissions')

@section('active', 'Permissions')

@push('css')
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/style.bundle.css?v=7.0.8" rel="stylesheet" type="text/css" />
@endpush

@push('js')

@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Permissions               
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Create Permissions    
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
                Create Permissions  
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions"></div>    
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('master.permissions.store') }}" class="form form-label-right">
        {{ csrf_field() }}
        <div class="col col-md-12 pt-3">
            <div class="form-group row">
                <div class="col-lg-12 pt-4">
                    <label>Menu</label>
                    <input type="text" class="form-control" name="menu" placeholder="Menu">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped- table-bordered table-checkable">
                    <thead>
                        <tr class="text-center">
                            <th class="font-weight-bold">browser</th>
                            <th class="font-weight-bold">Create</th>
                            <th class="font-weight-bold">Read</th>
                            <th class="font-weight-bold">Update</th>
                            <th class="font-weight-bold">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" width="10%">
                                <div class=" text-center">
                                    <span class="kt-switch">
                                        <label>
                                        <input type="checkbox" name="permission_id[]" value="display" checked='' disabled>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td class="text-center" width="10%">
                                <div class=" text-center">
                                    <span class="kt-switch">
                                        <label>
                                            <input type="checkbox" name="permission_id[]" value="create" checked='' disabled>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td class="text-center" width="10%">
                                <div class=" text-center">
                                    <span class="kt-switch">
                                        <label>
                                            <input type="checkbox" name="permission_id[]" value="read" checked='' disabled>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td class="text-center" width="10%">
                                <div class=" text-center">
                                    <span class="kt-switch">
                                        <label>
                                            <input type="checkbox" name="permission_id[]" value="update" checked='' disabled>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                            <td class="text-center" width="10%">
                                <div class=" text-center">
                                    <span class="kt-switch">
                                        <label>
                                            <input type="checkbox" name="permission_id[]" value="delete" checked='' disabled>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @component('components.base.btn-save', [
                'close' => 'Cancel', 'save' => 'Save'
            ]) @endcomponent
        </div>
    </form>
@endsection