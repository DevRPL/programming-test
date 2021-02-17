@extends('layouts.master')

@section('title', 'Create Departements')

@section('active', 'Departements')

@push('css')

@endpush

@push('js')
    <script src="{{ asset('admin/default/crud/forms/widgets/assets/app/custom/general/crud/forms/widgets/bootstrap-datepicker.js') }}" type="text/javascript"></script>

    <script src="https://codeseven.github.io/toastr/glimpse.toastr.js" type="text/javascript"></script>

    <script>
        $("#m_select2_supplier").select2({
            placeholder: "Select supplier"
        });
    </script>


    <script type="text/javascript">

        function removeDuplicatedRow() {
            var def = {};
            $('.departement_id').each(function() {
                var val = $(this).val();
                if (def[val]) {
                    toastr.error('The product has been created, please add the qty', '');
                $(this).parent().parent().remove();
                } else {
                    def[val] = true;
                }
            });
        }

        $(function () {
            $('.add').click(function () {
                var no = $('.departement_id').html();
                var n = ($('.new tr').length - 0) + 1;
                var tr = '<tr><td class="no text-right">' + n + '</td>' + '<td><input type="text" class="form-control" name="division_code[]"></td>' +
                    '<td><input type="text" class="form-control" name="division_name[]"></td>' +
                    '<td class="text-center"><input type="button" class="col-5 btn btn-danger mr-2 delete" value="x"></td></tr>';
                $('.new').append(tr);
            });
            $('.new').delegate('.delete', 'click', function () {
                $(this).parent().parent().remove();
            });
        });
    </script>
    
@endpush

@section('breadcrumb')
    <span class="kt-subheader__breadcrumbs-separator"></span>
        <a href="" class="kt-subheader__breadcrumbs-link">
            Manage Departements                  
        </a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">
        Create Departements    
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
                Create Departements    
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions"></div>    
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('master.departements.store') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-12"> 
                <div class="kt-portlet__body">
                    <table class="table table-bordered">
                        <tr>
                            <td style="width: 30%">Departement Code</td>
                            <td>
                                <input class="form-control" name="code">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Departement Name</td>
                            <td>
                                <input class="form-control" name="name">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-striped- table-bordered table-hover table-checkable">
                            <thead>
                                <tr class="text-center">
                                    <th class="font-weight-bold">No</th>
                                    <th class="font-weight-bold">Code</th>
                                    <th class="font-weight-bold">Division</th>
                                    <th class="font-weight-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody class="new" id="only-number">
                                <tr>
                                    <td class="no text-right" width="5%">{{ $i = 0 + 1 }}</td>
                                    <td width="10%">
                                        <input type="text" class="form-control" name="division_code[]">
                                    </td>
                                    <td width="75%">
                                        <input type="text" class="form-control" name="division_name[]" value="{{ old('division_name') }}">
                                    </td>
                                    <td class="text-center" width="10%">
                                        <input type="button" class="col-5 btn btn-primary mr-2 add" value="+">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="btn-process">
                            <div class="col-4 d-flex">
                                <button class="col-5 btn btn-primary mr-2">Submit</button>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
