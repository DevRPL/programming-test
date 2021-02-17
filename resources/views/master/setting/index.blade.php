@extends('layouts.master')

@section('title', 'Settings')

@section('active', 'Settings')

@push('css')
 
@endpush

@push('js')

@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="{{ route('master.settings.index') }}" class="kt-subheader__breadcrumbs-link">
         Manage Setting                  
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
       Manage Setting
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
				Manage Setting
			</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-wrapper">
				<div class="kt-portlet__head-actions"></div>	
			</div>
		</div>
	</div>

    <div class="row">
        <div class="col-lg-12">	
            <div class="kt-portlet__body">
                <form class="kt-form" method="POST" action="{{ route('master.settings.update', $setting->id ) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Name:</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" name="name" value="{{ $setting->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Address:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" name="address" id="address">{{ $setting->address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Email:</label>
                                        <div class="col-9">
                                            <input class="form-control" type="email" name="email" value="{{ $setting->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Phone:</label>
                                        <div class="col-9">
                                            <input class="form-control" type="text" name="phone" value="{{ $setting->phone }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Logo:</label>
                                        <div class="col-9">
                                            <input type="file" name="logo" class="form-control">
                                            <div style="margin: 20px"></div>
                                            <img src="{{ asset('storage/images/settings/'.$setting->logo) }}" width="200">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        {{ csrf_field() }}
                                        @component('components.base.btn-submit', ['title' => 'Save']) @endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>	
@endsection
