<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Sport Category
    Route::apiResource('sport-categories', 'SportCategoryApiController');

    // Add Sport
    Route::post('add-sports/media', 'AddSportApiController@storeMedia')->name('add-sports.storeMedia');
    Route::apiResource('add-sports', 'AddSportApiController');

    // Add Event
    Route::post('add-events/media', 'AddEventApiController@storeMedia')->name('add-events.storeMedia');
    Route::apiResource('add-events', 'AddEventApiController');

    // Contestant Category
    Route::post('contestant-categories/media', 'ContestantCategoryApiController@storeMedia')->name('contestant-categories.storeMedia');
    Route::apiResource('contestant-categories', 'ContestantCategoryApiController');

    // Add Contestant
    Route::apiResource('add-contestants', 'AddContestantApiController');

    // Add Gallery
    Route::post('add-galleries/media', 'AddGalleryApiController@storeMedia')->name('add-galleries.storeMedia');
    Route::apiResource('add-galleries', 'AddGalleryApiController');

    // Featured Videos
    Route::post('featured-videos/media', 'FeaturedVideosApiController@storeMedia')->name('featured-videos.storeMedia');
    Route::apiResource('featured-videos', 'FeaturedVideosApiController');

    // Add Media
    Route::post('add-media/media', 'AddMediaApiController@storeMedia')->name('add-media.storeMedia');
    Route::apiResource('add-media', 'AddMediaApiController');

    // Add Review
    Route::post('add-reviews/media', 'AddReviewApiController@storeMedia')->name('add-reviews.storeMedia');
    Route::apiResource('add-reviews', 'AddReviewApiController');

    // Add Faq
    Route::apiResource('add-faqs', 'AddFaqApiController');

    // Add Achievement
    Route::post('add-achievements/media', 'AddAchievementApiController@storeMedia')->name('add-achievements.storeMedia');
    Route::apiResource('add-achievements', 'AddAchievementApiController');

    // Add Blog
    Route::post('add-blogs/media', 'AddBlogApiController@storeMedia')->name('add-blogs.storeMedia');
    Route::apiResource('add-blogs', 'AddBlogApiController');

    // Contact Form
    Route::post('contact-forms/media', 'ContactFormApiController@storeMedia')->name('contact-forms.storeMedia');
    Route::apiResource('contact-forms', 'ContactFormApiController');

    // Add Registration
    Route::apiResource('add-registrations', 'AddRegistrationApiController');

    // Add Player
    Route::post('add-players/media', 'AddPlayerApiController@storeMedia')->name('add-players.storeMedia');
    Route::apiResource('add-players', 'AddPlayerApiController');

    // Add School
    Route::apiResource('add-schools', 'AddSchoolApiController');
});
