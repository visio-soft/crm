<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'crm'], function () {
    // Email tracking routes
    Route::get('/track/email/{tracking_id}', [\Modules\CRM\app\Http\Controllers\EmailTrackingController::class, 'trackOpen'])
        ->name('crm.track.email');
    Route::get('/track/link/{tracking_id}/{link_id}', [\Modules\CRM\app\Http\Controllers\EmailTrackingController::class, 'trackClick'])
        ->name('crm.track.link');
});
