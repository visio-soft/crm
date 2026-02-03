<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api/crm'], function () {
    // Email tracking routes
    Route::get('/track/email/{tracking_id}', [\Modules\CRM\Http\Controllers\EmailTrackingController::class, 'trackOpen'])
        ->name('api.crm.track.email');
    Route::get('/track/link/{tracking_id}/{link_id}', [\Modules\CRM\Http\Controllers\EmailTrackingController::class, 'trackClick'])
        ->name('api.crm.track.link');
});
