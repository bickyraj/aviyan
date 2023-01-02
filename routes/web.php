<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Front\HomeController@index')->name('home');

Route::get('mycms', function() {
	if (auth()->check()) {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
	}
	return view('admin_login');
})->name('admin.login');

Route::get('login', function() {
    return redirect()->route('admin.login');
})->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['web', 'admin']], function ()
{
    Route::get('/', 'DashboardController@dashboard')->name('dashboard');
	Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

	Route::get('pages', 'PageController@index')->name('pages.index');
	Route::get('pages/edit/{id}', 'PageController@edit')->name('pages.edit');
	Route::post('pages/update', 'PageController@update')->name('pages.update');
	Route::get('pages/add', 'PageController@create')->name('pages.add');
	Route::get('pages/list', 'PageController@pageList');
	Route::post('pages', 'PageController@store')->name('pages.store');
	Route::delete('pages/delete/{id}', 'PageController@destroy')->name('pages.delete');

	Route::get('blogs', 'BlogController@index')->name('blogs.index');
	Route::get('blogs/edit/{id}', 'BlogController@edit')->name('blogs.edit');
	Route::post('blogs/update', 'BlogController@update')->name('blogs.update');
	Route::get('blogs/add', 'BlogController@create')->name('blogs.add');
	Route::get('blogs/list', 'BlogController@blogList');
	Route::post('blogs', 'BlogController@store')->name('blogs.store');
	Route::delete('blogs/delete/{id}', 'BlogController@destroy')->name('blogs.delete');

    // routes-news-events
    Route::get('news', 'NewsEventController@index')->name('news.index');
    Route::get('news/edit/{id}', 'NewsEventController@edit')->name('news.edit');
    Route::post('news/update', 'NewsEventController@update')->name('news.update');
    Route::get('news/add', 'NewsEventController@create')->name('news.add');
    Route::get('news/list', 'NewsEventController@newsList');
    Route::post('news', 'NewsEventController@store')->name('news.store');
    Route::delete('news/delete/{id}', 'NewsEventController@destroy')->name('news.delete');

	Route::get('faqs', 'FaqController@index')->name('faqs.index');
	Route::post('faqs/update-category/{id}', 'FaqController@updateCategory')->name('faqs.update-category');
	Route::get('faqs/edit/{id}', 'FaqController@edit')->name('faqs.edit');
	Route::post('faqs/update', 'FaqController@update')->name('faqs.update');
	Route::get('faqs/add', 'FaqController@create')->name('faqs.add');
	Route::get('faqs/list', 'FaqController@faqList');
	Route::post('faqs', 'FaqController@store')->name('faqs.store');
	Route::delete('faqs/delete/{id}', 'FaqController@destroy')->name('faqs.delete');

	Route::get('subscribers', 'EmailSubscriberController@index')->name('subscribers.index');
	Route::get('subscribers/export-to-excel', 'EmailSubscriberController@exportToExcel')->name('subscribers.export-excel');
	Route::get('subscribers/list', 'EmailSubscriberController@subscriberList');
	Route::delete('subscribers/delete/{id}', 'EmailSubscriberController@destroy')->name('subscribers.delete');

	Route::get('teams', 'TeamController@index')->name('teams.index');
	Route::get('teams/edit/{id}', 'TeamController@edit')->name('teams.edit');
	Route::post('teams/update', 'TeamController@update')->name('teams.update');
	Route::get('teams/add', 'TeamController@create')->name('teams.add');
	Route::get('teams/list', 'TeamController@teamList');
	Route::post('teams', 'TeamController@store')->name('teams.store');
	Route::delete('teams/delete/{id}', 'TeamController@destroy')->name('teams.delete');
	Route::get('team/members/{id}', 'TeamController@teamMembers')->name('teams.members');
    Route::get('team/members/{id}/list', 'TeamController@teamMemberList');

    Route::get('users', 'UserController@index')->name('users.index');
    Route::get('users/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('users/update', 'UserController@update')->name('users.update');
    Route::get('users/add', 'UserController@create')->name('users.add');
    Route::get('users/list', 'UserController@userList');
    Route::post('users', 'UserController@store')->name('users.store');
    Route::delete('users/delete/{id}', 'UserController@destroy')->name('users.delete');
    // Route::get('team/members/{id}', 'TeamController@teamMembers')->name('users.members');
    // Route::get('team/members/{id}/list', 'TeamController@teamMemberList');

    // route-team-members
    // Route::get('team/{id}/members', 'TeamMemberController@index')->name('team-members.index');
    Route::get('team/members/{id}/edit', 'TeamMemberController@edit')->name('team-members.edit');
    Route::post('team/members/{id}/update', 'TeamMemberController@update')->name('team-members.update');
    Route::get('team/{id}/members/add', 'TeamMemberController@create')->name('team-members.add');
    Route::post('team/{id}/members', 'TeamMemberController@store')->name('team-members.store');
    Route::delete('team/members/delete/{id}', 'TeamMemberController@destroy')->name('team-members.delete');

	// banner routes
	Route::get('banners', 'BannerController@index')->name('banners.index');
	Route::get('banners/edit/{id}', 'BannerController@edit')->name('banners.edit');
	Route::post('banners/update', 'BannerController@update')->name('banners.update');
	Route::get('banners/add', 'BannerController@create')->name('banners.add');
	Route::get('banners/list', 'BannerController@bannerList');
	Route::post('banners', 'BannerController@store')->name('banners.store');
	Route::delete('banners/delete/{id}', 'BannerController@destroy')->name('banners.delete');

    // routes-galleries
    Route::get('galleries', 'GalleryController@index')->name('galleries.index');
    Route::get('galleries/edit/{id}', 'GalleryController@edit')->name('galleries.edit');
    Route::post('galleries/update', 'GalleryController@update')->name('galleries.update');
    Route::get('galleries/add', 'GalleryController@create')->name('galleries.add');
    Route::get('galleries/list', 'GalleryController@galleryList');
    Route::post('galleries', 'GalleryController@store')->name('galleries.store');
    Route::delete('galleries/delete/{id}', 'GalleryController@destroy')->name('galleries.delete');

    // routes-videos
    Route::get('videos', 'VideoGalleryController@index')->name('videos.index');
    Route::get('videos/edit/{id}', 'VideoGalleryController@edit')->name('videos.edit');
    Route::post('videos/update', 'VideoGalleryController@update')->name('videos.update');
    Route::get('videos/add', 'VideoGalleryController@create')->name('videos.add');
    Route::get('videos/list', 'VideoGalleryController@galleryList');
    Route::post('videos', 'VideoGalleryController@store')->name('videos.store');
    Route::delete('videos/delete/{id}', 'VideoGalleryController@destroy')->name('videos.delete');

	// destination routes
	Route::get('destinations', 'DestinationController@index')->name('destinations.index');
	Route::get('destinations/edit/{id}', 'DestinationController@edit')->name('destinations.edit');
	Route::post('destinations/update', 'DestinationController@update')->name('destinations.update');
	Route::get('destinations/add', 'DestinationController@create')->name('destinations.add');
	Route::get('destinations/list', 'DestinationController@destinationList');
	Route::post('destinations', 'DestinationController@store')->name('destinations.store');
	Route::delete('destinations/delete/{id}', 'DestinationController@destroy')->name('destinations.delete');

	// activity routes
	Route::get('activities', 'ActivityController@index')->name('activities.index');
	Route::get('activities/edit/{id}', 'ActivityController@edit')->name('activities.edit');
	Route::post('activities/update', 'ActivityController@update')->name('activities.update');
	Route::get('activities/add', 'ActivityController@create')->name('activities.add');
	Route::get('activities/list', 'ActivityController@activityList');
	Route::post('activities', 'ActivityController@store')->name('activities.store');
	Route::delete('activities/delete/{id}', 'ActivityController@destroy')->name('activities.delete');

	// region routes
	Route::get('regions', 'RegionController@index')->name('regions.index');
	Route::get('regions/edit/{id}', 'RegionController@edit')->name('regions.edit');
	Route::post('regions/update', 'RegionController@update')->name('regions.update');
	Route::get('regions/add', 'RegionController@create')->name('regions.add');
	Route::get('regions/list', 'RegionController@regionList');
	Route::post('regions', 'RegionController@store')->name('regions.store');
	Route::delete('regions/delete/{id}', 'RegionController@destroy')->name('regions.delete');

	// trip-reviews routes
	Route::get('trip-reviews', 'TripReviewController@index')->name('trip-reviews.index');
	Route::get('trip-reviews/edit/{id}', 'TripReviewController@edit')->name('trip-reviews.edit');
	Route::post('trip-reviews/update', 'TripReviewController@update')->name('trip-reviews.update');
	Route::get('trip-reviews/add', 'TripReviewController@create')->name('trip-reviews.add');
	Route::get('trip-reviews/list', 'TripReviewController@reviewsList');
	Route::post('trip-reviews', 'TripReviewController@store')->name('trip-reviews.store');
	Route::delete('trip-reviews/delete/{id}', 'TripReviewController@destroy')->name('trip-reviews.delete');
	Route::get('trip-reviews/publish/{id}', 'TripReviewController@publish')->name('trip-reviews.pusblish');

	// trip-reviews routes
	Route::get('why-choose-us', 'WhyChooseController@index')->name('why-chooses.index');
	Route::get('why-choose-us/edit/{id}', 'WhyChooseController@edit')->name('why-chooses.edit');
	Route::post('why-choose-us/update', 'WhyChooseController@update')->name('why-chooses.update');
	Route::get('why-choose-us/add', 'WhyChooseController@create')->name('why-chooses.add');
	Route::get('why-chooses/list', 'WhyChooseController@whyChooseList');
	Route::post('why-choose-us', 'WhyChooseController@store')->name('why-chooses.store');
	Route::delete('why-choose-us/delete/{id}', 'WhyChooseController@destroy')->name('why-chooses.delete');
	Route::get('why-chooses/publish/{id}', 'WhyChooseController@publish')->name('why-chooses.pusblish');

	// trip-faq routes
	Route::get('trip-faqs', 'TripFaqController@index')->name('trip-faqs.index');
	Route::get('trip-faqs/trip-list', 'TripFaqController@tripList')->name('trip-faqs.trip-list');
	Route::get('trip-faqs/{tripId}/list', 'TripFaqController@faqs')->name('trip-faqs.faqs');
	Route::get('trip-faqs/add', 'TripFaqController@create')->name('trip-faqs.add');
	Route::get('trip-faqs/{tripId}', 'TripFaqController@faqList')->name('trip-faqs.list');
	Route::get('trip-faqs/edit/{id}', 'TripFaqController@edit')->name('trip-faqs.edit');
	Route::post('trip-faqs/update', 'TripFaqController@update')->name('trip-faqs.update');
	Route::get('trip-faqs/list', 'TripFaqController@faqsList');
	Route::post('trip-faqs', 'TripFaqController@store')->name('trip-faqs.store');
	Route::delete('trip-faqs/delete/{id}', 'TripFaqController@destroy')->name('trip-faqs.delete');
	Route::delete('trips/faqs/delete/{id}', 'TripFaqController@destroyAllTripFaqs')->name('trips.faqs.delete');
	Route::get('trip-faqs/publish/{id}', 'TripFaqController@publish')->name('trip-faqs.pusblish');

	// trip-reviews routes
	Route::get('trip-departures', 'TripDepartureController@index')->name('trip-departures.index');
	Route::get('trip-departures/edit/{id}', 'TripDepartureController@edit')->name('trip-departures.edit');
	Route::post('trip-departures/update', 'TripDepartureController@update')->name('trip-departures.update');
	Route::get('trip-departures/add', 'TripDepartureController@create')->name('trip-departures.add');
	Route::get('trip-departures/list', 'TripDepartureController@departureList');
	Route::post('trip-departures', 'TripDepartureController@store')->name('trip-departures.store');
	Route::delete('trip-departures/delete/{id}', 'TripDepartureController@destroy')->name('trip-departures.delete');

	// region routes
	Route::get('trips', 'TripController@index')->name('trips.index');
	Route::get('trips/edit/{id}', 'TripController@edit')->name('trips.edit');
	Route::post('trips/update', 'TripController@update')->name('trips.update');
	Route::post('trips/info/update', 'TripController@updateTripInfo')->name('trips.info.update');
	Route::post('trips/includes/update', 'TripController@updateTripIncludes')->name('trips.includes.update');
	Route::post('trips/meta/update', 'TripController@updateTripMeta')->name('trips.meta.update');
	Route::post('trips/itineraries/update', 'TripController@updateTripItineraries')->name('trips.itineraries.update');
	Route::post('trips/galleries/update', 'TripController@updateTripGallery')->name('trips.galleries.update');
	Route::post('trips/galleries', 'TripController@storeTripGallery')->name('trips.galleries.store');
	Route::get('trips/{trip_id}/galleries', 'TripController@getAllTripGallery')->name('trips.galleries.get-all-galleries');
	Route::delete('trip/gallery/delete/{id}', 'TripController@deleteTripImage')->name('trips.galleries.delete');
	Route::get('/trips/update-feature/{id}', 'TripController@updateFeaturedStatus');
	Route::get('/trips/update-block1/{id}', 'TripController@updateBlock1Status');
	Route::get('/trips/update-block2/{id}', 'TripController@updateBlock2Status');
	Route::get('/trips/update-block3/{id}', 'TripController@updateBlock3Status');

	Route::get('trips/add', 'TripController@create')->name('trips.add');
	Route::get('trips/list', 'TripController@tripList');
	Route::post('trips', 'TripController@store')->name('trips.store');
	Route::delete('trips/delete/{id}', 'TripController@destroy')->name('trips.delete');

	// menu routes
	Route::get('menus', 'MenuController@index')->name('menus.index');
	Route::get('menus/edit/{id}', 'MenuController@edit')->name('menus.edit');
	Route::post('menus/update', 'MenuController@update')->name('menus.update');
	Route::get('menus/add', 'MenuController@create')->name('menus.add');
	Route::get('menus/list', 'MenuController@menuList');
	Route::post('menus', 'MenuController@store')->name('menus.store');
	Route::delete('menus/delete/{id}', 'MenuController@destroy')->name('menus.delete');

	Route::get('general', 'SiteSettingController@general')->name('settings.general');
	Route::post('general/store', 'SiteSettingController@generalStore')->name('settings.general.store');
	Route::post('social-media/store', 'SiteSettingController@socialMediaStore')->name('settings.socialmedia.store');
	Route::post('home-page/store', 'SiteSettingController@homePageStore')->name('settings.home-page.store');
	Route::post('contact-us/store', 'SiteSettingController@contactUsStore')->name('settings.contact-us.store');
	Route::get('seo-manager', 'SiteSettingController@seoManager')->name('settings.seo-manager');
	Route::post('seo-manager', 'SiteSettingController@seoManagerStore')->name('settings.seo-manager.store');

	// documents routes
	Route::get('legal-documents', 'DocumentController@index')->name('documents.index');
	Route::get('documents/list', 'DocumentController@documentList');
	Route::post('documents', 'DocumentController@store')->name('documents.store');
	Route::delete('documents/delete/{id}', 'DocumentController@destroy')->name('documents.delete');

	// faq category routes
	Route::get('faq-categories', 'FaqCategoryController@index')->name('faq-categories.index');
	Route::get('faq-categories/list', 'FaqCategoryController@categoryList');
	Route::post('faq-categories', 'FaqCategoryController@store')->name('faq-categories.store');
	Route::delete('faq-categories/delete/{id}', 'FaqCategoryController@destroy')->name('faq-categories.delete');

	Route::get('/admin-setting', 'UserController@setting')->name('user-setting');
	Route::post('/admin-setting', 'UserController@updateSetting')->name('user-setting.update');
});

