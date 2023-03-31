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


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Route;


Auth::routes(['register' => false]);
Route::get('my-advert/', 'FrontendUserController@MyAdvert')->name("my-advert");
Route::post('/pay-now', 'PaypalPaymentController@index')->name("pay-now");
Route::get('/payment-execute', 'PaypalPaymentController@executePayment')->name("payment-execute");
Route::view('/advertising-policy', 'frontend.advertising-policy');
Route::get('/terms-and-conditions', 'FrontendController@TermConditionView')->name('terms.conditions');
Route::get('/Privacy-Policy', 'FrontendController@PrivacyPolicyView')->name('privacy.policy');
Route::view('/sitemap', 'frontend.sitemap');
//Route::view('/careers', 'frontend.careers');

Route::get('/career-view', 'FrontendController@CareersView')->name('career.view');
Route::get('get_tab/{tab}', 'FrontendController@get_tab')->name('get_tab');
Route::view('/auction-detail', 'frontend.car-selling-auction');
Route::get('/brand', 'FrontendController@Brand')->name('frontend-brand-list');
Route::get('Contact/list', 'CrownJobsController@ContactIndex')->name('contact-us-list');
Route::get('subscriber/list', 'CrownJobsController@index')->name('subscriber-list');
Route::view('/event-detail', 'frontend.event-detail');
Route::view('/mail-template', 'frontend.mail-template');
Route::get('/event-detail/{id}', 'EventsController@EventDetail')->name('event-detail');
Route::get('/new-password', 'AuthController@newPassword')->name('new-password');
Route::get('/newUsed/{con}', 'FrontendController@newUsed')->name('new-filters');
Route::get('/Car-brands/{brand}', 'FrontendController@BrandFilterIndex')->name('index-brand');
Route::get('/Featured-Car', 'FrontendController@FeaturedCar')->name('featured-car');
Route::post('change/password', 'UserController@changePassword')->name("change-password");
Route::post('chat/wanted', 'WantedController@wantedChat')->name("chat-wanted");
Route::post('create/misecellinous', 'FrontendUserController@miscellanousCreate')->name("create-misc");
Route::post('create/swap', 'FrontendUserController@swapCreate')->name("create-swap");
Route::post('star-rating/{id}/{c_id}', 'FrontendUserController@StarRating')->name("star-rating");
Route::post('follow/', 'FollowerController@create')->name("follow-create");
Route::post('create/contact_us', 'FollowerController@ContactUs')->name("create-contact");
Route::get('chat/view', 'WantedController@viewChat')->name("chat-view");
Route::get('/single_chat/{id}', 'WantedController@single_chat')->name("single_chat");
Route::view('/about-us', 'frontend.about-us');
Route::get('/wanted-section', 'WantedController@index')->name("wanted");
Route::post('/garagemail', 'GarageAdvertController@garagEmail')->name("garagemail");
Route::post('/report-car', 'FrontendUserController@ReportCar')->name("report-car-detail");
Route::post('/fetch-data/{type}', 'FrontendUserController@CategoryDataDisplay')->name("fetch-data-dashboard");
Route::post('/swap-id', 'GarageAdvertController@SwapId')->name("swap_id");
Route::get('/swap-status/{id}', 'GarageAdvertController@swapStatusChat')->name("swap-status");
Route::get('/swap-decline/{id}/{o_id}', 'GarageAdvertController@swapDeclineRequest')->name("swap-decline");
Route::post('/miscemail', 'GarageAdvertController@miscEmail')->name("miscemail");
Route::get('/garage-section', 'GarageAdvertController@index')->name("garage");
Route::get('/thanku', 'Authcontroller@thankyou')->name("thanku");
Route::get('/homefilters/{query}/{val?}', 'ApiController@HomeFilters')->name("home-filters");
Route::get('/front-filter/{query}/{b?}/{m?}/{y?}', 'ApiController@HomeFrontFilters')->name("index-front-filter");
Route::post('/garage-rating/{id}/{c_id}', 'GarageAdvertController@GarageRating')->name("garage-rating");
Route::get('/wantedfilters/{query}', 'WantedController@wantedFilters')->name("wanted-filters");
Route::get('/wantedsave/{c_id}', 'WantedController@saveList')->name("wanted-save-list");
Route::get('/Blogsave/{c_id}', 'PostsController@BlogSaveList')->name("Blog-Save-List");
Route::get('/like-Car/{c_id}', 'FrontendUserController@LikeCarDetail')->name("like-car-detail");
Route::get('/Blog-Search/{search}', 'PostsController@BlogSearch')->name("blog-search");
Route::get('/ppc-Search/{search}', 'PostsController@PPCSearch')->name("ppc-search");
Route::get('/event-Search/{search}', 'EventsController@EventSearch')->name("event-search");
Route::post('create/garage-feedback', 'GarageAdvertController@GarageFeedBack')->name('create-garage-feedback');
Route::get('/event-list', 'EventsController@UserViewEvent')->name("event-frontend");
Route::get('/wantedsaveview', 'WantedController@saveListView')->name("wanted-save-list-view");
Route::get('garage-feedback/{id}', 'GarageAdvertController@GetGarageFeed')->name("get-garage-feedback");
Route::view('/recover/account', 'frontend.forgott-password');
Route::view('/contact-us', 'frontend.contact-us');
Route::get('/body-shop-services', 'GarageAdvertController@BodyIndex')->name("body-shop");
Route::view('/cookies-policies', 'frontend.cookies-policies');
Route::post('/forgott/password', 'AuthController@forgottPassword')->name("user-password-forgott");
Route::get('/api', 'ApiController@findcar')->name('api.findcar');
Route::post('/regapi', 'ApiController@reg')->name('regapi.reg');
Route::get('/', 'FrontendController@index')->name('frontend-home');
Route::get('/model/{id}', 'FrontendController@BrandBaseModel')->name('model-brand');
Route::get('/variant/{id}', 'FrontendController@ModelBaseVariant')->name('model-variant');
Route::get('/ppc-news/{id}', 'FrontendController@PPCNews')->name('ppc-news');
Route::get('/search/{search_query}', 'FrontendController@filterdDataIndex')->name('search-post-index');
Route::get('/filter/{query}/{op?}', 'FrontendController@filterData')->name('filter-data');
Route::get('/price-filter/{query}', 'FrontendController@priceFilterData')->name('price-filter-data');
Route::get('/mileage-filter/{query}', 'FrontendController@MileageFilterData')->name('mileage-filter-data');
Route::get('/filter-miscellanous/{query}/{search?}', 'MisecellinousController@filterMisc')->name('filter-misc');
Route::get('/search-miscellanous/{val}', 'MisecellinousController@SearchMisc')->name('misc-search');
Route::get('/filter-miscellanous-price/{val1}/{val2}/{search?}', 'MisecellinousController@SearchPriceMisc')->name('misc-price-filter');
Route::get('/postal/{fill}/{col}/{type}/{raw?}', 'FrontendController@postalData')->name('postal-data');
Route::get('/wanted-search/{col}/{fill}}', 'WantedController@wantedSearch')->name('wanted-search');
Route::get('/garage-search/{col}/{val}}', 'GarageAdvertController@Search')->name('garage-search');
Route::get('/dashboard/{val}/{con}', 'FrontendController@dahsboardFilter')->name('dashboard-filters');
Route::post('/wanted-search', 'WantedController@WantedSearchFrontEnd')->name("wanted-search-frontend");
Route::get('/misecellinous', 'FrontendController@misecellinous')->name('frontend-misecellinous');
Route::get('/car-selling-lease', 'FrontendController@carSellingLease')->name('frontend-car-selling-lease');
//Route::get('/blog', 'FrontendController@blog')->name('frontend-blog');
// dashboard tabs
Route::post('star-rating/{id}/{c_id}', 'FrontendUserController@StarRating')->name("star-rating");
Route::get('my-advert/', 'FrontendUserController@MyAdvert')->name("my-advert");
Route::get('sell-your-car/{id?}', 'FrontendUserController@SellYourCar')->name("sell-your-car");
Route::get('my-payments', 'FrontendUserController@MyPayments')->name("my.payments");
Route::get('Change-package/', 'FrontendUserController@ChangePackage')->name("change-package");
Route::get('create-wanted/{id?}', 'FrontendUserController@CreateWantedSection')->name("create-wanted-section");
Route::get('wanted-list/', 'FrontendUserController@WantedList')->name("wanted-list");
Route::get('create-garage/{id?}', 'FrontendUserController@CreateGarage')->name("create-garage");
Route::get('garage-list/', 'FrontendUserController@GarageList')->name("garage-list");
Route::get('create-miscallanous/{id?}', 'FrontendUserController@CreateMics')->name("create-misc-dashboard");
Route::get('miscallanous-list/', 'FrontendUserController@Miscallanous')->name("misc-list");
Route::get('profile-dashboard/', 'FrontendUserController@ProfileDashboard')->name("profile-dashboard");
Route::get('packages-dashboard/', 'FrontendUserController@PackagesDashboard')->name("package-dashboard");
Route::get('/car-selling-auction', 'FrontendController@carSellingAuction')->name('frontend-car-selling-auction');
Route::get('/car-selling', 'FrontendController@carSelling')->name('frontend-car-selling');
Route::get('/events', 'FrontendController@events')->name('frontend-events');
Route::get('/events', 'FrontendController@events')->name('frontend-events');
//Route::get('/garage-services', 'FrontendController@garageServices')->name('frontend-garage-services');
Route::get('/american-muscle', 'FrontendController@americanMuscle')->name('frontend-american-muscle');
Route::get('/auction-cars', 'FrontendController@auctionCars')->name('frontend-auction-cars');
Route::get('/search-lease-cars', 'FrontendController@searchLeaseCars')->name('frontend-search-lease-cars');
Route::get('/rental-cars', 'FrontendController@rentalCars')->name('frontend-rental-cars');
Route::get('/classified-cars', 'FrontendController@classifiedCars')->name('frontend-classified-cars');
Route::get('/Prestige-cars', 'FrontendController@PrestigeCars')->name('frontend-Prestige-cars');
Route::get('/swap-cars/{s_id}', 'FrontendController@swapCars')->name('frontend-swap-cars');
Route::get('/swap-pricing/{p_id}', 'FrontendController@SwapPricing')->name('swap-pricing');
Route::get('/ankar-filter/{con}', 'FrontendController@ankarFilter')->name('ankar-filter');
Route::get('/swap-list', 'FrontendController@swapList')->name('frontend-swap-list');
Route::get('/swap-index/{query}', 'FrontendController@swapIndex')->name('frontend-swap-index');
Route::post('/add-cookie', 'ApiController@cookie')->name('add-cookie');
Route::post('/Resend-Mail/{mail}', 'AuthController@ResendMail')->name('resend-mail');
Route::resource('events', 'EventsController');
Route::resource('testimonial', 'TestimonialController');
Route::resource('privacy-policy', 'PrivacyPolicyController');
Route::resource('term-condition', 'TermConditionController');
Route::resource('careers', 'CareersController');
Route::resource('ppc', 'PPCNewsLetterController');
Route::get('blog/{id?}', 'PostsController@UserView')->name('frontend-blog');
Route::post('create/biding', 'FrontendUserController@CreateBid')->name('create-auction-bid');
Route::post('/contact-mail', 'FrontendController@FooterMail')->name('footer-mail');
Route::post('create/blog-comment', 'BlogCommentController@create')->name('create-blog-comment');
Route::get('update/home-status/{id}', 'HomeImageController@HomeStatus')->name('home-image-status');
Route::post('create/car-comment', 'FrontendUserController@CarComment')->name('create-car-comment');
Route::post('comment/load-more', 'FrontendController@loadComment')->name('blog-comment-load-more');
Route::post('Car-Comment/load-more', 'FrontendController@loadCarComment')->name('car-comment-load-more');
Route::get('/Car-details/{id}', 'FrontendUserController@CarDetail')->name('car-details')->middleware('recentSearch');
Route::group(['prefix' => 'user'], function () {
    Route::get('/login/{id?}/{package?}', 'AuthController@userLogin')->name('user-login');
    Route::get('/rental/{car}', 'AuthController@RentalLogin')->name('rental-login');
    Route::get('/garage-login/{gr}', 'AuthController@garageLogin')->name('garage-login');
    Route::get('/chat-login/{chat}', 'AuthController@ChatLogin')->name('chat.login');
    Route::get('/Blog-login/{bg}', 'AuthController@BlogLogin')->name('blog-login');
    Route::get('/auction-login/{ac}/{ac_id}', 'AuthController@AuctionLogin')->name('auction-login');
    Route::get('/swap-login/{sw}/{s_id}', 'AuthController@swapLogin')->name('swap-login');
    Route::post('/login/submit', 'AuthController@userLoginSubmit')->name('user-login-submit');
    Route::post('/social_login/submit', 'AuthController@social_login')->name('social-login-submit');
    Route::get('/confirm/email/{package_id?}', 'AuthController@confirm_email')->name('confirm_email');
    // Logout
    Route::get('/del_misc/{id}', 'FrontendUserController@del_misc')->name('del_misc');
    Route::get('/del_car/{id}', 'FrontendUserController@del_car')->name('del_car');
    Route::get('/logout', 'AuthController@userLogout')->name('user-logout');
    Route::post('/updatecar', 'FrontendUserController@user_update_car')->name('updatecar');
    // Register
    Route::post('/register/submit', 'AuthController@userRegisterSubmit')->name('user-register-submit');
    Route::get('/dashboard/{tab}/{flag?}/', 'FrontendUserController@userDashboard')->name('user-dashboard');
    Route::post('/savecar', 'FrontendUserController@user_save_car')->name('savecar');
    Route::post('/add_garage_advert', 'FrontendUserController@add_garage_advert')->name('add_garage');
    Route::post('/add_wanted/advert', 'FrontendUserController@add_wanted_advert')->name('add_wanted');
    Route::get('/garage_del/{id}', 'FrontendUserController@del_garage')->name('del_garage');
    Route::get('/del_wanted/{id}', 'FrontendUserController@del_wanted')->name('del_wanted');
    Route::post('/purchase', 'FrontendUserController@packagePurchase')->name('package.purchase');

    // Change Password

    Route::get('/change-password', 'FrontendUserController@userChangePassword')->name('user-change-password');
    Route::post('/change-password', 'FrontendUserController@userChangePasswordSubmit')->name('user-pass-change-submit');
    // Update Profile
    Route::post('/user-profile', 'FrontendUserController@userProfileUpdate')->name('user-profile-update');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        if (Auth::check()) {
            return Redirect::to('admin/home');
        }
        return view('auth.login');
    });

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', 'BlogReaderController@index')
            ->name('blog-page');
        Route::get(
            '/{blogPostSlug}',
            'BlogReaderController@viewSinglePost'
        )->name('blog-page.singles');
        Route::group(['middleware' => 'throttle:10,3'], function () {
            Route::post(
                'save_comment/{blogPostSlug}',
                'CommentController@addNewComment'
            )->name('comments.add_new_comment');
        });
    });
    Route::middleware(['auth'])->group(function () {
        Route::group(['prefix' => 'comments',], function () {
            Route::get(
                '/',
                'BlogCommentController@index'
            )->name('comments.index');
            Route::get(
                '/Car/Comments',
                'BlogCommentController@CarComments'
            )->name('car.comment');
            Route::patch(
                '/{commentId}',
                'BlogCommentController@approve'
            )->name('comments.approve');
            Route::delete(
                '/{commentId}',
                'BlogCommentController@destroy'
            )->name('comments.delete');
        });
        Route::group(['prefix' => 'application'], function () {
            Route::get('/metasettings', 'ApplicationController@metaSettings')->name('meta-settings');
            Route::post('/tagcreate', 'TagsController@tagcreate')->name('tag-create');
        });
        Route::resource('settings', 'SettingsController');
        Route::resource('logs', 'LogsController');
        Route::group(['prefix' => 'subscribers'], function () {
            Route::get('/countersubscribers', 'SubscriberController@counterSubscribers')->name('counter-subscribers');
        });
        Route::get('lang/{locale}', 'LocalizationController@index')->name('language');
        Route::resource('notifications', 'NotificationController');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/profile', 'HomeController@profile')->name('profile-admin');
        Route::post('/password', 'HomeController@passwordUpdate')->name('profile-admin-password');
        Route::get('/delete/{model}/{route}/{id}', 'HomeController@delete')->name('delete-model');
        Route::resource('pages', 'PagesController');
        Route::resource('roles', 'RolesController');
        Route::resource('posts', 'PostsController');
        Route::resource('homeImage', 'HomeImageController');
        Route::resource('notifications', 'NotificationController');
        Route::resource('testimonial', 'TestimonialController');
        Route::resource('permissions', 'PermissionController');
        Route::group(['prefix' => 'users'], function () {
            Route::get('/all', 'UserController@index')->name('all-users');
            Route::get('/user/packages', 'UserController@UsersPackages')->name('all-users-pakg');
            Route::get('/all/User/Payment', 'UserController@UserPaymentAll')->name('all-user-payment');
            Route::get('/create', 'UserController@form')->name('create-users');
            Route::get('/edit/{id}', 'UserController@form')->name('edit-users');
            Route::post('/profile', 'UserController@profile')->name('profile-users');
            Route::get('/status/{status}/{id}', 'UserController@status')->name('status-users');
            Route::post('/search', 'UserController@search')->name('search-user');
            Route::post('/password', 'UserController@passwordUpdate')->name('update-user-password');
        });
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/all', 'SettingsController@index')->name('all-settings');
            Route::get('settings/form', 'SettingsController@form')->name('form-settings');
            Route::get('/edit/{id}', 'SettingsController@form')->name('edit-settings');
            Route::post('/update', 'SettingsController@updated')->name('update-settings');
            Route::get('/status/{status}/{id}', 'UserController@status')->name('status-users');
            Route::post('/search', 'UserController@search')->name('search-user');
        });
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/all', 'CategoryController@all')->name('all-categories');
            Route::get('/create', 'CategoryController@create')->name('create-category');
            Route::post('/save', 'CategoryController@save')->name('save-category');
            Route::get('/show/{id}', 'CategoryController@show')->name('show-category');
            Route::get('/delete/{id}', 'CategoryController@delete')->name('delete-category');
            Route::post('/updatestatus', 'CategoryController@updateStatus')->name('updatestatus-category');
            Route::post('/updatetop', 'CategoryController@updateTop')->name('updatetop-category');
        });
        Route::group(['prefix' => 'packages'], function () {
            Route::get('/all', 'PackageController@index')->name('all-packages');
            Route::get('/search', 'PackageController@Search')->name('all-packages-search');
            Route::get('/create', 'PackageController@form')->name('create-packages');
            Route::get('/edit/{id}', 'PackageController@form')->name('edit-packages');
            Route::post('/save', 'PackageController@save')->name('save-packages');
            Route::get('/status/{status}/{id}', 'UserController@status')->name('status-users');
        });
        Route::group(['prefix' => 'manufacturers'], function () {
            Route::get('/all', 'BrandController@all')->name('all-brands');
            Route::get('/create', 'BrandController@create')->name('create-brand');
            Route::get('/search', 'BrandController@search')->name('search-brand');
            Route::post('/save', 'BrandController@save')->name('save-brand');
            Route::get('/show/{id}', 'BrandController@show')->name('show-brand');
            Route::get('/delete/{id}', 'BrandController@delete')->name('delete-brand');
            Route::post('/updatestatus', 'BrandController@updateStatus')->name('updatestatus-brand');
            Route::post('/updatetop', 'BrandController@updateTop')->name('updatetop-brand');
        });
        Route::group(['prefix' => 'car-settings'], function () {
            Route::get('/all/{key}', 'CarSettingController@all')->name('all-car-settings');
            Route::get('/create/{key}', 'CarSettingController@create')->name('create-car-settings');
            Route::get('/search/{key}', 'CarSettingController@search')->name('search-car-settings');
            Route::get('/brand-filter/{key}', 'CarSettingController@BrandFilter')->name('brand-filter-car-setting');
            Route::post('/save/{key}', 'CarSettingController@save')->name('save-car-settings');
            Route::get('/show/{id}/{key}', 'CarSettingController@show')->name('show-car-settings');
            Route::get('/delete/{id}/{key}', 'CarSettingController@delete')->name('delete-car-settings');
            Route::get('/report-car/delete/{id}', 'CarSettingController@DeleteReportCar')->name('delete-report-car');
            Route::get('/report/list', 'CarSettingController@CarReport')->name('car-report-list');
            Route::post('/updatestatus/{key}', 'CarSettingController@updateStatus')->name('updatestatus-car-settings');
            Route::post('/updatetop/{key}', 'CarSettingController@updateTop')->name('updatetop-car-settings');
        });
        Route::group(['prefix' => 'general'], function () {
            Route::get('/view-notifications/{job_id}/{notification_id}', 'notificationController@viewNotifications')->name('view-notifications');
        });
        Route::group(['prefix' => 'reports'], function () {
            Route::get('/users', 'ReportsController@usersReport')->name('users-report');
            Route::get('/users/csv', 'ReportsController@usersReportCsv')->name('users-report-csv');
        });
        Route::group(['prefix' => 'form-settings'], function () {
            Route::get('/all-engin-types', 'FormSetingController@allEnginTypes')->name('all-engin-types');
            Route::get('/all-sell-types/{model}', 'FormSetingController@allSellTypes')->name('all-sell-types');
            Route::get('delete/sell-car/{id}/{model}', 'FormSetingController@DeleteCarSell')->name('delete-car-sell');
            Route::get('search/sell-car/{model}', 'FormSetingController@SearchCarSell')->name('search-car-sell');
            Route::get('/form-settings/{status}/{id}/{model}', 'FormSetingController@status')->name('form-settings-status');
            Route::post('/form-settings/engine-type', 'FormSetingController@update')->name('form-settings-engine-type');
            Route::get('/all-american-muscles', 'FormSetingController@allEnginTypes')->name('all-american-muscles');
            Route::get('/all-auctions', 'FormSetingController@allEnginTypes')->name('all-auctions');
            Route::get('/all-lease-cars', 'FormSetingController@allEnginTypes')->name('all-lease-cars');
            Route::get('/all-rentals', 'FormSetingController@allEnginTypes')->name('all-rentals');
            Route::get('/all-classifieds', 'FormSetingController@allEnginTypes')->name('all-classifieds');
            Route::get('/all-swaps', 'FormSetingController@allEnginTypes')->name('all-swaps');
        });

    });

});
