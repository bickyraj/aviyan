@extends('layouts.admin')
@push('styles')
<link href="./assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="./assets/vendors/cropperjs/dist/cropper.min.css" rel="stylesheet">
<style>
    #multiple-file {
        padding: 0px;

    }

    #multiple-file li {
        display: inline-flex;
        margin-top: 6px;
        background-color: #b5b5b5;
        padding-top: 9px;
        list-style-type: none;
        padding-bottom: 12px;
        margin-bottom: 3px;
        margin-right: 3px;
        color: white;
        padding-right: 12px;
        border-radius: 5px;
        padding-left: 12px;
        margin-right: 5px;
    }

    .remove-file {
        cursor: pointer;
        padding: 4px 0px 0px 10px;
    }

    #multiple-picture {
        padding: 0px;

    }

    #multiple-picture li {
        display: inline-flex;
        margin-top: 6px;
        background-color: #b5b5b5;
        padding-top: 9px;
        list-style-type: none;
        padding-bottom: 12px;
        margin-bottom: 3px;
        margin-right: 3px;
        color: white;
        padding-right: 12px;
        border-radius: 5px;
        padding-left: 12px;
        margin-right: 5px;
    }

    .remove-picture {
        cursor: pointer;
        padding: 4px 0px 0px 10px;
    }
</style>
@endpush
@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <form class="kt-form" id="add-form-team" enctype="multipart/form-data">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon-business"></i>
                        </span>
                            <h3 class="kt-portlet__head-title">
                                Add Team
                            </h3>
                        </div>
                        <div class="kt-form__actions mt-3">
                            <a href="{{ route('admin.teams.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="flaticon2-arrow-up"></i>
                                Publish</button>
                        </div>
                    </div>
                    <!--begin::Form-->
                    {{ csrf_field() }}
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" aria-describedby="" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="flaticon2-arrow-up"></i>
                                Publish</button>
                            {{-- <button type="submit" class="btn btn-success">Publish</button> --}}
                            {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                        </div>
                    </div>
                    <!--end::Form-->
                </form>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets/vendors/file-upload/js/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('assets/vendors/file-upload/js/jquery.iframe-transport.js') }}"></script>
<script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function() {
    $("#add-form-team").validate({
        submitHandler: function(form, event) {
        event.preventDefault();
        var btn = $(form).find('button[type=submit]').attr('disabled', true).html('Publishing...');
        handleTeamAddForm(form);
        }
    });
    function handleTeamAddForm(form) {
        var form = $(form);
        var formData = new FormData(form[0]);
        $.ajax({
            url: "{{ route('admin.teams.store') }}",
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            async: false,
            success: function(res) {
                if (res.status === 1) {
                    location.href = "{{ route('admin.teams.index') }}";
                }
            }
        });
    }
});
</script>
@endpush
