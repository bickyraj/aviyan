<div class="quick-enquiry-card mb-4 bg-white p-2" id="quickEnquiry">
    <h2 class="bold text-primary">Quick Enquiry</h2>
    <div class="card-body">
        <form id="enquiry-form" action="{{ route('front.contact.store') }}" method="POST">
            @csrf
            <input type="hidden" id="redirect-url" name="redirect_url">
            <div class="form-group mb-2">
                <label class="fs-xs" for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="form-group mb-2">
                <label class="fs-xs" for="">E-mail</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group mb-2">
                <label class="fs-xs" for="">Country</label>
                @include('front.elements.country')
            </div>
            <div class="form-group mb-2">
                <label class="fs-xs" for="">Phone Number</label>
                <input type="tel" name="phone" class="form-control" placeholder="Phone No.">
            </div>
            <div class="form-group mb-2">
                <label class="fs-xs" for="">Message</label>
                <textarea name="message" class="form-control" placeholder="Message" required></textarea>
            </div>
            <div class="form-group">
              {{-- @include('front.elements.recaptcha') --}}
              <div id="inquiry-g-recaptcha"
                    data-sitekey="{{ config('constants.google_recaptcha') }}"
                    data-callback="onSubmitEnquiry"
                    data-size="invisible">
              </div>
              <input type="hidden" id="enquiry-recaptcha" name="enquiry-recaptcha">
              <button type="submit" class="btn btn-sm btn-theme">Send</button>
            </div>
        </form>
    </div>
</div>
