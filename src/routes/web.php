<?php

use Suraj\Contact\Http\Controllers\EnquiryController;

Route::group(['namespace' => 'Suraj\Contact\Http\Controllers'], function () {
    Route::get('contact', [EnquiryController::class, 'contact'])->name('contact');
    Route::post('contact', [EnquiryController::class, 'enquiry_store']);
});
