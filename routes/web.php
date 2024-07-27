<?php

use App\Http\Controllers\pages\IndexController;
use App\Http\Controllers\pages\AboutController;
use App\Http\Controllers\pages\SportController;
use App\Http\Controllers\pages\EventController;
use App\Http\Controllers\pages\ContestantController;
use App\Http\Controllers\pages\PlayerAchievementController;
use App\Http\Controllers\pages\BlogController;
use App\Http\Controllers\pages\ContactController;
use App\Http\Controllers\pages\RegisterOneController;
use App\Http\Controllers\pages\RegisterTwoController;
use App\Http\Controllers\pages\SportDetailController;
use App\Http\Controllers\pages\GalleryController;
use App\Http\Controllers\pages\MediaController;
use App\Http\Controllers\pages\ContestantDetailController;
use App\Http\Controllers\pages\PlayerAchievementDetailController;

// pages.view routes
Route::get('/', [IndexController::class, 'Home'])->name('page.homepage');
Route::get('/about', [AboutController::class, 'About'])->name('page.about');
Route::get('/sport', [SportController::class, 'index'])->name('page.sports');
Route::get('/sport/{slug}', [SportController::class, 'show'])->name('page.sportdetail');
Route::get('/event', [EventController::class, 'index'])->name('page.events');
Route::get('/contestant', [ContestantController::class, 'index'])->name('page.contestants');
Route::get('/contestant/{slug}', [ContestantDetailController::class, 'show'])->name('page.contestantdetail');
Route::get('/playerAchievement', [PlayerAchievementController::class, 'PlayerAchievements'])->name('page.playerAchievement');
Route::get('/blog', [BlogController::class, 'index'])->name('page.blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('page.blogdetail');

Route::get('/contact', [ContactController::class, 'Contact'])->name('page.contact');
Route::get('/registerone', [RegisterOneController::class, 'Register'])->name('page.registerone');
Route::get('/registertwo', [RegisterTwoController::class, 'RegisterTwo'])->name('page.registertwo');

Route::get('/gallery', [GalleryController::class, 'Gallery'])->name('page.gallery');
Route::get('/media', [MediaController::class, 'Media'])->name('page.media');


Route::get('/playerachievementdetail', [PlayerAchievementDetailController::class, 'PlayerAchievementDetail'])->name('page.playerachievementdetail');


// pages.view routes end

//Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Sport Category
    Route::delete('sport-categories/destroy', 'SportCategoryController@massDestroy')->name('sport-categories.massDestroy');
    Route::post('sport-categories/parse-csv-import', 'SportCategoryController@parseCsvImport')->name('sport-categories.parseCsvImport');
    Route::post('sport-categories/process-csv-import', 'SportCategoryController@processCsvImport')->name('sport-categories.processCsvImport');
    Route::resource('sport-categories', 'SportCategoryController');

    // Add Sport
    Route::delete('add-sports/destroy', 'AddSportController@massDestroy')->name('add-sports.massDestroy');
    Route::post('add-sports/media', 'AddSportController@storeMedia')->name('add-sports.storeMedia');
    Route::post('add-sports/ckmedia', 'AddSportController@storeCKEditorImages')->name('add-sports.storeCKEditorImages');
    Route::post('add-sports/parse-csv-import', 'AddSportController@parseCsvImport')->name('add-sports.parseCsvImport');
    Route::post('add-sports/process-csv-import', 'AddSportController@processCsvImport')->name('add-sports.processCsvImport');
    Route::resource('add-sports', 'AddSportController');

    // Add Event
    Route::delete('add-events/destroy', 'AddEventController@massDestroy')->name('add-events.massDestroy');
    Route::post('add-events/media', 'AddEventController@storeMedia')->name('add-events.storeMedia');
    Route::post('add-events/ckmedia', 'AddEventController@storeCKEditorImages')->name('add-events.storeCKEditorImages');
    Route::post('add-events/parse-csv-import', 'AddEventController@parseCsvImport')->name('add-events.parseCsvImport');
    Route::post('add-events/process-csv-import', 'AddEventController@processCsvImport')->name('add-events.processCsvImport');
    Route::resource('add-events', 'AddEventController');

    // Contestant Category
    Route::delete('contestant-categories/destroy', 'ContestantCategoryController@massDestroy')->name('contestant-categories.massDestroy');
    Route::post('contestant-categories/media', 'ContestantCategoryController@storeMedia')->name('contestant-categories.storeMedia');
    Route::post('contestant-categories/ckmedia', 'ContestantCategoryController@storeCKEditorImages')->name('contestant-categories.storeCKEditorImages');
    Route::post('contestant-categories/parse-csv-import', 'ContestantCategoryController@parseCsvImport')->name('contestant-categories.parseCsvImport');
    Route::post('contestant-categories/process-csv-import', 'ContestantCategoryController@processCsvImport')->name('contestant-categories.processCsvImport');
    Route::resource('contestant-categories', 'ContestantCategoryController');

    // Add Contestant
    Route::delete('add-contestants/destroy', 'AddContestantController@massDestroy')->name('add-contestants.massDestroy');
    Route::post('add-contestants/parse-csv-import', 'AddContestantController@parseCsvImport')->name('add-contestants.parseCsvImport');
    Route::post('add-contestants/process-csv-import', 'AddContestantController@processCsvImport')->name('add-contestants.processCsvImport');
    Route::resource('add-contestants', 'AddContestantController');

    // Add Gallery
    Route::delete('add-galleries/destroy', 'AddGalleryController@massDestroy')->name('add-galleries.massDestroy');
    Route::post('add-galleries/media', 'AddGalleryController@storeMedia')->name('add-galleries.storeMedia');
    Route::post('add-galleries/ckmedia', 'AddGalleryController@storeCKEditorImages')->name('add-galleries.storeCKEditorImages');
    Route::post('add-galleries/parse-csv-import', 'AddGalleryController@parseCsvImport')->name('add-galleries.parseCsvImport');
    Route::post('add-galleries/process-csv-import', 'AddGalleryController@processCsvImport')->name('add-galleries.processCsvImport');
    Route::resource('add-galleries', 'AddGalleryController');

    // Featured Videos
    Route::delete('featured-videos/destroy', 'FeaturedVideosController@massDestroy')->name('featured-videos.massDestroy');
    Route::post('featured-videos/media', 'FeaturedVideosController@storeMedia')->name('featured-videos.storeMedia');
    Route::post('featured-videos/ckmedia', 'FeaturedVideosController@storeCKEditorImages')->name('featured-videos.storeCKEditorImages');
    Route::post('featured-videos/parse-csv-import', 'FeaturedVideosController@parseCsvImport')->name('featured-videos.parseCsvImport');
    Route::post('featured-videos/process-csv-import', 'FeaturedVideosController@processCsvImport')->name('featured-videos.processCsvImport');
    Route::resource('featured-videos', 'FeaturedVideosController');

    // Add Media
    Route::delete('add-media/destroy', 'AddMediaController@massDestroy')->name('add-media.massDestroy');
    Route::post('add-media/media', 'AddMediaController@storeMedia')->name('add-media.storeMedia');
    Route::post('add-media/ckmedia', 'AddMediaController@storeCKEditorImages')->name('add-media.storeCKEditorImages');
    Route::post('add-media/parse-csv-import', 'AddMediaController@parseCsvImport')->name('add-media.parseCsvImport');
    Route::post('add-media/process-csv-import', 'AddMediaController@processCsvImport')->name('add-media.processCsvImport');
    Route::resource('add-media', 'AddMediaController');

    // Add Review
    Route::delete('add-reviews/destroy', 'AddReviewController@massDestroy')->name('add-reviews.massDestroy');
    Route::post('add-reviews/media', 'AddReviewController@storeMedia')->name('add-reviews.storeMedia');
    Route::post('add-reviews/ckmedia', 'AddReviewController@storeCKEditorImages')->name('add-reviews.storeCKEditorImages');
    Route::resource('add-reviews', 'AddReviewController');

    // Add Faq
    Route::delete('add-faqs/destroy', 'AddFaqController@massDestroy')->name('add-faqs.massDestroy');
    Route::post('add-faqs/parse-csv-import', 'AddFaqController@parseCsvImport')->name('add-faqs.parseCsvImport');
    Route::post('add-faqs/process-csv-import', 'AddFaqController@processCsvImport')->name('add-faqs.processCsvImport');
    Route::resource('add-faqs', 'AddFaqController');

    // Add Achievement
    Route::delete('add-achievements/destroy', 'AddAchievementController@massDestroy')->name('add-achievements.massDestroy');
    Route::post('add-achievements/media', 'AddAchievementController@storeMedia')->name('add-achievements.storeMedia');
    Route::post('add-achievements/ckmedia', 'AddAchievementController@storeCKEditorImages')->name('add-achievements.storeCKEditorImages');
    Route::post('add-achievements/parse-csv-import', 'AddAchievementController@parseCsvImport')->name('add-achievements.parseCsvImport');
    Route::post('add-achievements/process-csv-import', 'AddAchievementController@processCsvImport')->name('add-achievements.processCsvImport');
    Route::resource('add-achievements', 'AddAchievementController');

    // Add Blog
    Route::delete('add-blogs/destroy', 'AddBlogController@massDestroy')->name('add-blogs.massDestroy');
    Route::post('add-blogs/media', 'AddBlogController@storeMedia')->name('add-blogs.storeMedia');
    Route::post('add-blogs/ckmedia', 'AddBlogController@storeCKEditorImages')->name('add-blogs.storeCKEditorImages');
    Route::post('add-blogs/parse-csv-import', 'AddBlogController@parseCsvImport')->name('add-blogs.parseCsvImport');
    Route::post('add-blogs/process-csv-import', 'AddBlogController@processCsvImport')->name('add-blogs.processCsvImport');
    Route::resource('add-blogs', 'AddBlogController');

    // Contact Form
    Route::delete('contact-forms/destroy', 'ContactFormController@massDestroy')->name('contact-forms.massDestroy');
    Route::post('contact-forms/media', 'ContactFormController@storeMedia')->name('contact-forms.storeMedia');
    Route::post('contact-forms/ckmedia', 'ContactFormController@storeCKEditorImages')->name('contact-forms.storeCKEditorImages');
    Route::post('contact-forms/parse-csv-import', 'ContactFormController@parseCsvImport')->name('contact-forms.parseCsvImport');
    Route::post('contact-forms/process-csv-import', 'ContactFormController@processCsvImport')->name('contact-forms.processCsvImport');
    Route::resource('contact-forms', 'ContactFormController');

    // Add Registration
    Route::delete('add-registrations/destroy', 'AddRegistrationController@massDestroy')->name('add-registrations.massDestroy');
    Route::post('add-registrations/parse-csv-import', 'AddRegistrationController@parseCsvImport')->name('add-registrations.parseCsvImport');
    Route::post('add-registrations/process-csv-import', 'AddRegistrationController@processCsvImport')->name('add-registrations.processCsvImport');
    Route::resource('add-registrations', 'AddRegistrationController');

    // Add Player
    Route::delete('add-players/destroy', 'AddPlayerController@massDestroy')->name('add-players.massDestroy');
    Route::post('add-players/media', 'AddPlayerController@storeMedia')->name('add-players.storeMedia');
    Route::post('add-players/ckmedia', 'AddPlayerController@storeCKEditorImages')->name('add-players.storeCKEditorImages');
    Route::post('add-players/parse-csv-import', 'AddPlayerController@parseCsvImport')->name('add-players.parseCsvImport');
    Route::post('add-players/process-csv-import', 'AddPlayerController@processCsvImport')->name('add-players.processCsvImport');
    Route::resource('add-players', 'AddPlayerController');

    // Add School
    Route::delete('add-schools/destroy', 'AddSchoolController@massDestroy')->name('add-schools.massDestroy');
    Route::post('add-schools/parse-csv-import', 'AddSchoolController@parseCsvImport')->name('add-schools.parseCsvImport');
    Route::post('add-schools/process-csv-import', 'AddSchoolController@processCsvImport')->name('add-schools.processCsvImport');
    Route::resource('add-schools', 'AddSchoolController');

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
