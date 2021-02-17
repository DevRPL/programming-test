@extends('layouts.master')

@section('title', 'Roles')

@section('active', 'Roles')

@push('css')
<link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
@endpush

@push('js')
   
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
            Roles                    
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Manage Roles
    </span>
@endsection

@section('content')
<div class="content kt-portlet--mobile">
    <div class="text-right">
        {{-- @can('roles-create') --}}
            <a href="{{ route('master.roles.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                Create Roles
            </a>
        {{-- @endcan --}}
    </div> 
    <div class="row mt-2">
        @foreach($roles as $role)
            <div class="col-md-4">
                <div class="card card-custom card-stretch gutter-b">
                    <div class="card-body d-flex align-items-center py-0 mt-8">
                        <div class="d-flex flex-column flex-grow-1 py-2 py-lg-5">
                        <a href="{{ route('master.roles.show', $role->id) }}" class="card-title font-weight-bolder text-dark-75 font-size-h5 mb-2 text-hover-primary">Level {{ $role->level }}</a>
                            <span class="font-weight-bold text-muted font-size-lg">{{ ucwords($role->name) }}</span>
                        </div>
                        <img src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/svg/avatars/004-boy-1.svg" alt="" class="align-self-end h-100px">
                    </div>
                </div>
            </div>
        @endforeach                         
	</div>
</div>
@endsection


