@extends('layouts.master')

@section('title', 'Manage Departements')

@section('active', 'Departements')

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
            Manage Departements                   
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
				 Manage Departements 
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions">
                    @can('departements-create')
                        <a href="{{ route('master.departements.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            Create Departement
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
                    <th>Departement</th>
                    @canany(['departements-read', 'departements-delete'])
                        <th>Action</th>
                    @endcanany
				</tr>
			</thead>
            <tbody>
                @foreach ($departements as $no => $departement)
                    <tr>
                        <td class="text-right">{{ $no + 1 }}</td>
                        <td class="text-center">
                            <a href="{{ route('master.departements.show', $departement->id) }}">{{ ucwords($departement->name) }}</a>
                        </td>
                        @canany(['departements-read', 'departements-update', 'departements-delete'])
                            <td class="d-flex justify-content-center">
                                @can('departements-read')
                                    @component('components.base.btn-detail', [
                                        'route' => 'master.departements.show',
                                        'params' => $departement->id,
                                        'title' => 'Detail',
                                        'detail' => 'Detail'
                                    ]) @endcomponent
                                @endcan
                                @can('departements-update')
                                    @component('components.base.btn-detail', [
                                        'route' => 'master.departements.edit',
                                        'params' => $departement->id,
                                        'title' => 'Edit',
                                        'detail' => 'Edit'
                                    ]) @endcomponent
                                @endcan
                                @can('departements-delete')
                                    @component('components.base.btn-delete', [
                                        'route' => 'master.departements.destroy',
                                        'params' => $departement->id,
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