Route::group(
    ['prefix' => 'user', 'namespace' => 'User', 'middleware' => ['web', 'user']],
    function () {
        Route::get('/dashboard', 'DashboardController@dashboard')->name('user.dashboard');
    }
);

// front routes
Route::get('/system-clear-cache', function() {
    // Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('migrate');
    // Artisan::call('db:seed');
    // Artisan::call('storage:link');
    return "Cache is cleared";
});

Route::post('/subscribe', 'Front\EmailSubscriberController@store')->name('front.email-subscribers.store');
Route::get('/blogs', 'Front\BlogController@index')->name('front.blogs.index');
Route::get('/news', 'Front\NewsEventController@index')->name('front.news.index');
Route::get('/gallery', 'Front\TripController@allTripGallery')->name('front.trips.all-gallery');
Route::get('/video-gallery', 'Front\HomeController@videoGallery')->name('front.videos');
Route::get('/gallery/{slug}', 'Front\TripController@gallery')->name('front.trips.galleries');
Route::get('/legal-documents', 'Front\DocumentController@index')->name('front.documents.index');
Route::get('/faqs', 'Front\HomeController@faqs')->name('front.faqs.index');
Route::get('/contact-us', 'Front\HomeController@contact')->name('front.contact.index');
Route::post('/contact', 'Front\HomeController@contactStore')->name('front.contact.store');
Route::get('/reviews', 'Front\HomeController@reviews')->name('front.reviews.index');
Route::post('/reviews', 'Front\TripReviewController@store')->name('front.reviews.store');

