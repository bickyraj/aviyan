<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Setting;
use App\Services\Recaptcha\RecaptchaService;
use App\TripDeparture;
use App\VideoGallery;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
	public function index()
	{
		$data['banners'] = \App\Banner::all();
		$data['destinations'] = \App\Destination::orderBy('name')->select('id', 'name', 'slug', 'image_name')->get();
		$data['activities'] = \App\Activity::orderBy('name')->select('id', 'name', 'slug', 'image_name')->get();
		$data['block_1_trips'] = \App\Trip::where('block_1', 1)->latest()->get();
		$data['block_2_trips'] = \App\Trip::where('block_2', 1)->latest()->get();
		$data['block_3_trips'] = \App\Trip::where('block_3', 1)->latest()->get();
		$data['reviews'] = \App\TripReview::latest()->limit(4)->published()->get();
		$data['blogs'] = \App\Blog::orderBy('blog_date', 'desc')->limit(3)->get();
		$data['news'] = \App\NewsEvent::orderBy('event_date', 'desc')->limit(6)->get();
        $data['why_chooses'] = \App\WhyChoose::latest()->limit(6)->get();
		$data['galleries'] = \App\Gallery::orderBy('created_at', 'desc')->limit(9)->get();
		$data['videos'] = \App\VideoGallery::orderBy('created_at', 'desc')->limit(4)->get();
        $data['departures'] = TripDeparture::where('status', 1)->orderBy('from_date', 'asc')->get();

		return view('front.index', $data);
	}

	public function faqs()
	{
		$faq_categories = \App\FaqCategory::with('faqs')->get();
		// $faqs = \App\Faq::where('status', '=', 1)->get();
		return view('front.faqs.index', compact('faq_categories'));
	}

	public function reviews()
	{
		$trips = \App\Trip::orderBy('name', 'asc')->select('id', 'name')->get();
		$reviews = \App\TripReview::latest()->published()->paginate(5);
		return view('front.tripReviews.index', compact('trips', 'reviews'));
	}

	public function contact()
	{
		return view('front.contacts.index');
	}

	public function contactStore(Request $request)
	{
		$request->validate([
			'name' => 'required'
		]);
        $verifiedRecaptcha = RecaptchaService::verifyRecaptcha($request->get('g-recaptcha-response'));

        if (!$verifiedRecaptcha) {
            session()->flash('error_message', 'Google recaptcha error.');
            return redirect()->back();
        }

		try {
			$request->merge([
				'ip_address' => $request->ip()
			]);
			Mail::send('emails.contact', ['body' => $request], function ($message) use ($request) {
			    $message->to(Setting::get('email'));
			    $message->from($request->email);
			    $message->subject('Enquiry');
			});
			session()->flash('success_message', "Thank you for your enquiry. We'll contact you very soon.");
            $prev_route = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();

            if ($request->redirect_url) {
                return redirect()->to($request->redirect_url);
            }

		} catch (\Exception $e) {
			Log::info($e->getMessage());
			session()->flash('error_message', __('alerts.save_error'));
		}
        return redirect()->route('front.contact.index');
    }

    public function verifyRecaptcha($recaptcha)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        // $data = [
        //     'secret' => config('constants.recaptcha.secret'),
        //     'response' => $recaptcha
        // ];

        // $options = [
        //     'http' => [
        //         'header'  => "Content-type: application/x-www-form-urlencode\r\n",
        //         'method'  => 'POST',
        //         'content' => http_build_query($data)
        //     ]
        // ];

        // $context = stream_context_create($options);
        // $result = file_get_contents($url, false, $context);
        // $resultJson = json_decode($result);

        $recaptcha = file_get_contents($url . '?secret=' . config('constants.recaptcha.secret') . '&response=' . $recaptcha);
        $resultJson = json_decode($recaptcha);

        $valid = false;

        if ($resultJson->success) {
            if ($resultJson->score >= 0.5) {
                $valid = true;
            }
        }

        return $valid;
    }

    public function videoGallery()
    {
        $videos = VideoGallery::latest()->get();
        return view('front.videos.index', compact('videos'));
    }
}
