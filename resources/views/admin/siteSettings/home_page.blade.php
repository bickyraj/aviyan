<form class="kt-form" method="POST" action="{{ route('admin.settings.home-page.store') }}" id="setting-home-form" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{-- {{ dd(Setting::get('homePage')) }} --}}
  <h5>Home Page</h5>
  <hr>
  <div class="form-group row">
    <label class="col-lg-2 col-form-label">Title </label>
    <div class="col-lg-7">
      <input type="text" id="input-trip-name" class="form-control form-control-sm" name="welcome[title]" value="{{ Setting::get('homePage')['welcome']['title']??'' }}">
      {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
    </div>
  </div>
  {{-- <div class="form-group row">
    <label class="col-lg-2 col-form-label">Sub Title </label>
    <div class="col-lg-7">
      <input type="text" id="input-trip-name" class="form-control form-control-sm" name="welcome[sub_title]" value="{{ Setting::get('homePage')['welcome']['sub_title']??'' }}">
      <span class="form-text text-muted">Please enter your full name</span>
    </div>
  </div> --}}
  <div class="form-group row">
    <label class="col-lg-2 col-form-label">Content</label>
    <div class="col-lg-7">
      <input type="hidden" name="welcome[content]">
      <div id="summernote-home-content" class="summernote"><?= Setting::get('homePage')['welcome']['content']??'' ?></div>
    </div>
  </div>
  <hr>
  <!-- <h5>Reason</h5>
    <div class="form-group row">
    <label class="col-lg-2 col-form-label">Title </label>
    <div class="col-lg-7">
      <input type="text" id="input-trip-name" class="form-control form-control-sm" name="reason[title]" value="{{ Setting::get('homePage')['reason']['title']??'' }}">
      <span class="form-text text-muted">Please enter your full name</span>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-lg-2 col-form-label">Content</label>
    <div class="col-lg-7">
      <input type="hidden" name="reason[content]">
      <div id="summernote-reason-content" class="summernote"><?= Setting::get('homePage')['reason']['content']??'' ?></div>
    </div>
  </div>
  <hr> -->
  <div class="form-group row">
    {{-- <pre>{{ Setting::get('homePage') }}</pre> --}}
    <label class="col-lg-2 col-form-label">Chairman</label>
    <div class="col-lg-7">
      <div class="row">
        <div class="col-lg-7">
          <div class="mb-3">
              <img id="cropper-image" class="crop-img-div" src="{{ Setting::getHomePageImage(Setting::get('homePage')['chairman']['image']??null) }}">
          </div>
        </div>
      </div>
      <input type="hidden" id="cropped-data-input" name="cropped_data">
      <input type="file" name="file" id="cropper-upload">
      {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
    </div>
  </div>
  <div class="form-group row">
    <label class="col-lg-2 col-form-label">Chairman Name </label>
    <div class="col-lg-7">
      <input type="text" id="input-trip-name" class="form-control form-control-sm" name="chairman[name]" value="{{ Setting::get('homePage')['chairman']['name']??'' }}">
      {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
    </div>
  </div>
  <div class="form-group row">
    <label class="col-lg-2 col-form-label">Date</label>
    <div class="col-lg-7">
      <input type="text" id="input-trip-date" class="form-control form-control-sm" name="chairman[date]" value="{{ Setting::get('homePage')['chairman']['date']??'' }}">
      {{-- <span class="form-text text-muted">Please enter your full name</span> --}}
    </div>
  </div>
  <div class="form-group row">
    <label class="col-lg-2 col-form-label">Chairman Message</label>
    <div class="col-lg-7">
      <input type="hidden" name="chairman[message]">
      <div id="summernote-home-chairman-message" class="summernote"><?= Setting::get('homePage')['chairman']['message']??'' ?></div>
    </div>
  </div>
  <hr>
  <div class="kt-form__actions">
    <button type="submit" id="home-page-save-btn" class="btn btn-sm btn-primary">
          <i class="flaticon2-arrow-up"></i>
        Save</button>
    <a href="{{ route('admin.settings.general') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
