@extends('layouts.master')

@section('title', 'Manage User')

@section('active', 'Users')

@push('css')
    <link href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/datatables/datatables.bundle.css?v=7.1.7" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <script>
        $(document).ready(function() {
           $('#example').dataTable( {
                "paging": true,
                "pageLength": 10
            });
        });
    </script>
	<script src="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/plugins/custom/datatables/datatables.bundle.js?v=7.1.7" type="text/javascript"></script>
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="#" class="kt-subheader__breadcrumbs-link">
            Manage Users                   
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        index
    </span>
@endsection

@section('content')
    @if ($message = Session::get('error'))
      <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert"></button> 
        <strong>{{ $message }}</strong>
      </div>
    @endif
    
    <div class="content kt-portlet kt-portlet--mobile">
	<div class="kt-portlet__head kt-portlet__head--lg">
		<div class="kt-portlet__head-label">
			<span class="kt-portlet__head-icon">
				<i class="kt-font-brand flaticon2-line-chart"></i>
			</span>
			<h3 class="kt-portlet__head-title">
				 Manage Users 
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    {{-- @can('users-create') --}}
                        <a href="{{ route('master.users.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            Create User
                        </a>
                    {{-- @endcan --}}
				</div>	
			</div>
		</div>
	</div>

	<div class="table-responsive">
	<div class="kt-portlet__body">
		<table class="table table-striped- table-bordered table-hover table-checkable" id="example">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Ip Address</th>
                    <th>Last Activity</th>
                    {{-- @canany(['users-read', 'users-delete']) --}}
                        <th>Action</th>
                    {{-- @endcanany --}}
				</tr>
			</thead>
            <tbody>
                @foreach ($users as $no => $user)
                    <tr>
                        <td class="text-right">{{ $no + 1 }}</td>
                        <td class="text-center">{{ ucwords($user->name) }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">
                            @foreach ($user->roles as $role)
                                @if($role->level == 1 || $role->level == 2)
                                    @component('components.base.badge', [
                                        'class' => 'warning',
                                        'name' => ucwords($role->name)
                                    ]) @endcomponent
                                @elseif($role->level == 2)
                                    @component('components.base.badge', [
                                        'class' => 'brand',
                                        'name' => ucwords($role->name)
                                    ]) @endcomponent
                                @else
                                    @component('components.base.badge', [
                                        'class' => 'dark',
                                        'name' => ucwords($role->name)
                                    ]) @endcomponent
                                @endif
                            @endforeach
                        </td>
                        <td class="text-center">{{ get_session()->ip_address }}</td>
                        <td class="text-center">
                            {{ get_session()->last_activity ? carbon_parse(get_session()->last_activity, 'Y-m-d') : '' }}
                        </td>
                        @canany(['users-read', 'users-update', 'users-delete'])
                            <td class="d-flex justify-content-center">
                                @can('users-read')
                                    @component('components.base.btn-detail', [
                                        'route' => 'master.users.show',
                                        'params' => $user->id,
                                        'title' => 'Detail',
                                        'detail' => 'Detail'
                                    ]) @endcomponent
                                @endcan
                                @can('users-update')
                                    @component('components.base.btn-detail', [
                                        'route' => 'master.users.edit',
                                        'params' => $user->id,
                                        'title' => 'Edit',
                                        'detail' => 'Edit'
                                    ]) @endcomponent
                                @endcan
                                @can('users-delete')
                                    @component('components.base.btn-delete', [
                                        'route' => 'master.users.destroy',
                                        'params' => $user->id,
                                        'title' => 'Delete',
                                        'detail' => 'Delete'
                                    ]) @endcomponent
                                @endcan
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
		</table>
	</div>		
</div>
@endsection