// Route::get('/why-choose-us', 'Front\WhyChooseController@index')->name('front.why-chooses.index');
// Route::get('/why-choose-us/{id}', 'Front\WhyChooseController@show')->name('front.why-chooses.show');

Route::get('/print/{slug}', 'Front\TripController@print')->name('front.trips.print');
Route::get('/trips/filter/{region?}/{destination_id?}/{activity_id?}/{srotBy?}', 'Front\TripController@filter')->name('front.trips.filter');
Route::get('/search', 'Front\TripController@search')->name('front.trips.search');
Route::post('/search-ajax', 'Front\TripController@searchAjax')->name('front.trips.search-ajax');
Route::get('/trips', 'Front\TripController@list')->name('front.trips.listing');
Route::get('/trips/{slug}', 'Front\TripController@show')->name('front.trips.show');
Route::get('/trips/{slug}/departure-booking/{id}', 'Front\TripController@departureBooking')->name('front.trips.departure-booking');
Route::get('/trips/{slug}/booking', 'Front\TripController@booking')->name('front.trips.booking');
Route::get('/trips/{slug}/customize', 'Front\TripController@customize')->name('front.trips.customize');
Route::post('/trips/departure-booking', 'Front\TripController@departureBookingStore')->name('front.trips.departure-booking.store');
Route::post('/trips/booking', 'Front\TripController@bookingStore')->name('front.trips.booking.store');
Route::post('/trips/customize', 'Front\TripController@customizeStore')->name('front.trips.customize.store');
Route::get('/destinations/{slug}', 'Front\DestinationController@show')->name('front.destinations.show');
Route::get('/activities/{slug}', 'Front\ActivityController@show')->name('front.activities.show');
Route::get('/regions/{slug}', 'Front\RegionController@show')->name('front.regions.show');
Route::get('/blogs/{slug}', 'Front\BlogController@show')->name('front.blogs.show');
Route::get('/news/{slug}', 'Front\NewsEventController@show')->name('front.news.show');
Route::get('/teams', 'Front\TeamController@index')->name('front.teams.index');
Route::get('/teams/{slug}', 'Front\TeamController@show')->name('front.teams.show');
Route::get('{slug}', 'Front\PageController@show')->name('front.pages.show');

// review routes
Route::get('/reviews/create', 'Front\TripReviewController@create')->name('front.reviews.create');

