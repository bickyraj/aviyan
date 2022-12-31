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
                <form class="kt-form" id="add-form-team-member" enctype="multipart/form-data">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon-business"></i>
                        </span>
                            <h3 class="kt-portlet__head-title">
                                Add Team Member
                            </h3>
                        </div>
                        <div class="kt-form__actions mt-3">
                            <a href="{{ route('admin.teams.members', $team_id) }}" class="btn btn-sm btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="flaticon2-arrow-up"></i>
                                Publish</button>
                        </div>
                    </div>
                    <!--begin::Form-->
                    {{ csrf_field() }}
                    <div class="kt-portlet__body">
                        <input type="hidden" name="team_id" value="{{ $team_id }}">
                        <div class="form-group">
                            <label for="">Team Image</label>
                            <div class="row">
                            <div class="col-lg-7">
                                <div class="mb-3">
                                    <img id="cropper-image" class="crop-img-div" src="{{ asset('img/default.gif') }}">
                                </div>
                                <input type="file" name="file" id="cropper-upload">
                            </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" aria-describedby="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" name="position" class="form-control" aria-describedby="" placeholder="Position" required>
                        </div>
                        <div class="form-group">
                            <label>Phone 1</label>
                            <input type="text" name="phone1" class="form-control" aria-describedby="" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label>Phone 2</label>
                            <input type="text" name="phone2" class="form-control" aria-describedby="" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label>Phone 3</label>
                            <input type="text" name="phone3" class="form-control" aria-describedby="" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" aria-describedby="" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div id="summernote-description" class="summernote"></div>
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
<script src="{{ asset('assets/vendors/file-upload/js/jquery.fileupload.js') }}"></script>
<script src="./assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="./assets/js/demo1/pages/crud/forms/widgets/summernote.js" type="text/javascript"></script>
<script src="./assets/vendors/cropperjs/dist/cropper.min.js"></script>
<script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function() {
        let file_count = 0;
        let files_arr = [];

        let picture_count = 0;
        let pictures_arr = [];

        $("#add-files-btn").on('click', function (event) {
            event.preventDefault();
            $("#fileupload").click();
        });

		$("#add-form-team-member").validate({
			submitHandler: function(form, event) {
            event.preventDefault();
            var btn = $(form).find('button[type=submit]').attr('disabled', true).html('Publishing...');
            handleTeamMemberAddForm(form);
		  }
		});
		var cropped = false;
        const image = document.getElementById('cropper-image');
        var cropper = "";

    function handleTeamMemberAddForm(form) {
        var form = $(form);
        var formData = new FormData(form[0]);
        var description = form.find('#summernote-description').summernote('code');

        formData.append('description', description);

        if (cropper) {
            formData.append('cropped_data', JSON.stringify(cropper.getData()));
        }

        let url = "{{ route('admin.team-members.store', ':TEAM_ID') }}";
        url = url.replace(':TEAM_ID', '{!! $team_id !!}');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            async: false,
            success: function(res) {
                if (res.status === 1) {
                    let redirect_url = "{{ route('admin.teams.members', ':TEAM_ID') }}";
                    redirect_url = redirect_url.replace(':TEAM_ID', '{!! $team_id !!}');
                    location.href = redirect_url;
                }
            }
        });
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#cropper-image').attr('src', e.target.result);
          initCropperjs();
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#cropper-upload").change(function() {
      readURL(this);
    });

    function initCropperjs() {
    	if (cropped) {
    		cropper.destroy();
    		cropped = false;
    	}

	    cropper = new Cropper(image, {
	        aspectRatio: 1 / 1,
	        zoomable: false,
	        viewMode: 2,
	        crop(event) {
	            // console.log(event.detail.x);
	            // console.log(event.detail.y);
	            // console.log(event.detail.width);
	            // console.log(event.detail.height);
	            // console.log(event.detail.rotate);
	            // console.log(event.detail.scaleX);
	            // console.log(event.detail.scaleY);
	        },
	    });

	    cropped = true;
    }
});

</script>
@endpush
