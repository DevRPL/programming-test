@extends('layouts.master')

@section('title', 'Manage Employees')

@section('active', 'Employees')

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
            Manage Employees                   
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
				 Manage Employees 
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('employees-create')
                        <a href="{{ route('master.employees.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            Create Employee
                        </a>
                    @endcan
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
                    <th>Nip</th>
                    <th>Name</th>
                    <th>Telp</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Division</th>
                    @canany(['employees-read', 'employees-delete'])
                        <th>Action</th>
                    @endcanany
				</tr>
			</thead>
            <tbody>
                @foreach ($employees as $no => $employee)
                    <tr>
                        <td class="text-right">{{ $no + 1 }}</td>
                        <td class="text-center">{{ $employee->nip }}</td>
                        <td class="text-center">{{ $employee->name }}</td>
                        <td class="text-center">{{ $employee->telp }}</td>
                        <td class="text-center">{{ $employee->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('master.departements.show', $employee->departement_id) }}">{{ $employee->departement->name ?? '' }}</a>
                        </td>
                        <td class="text-center">{{ $employee->division->name ?? '' }}</td>
                        @canany(['employees-read', 'employees-update', 'employees-delete'])
                            <td class="d-flex justify-content-center">
                                @can('employees-read')
                                    @component('components.base.btn-detail', [
                                        'route' => 'master.employees.show',
                                        'params' => $employee->id,
                                        'title' => 'Detail',
                                        'detail' => 'Detail'
                                    ]) @endcomponent
                                @endcan
                                @can('employees-update')
                                    @component('components.base.btn-detail', [
                                        'route' => 'master.employees.edit',
                                        'params' => $employee->id,
                                        'title' => 'Edit',
                                        'detail' => 'Edit'
                                    ]) @endcomponent
                                @endcan
                                @can('employees-delete')
                                    @component('components.base.btn-delete', [
                                        'route' => 'master.employees.destroy',
                                        'params' => $employee->id,
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