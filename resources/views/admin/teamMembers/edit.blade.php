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
                    <input type="hidden" name="id" value="{{ $team_member->id }}">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                          <span class="kt-portlet__head-icon">
                              <i class="kt-font-brand flaticon-edit-1"></i>
                          </span>
                            <h3 class="kt-portlet__head-title">
                                Edit Team Member
                            </h3>
                        </div>
                        <div class="kt-form__actions mt-3">
                            <a href="{{ route('admin.teams.members', $team_member->team->id) }}" class="btn btn-sm btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-sm btn-primary">
                              <i class="flaticon2-check-mark"></i>
                            Update
                          </button>
                        </div>
                    </div>
                    <!--begin::Form-->
                    {{ csrf_field() }}
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label for="">Team Image</label>
                            <div class="row">
                              <div class="col-lg-7">
                                <div class="mb-3">
                                  <img id="cropper-image" class="crop-img-div" src="{{ $team_member->image_url }}">
                                </div>
                                <input type="file" name="file" id="cropper-upload">
                              </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="{{ $team_member->name }}" name="name" class="form-control" aria-describedby="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label>Position</label>
                            <input type="text" value="{{ $team_member->position }}" name="position" class="form-control" aria-describedby="" placeholder="Position" required>
                        </div>
                        <div class="form-group">
                            <label>Phone 1</label>
                            <input type="text" value="{{ $team_member->phone1 }}" name="phone1" class="form-control" aria-describedby="" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label>Phone 2</label>
                            <input type="text" value="{{ $team_member->phone2 }}" name="phone2" class="form-control" aria-describedby="" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label>Phone 3</label>
                            <input type="text" value="{{ $team_member->phone3 }}" name="phone3" class="form-control" aria-describedby="" placeholder="Phone" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" value="{{ $team_member->email }}" name="email" class="form-control" aria-describedby="" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div id="summernote-description" class="summernote">
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-sm btn-primary">
                              <i class="flaticon2-check-mark"></i>
                            Update
                          </button>
                            {{-- <button type="submit" class="btn btn-success">Publish</button> --}}
                            {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                        </div>
                    </div>
                </form>
                <!--end::Form-->
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
{{-- <script src="./assets/js/demo1/pages/crud/forms/widgets/summernote.js" type="text/javascript"></script> --}}
<script src="./assets/vendors/cropperjs/dist/cropper.min.js"></script>
<script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function() {
    let remove_file_arr = [];
    let file_count = 0;
    let files_arr = [];

    let remove_picture_arr = [];
    let picture_count = 0;
    let pictures_arr = [];

    $("#add-files-btn").on('click', function (event) {
        event.preventDefault();
        $("#fileupload").click();
    });

    $("#add-pictures-btn").on('click', function (event) {
        event.preventDefault();
        $("#pictureupload").click();
    });

    $(document).on('click', '.remove-file', function (event) {
        let e = $(this);
        let li = e.closest('li');
        let key = li.data('key');
        remove_file_arr.push(key);
        li.remove();
    });

    $(document).on('click', '.remove-picture', function (event) {
        let e = $(this);
        let li = e.closest('li');
        let key = li.data('key');
        remove_picture_arr.push(key);
        li.remove();
    });

  function initSummerNote() {
    $('#summernote-description').summernote({
      height: 400
    });
    let code = `<?= $team_member->description; ?>`;
    $('#summernote-description').summernote("code", code);
  }
  $("#add-form-team").validate({
    submitHandler: function(form, event) {
      event.preventDefault();
      var btn = $(form).find('button[type=submit]').attr('disabled', true).html('Publishing...');
      handleTeamForm(form);
    }
  });
  var cropped = false;
  const image = document.getElementById('cropper-image');
  var cropper = "";

  function handleTeamForm(form) {
    var form = $(form);
    var formData = new FormData(form[0]);
    var description = form.find('#summernote-description').summernote('code');
    formData.append('description', description);
    if (cropper) {
      formData.append('cropped_data', JSON.stringify(cropper.getData()));
    }
    let url = "{{ route('admin.team-members.update', ':TEAM_MEMBER_ID') }}";
    url = url.replace(':TEAM_MEMBER_ID','{!! $team_member->id !!}');
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
                redirect_url = redirect_url.replace(':TEAM_ID','{!! $team_member->team_id !!}');
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
        ready: function (data) {
          var contData = cropper.getImageData(); //Get container data
          cropper.setCropBoxData({"left":0,"top":0,"width":contData.width,"height":contData.height});
        },
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

  initCropperjs();
  initSummerNote();
});

</script>
@endpush
