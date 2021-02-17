@extends('layouts.master')

@section('title', 'Roles')

@section('active', 'Roles')

@push('css')
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/style.bundle.css?v=7.0.8" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <script>
    $("#checkAll").change(function () {
        $('input:checkbox').prop('checked', $(this).prop("checked"));
    });
    </script>
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Roles               
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Edit Roles    
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
                Edit Roles  
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions"></div>    
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('master.roles.update', $role->id) }}" class="form form-label-right" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="col col-md-12 pt-3">
            <div class="form-group row">
                <div class="col-lg-12 pt-4">
                    <label>Roles Name</label>
                <input class="form-control" placeholder="Roles Name" name="name" type="text" value="{{ $role->name }}">
                </div>
                <div class="col-lg-12 pt-4">
                    <label>Level</label>
                    <input class="form-control" placeholder="Level" name="level" type="text" value="{{ $role->level }}" readonly>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped- table-bordered table-checkable">
                    <thead>
                        <tr class="text-center">
                            <th class="font-weight-bold"> <input type="checkbox" id="checkAll"></th>
                            <th class="font-weight-bold">Group</th>
                            <th class="font-weight-bold">browser</th>
                            <th class="font-weight-bold">Create</th>
                            <th class="font-weight-bold">Read</th>
                            <th class="font-weight-bold">Update</th>
                            <th class="font-weight-bold">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions->chunk(5) as $key => $chunks)
                        <tr>
                        <td class="text-center font-weight-bold" width="1%">{{ $key + 1 }}</td>
                        <td class="text-center font-weight-bold" width="10%">{{ $menus[$key]->menu->name ?? '' }}</td>
                            @foreach($chunks as $key => $permission)
                            <td class="text-center" width="10%">
                                <div class=" text-center">
                                    <span class="kt-switch">
                                        <label>
                                            <input type="checkbox" name="permission_id[]" value="{{ $permission->id }}"
                                            {{ (old('permission_id') != null && in_array($permission->id, old('permission_id'))) ||
                                            in_array($permission->id, $permission_ids) ? 'checked' : '' }}>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </td>
                    @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="btn-process">
            @component('components.base.btn-submit', ['title' => 'Edit']) @endcomponent
        </div>
    </div>
</form>
@endsection