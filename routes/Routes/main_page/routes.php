<?php
Route::group(['middleware' => ['web', 'auth']], function () {

    // Panel Account
    Route::group(['prefix' => 'main_page/account'], function() {
        Route::get('/', ['as' => 'account.index', 'uses' => 'Admin\UserController@index']);
        // Create Insert User
        Route::get('/create', ['as' => 'account.create', 'uses' => 'Admin\UserController@create']);
        Route::post('/insert', ['as' => 'account.insert', 'uses' => 'Admin\UserController@insert']);
        // Edit Update User
        Route::get('/edit/{id}/{myAccount}', ['as' => 'account.edit', 'uses' => 'Admin\UserController@edit']);
        Route::post('/update', ['as' => 'account.update', 'uses' => 'Admin\UserController@update']);
        // Delete
        Route::get('/delete/{id}', ['as' => 'account.delete', 'uses' => 'Admin\UserController@delete']);
        // Restore
        Route::get('/restore/{id}', ['as' => 'account.restore', 'uses' => 'Admin\UserController@restore']);
        // AJAX
        Route::get('/setdata/{id}', ['as' => 'account.setdata', 'uses' => 'Admin\UserController@setdata']);
    });

    // Panel Allotment
    Route::group(['prefix' => 'main_page/allotment'], function() {
        Route::get('/', ['as' => 'allotment.index', 'uses' => 'Allotment\AllotmentController@index']);
        Route::get('/allotmentdata', ['as' => 'allotment.data', 'uses' => 'Allotment\AllotmentController@data']);
        Route::get('/allotment_this_month_data', ['as' => 'allotment.this_month_data', 'uses' => 'Allotment\AllotmentController@this_month_data']);
        // Report
        Route::get('/allotmentreportdata', ['as' => 'allotment.report_data', 'uses' => 'Allotment\AllotmentController@report_data']);

        // Crete User
        Route::get('/create', ['as' => 'allotment.create', 'uses' => 'Allotment\AllotmentController@create']);
        Route::post('/insert', ['as' => 'allotment.insert', 'uses' => 'Allotment\AllotmentController@insert']);
        // Edit Update Allotment
        Route::get('/edit/{id}', ['as' => 'allotment.edit', 'uses' => 'Allotment\AllotmentController@edit']);
        Route::post('/update', ['as' => 'allotment.update', 'uses' => 'Allotment\AllotmentController@update']);
        // Delete
        Route::get('/delete/{id}', ['as' => 'allotment.delete', 'uses' => 'Allotment\AllotmentController@delete']);
        // AJAX
        Route::get('/setdata/{id}', ['as' => 'allotment.setdata', 'uses' => 'Allotment\AllotmentController@setdata']);
    });

    // Panel Allotment
    Route::group(['prefix' => 'main_page/reservation'] , function() {
        Route::get('/', ['as' => 'reservation.index', 'uses' => 'Reservation\ReservationController@index']);

        // Get Room Reservation Data
        Route::get('/room_todayreservationdata', ['as' => 'reservation.today_room_data', 'uses' => 'Reservation\ReservationController@today_room_data']);
        Route::get('/room_reservationdata', ['as' => 'reservation.room_data', 'uses' => 'Reservation\ReservationController@room_data']);
        Route::get('/room_successreservationdata', ['as' => 'reservation.room_data_success', 'uses' => 'Reservation\ReservationController@room_data_success']);
        Route::get('/room_reservation_this_month_data', ['as' => 'reservation.room_this_month_data', 'uses' => 'Reservation\ReservationController@room_this_month_data']);

        // Get Product Reservation Data
        Route::get('/product_reservationdata', ['as' => 'reservation.product_data', 'uses' => 'Reservation\ReservationController@product_data']);
        Route::get('/product_successreservationdata', ['as' => 'reservation.product_data_success', 'uses' => 'Reservation\ReservationController@product_data_success']);
        Route::get('/product_reservation_today', ['as' => 'reservation.product_reservation_today', 'uses' => 'Reservation\ReservationController@product_reservation_today']);

        // Get Inquiry Data
        Route::get('/product_inquirysuccessreservationdata', ['as' => 'reservation.inquiry_data_success', 'uses' => 'Reservation\ReservationController@inquiry_data_success']);
        Route::get('/product_inquiry_data', ['as' => 'reservation.product_inquiry_data', 'uses' => 'Reservation\ReservationController@product_inquiry_data']);
        Route::get('/product_inquiry_today', ['as' => 'reservation.product_inquiry_today', 'uses' => 'Reservation\ReservationController@product_inquiry_today']);

        Route::get('/resend_email/{id}/{email}', ['as' => 'reservation.resend_email', 'uses' => 'Reservation\ReservationController@resend_email']);

        // Get Customer Data
        Route::get('/customer_data', ['as' => 'reservation.customer_data', 'uses' => 'Reservation\ReservationController@customer_data']);

        // Refund & Reschedule
        Route::post('/refundreschedule', ['as' => 'reservation.refund_reschedule', 'uses' => 'Reservation\ReservationController@refundReschedule']);

        // Print Voucher
        Route::get('/print-voucher', ['as' => 'reservation.print_voucher', 'uses' => 'Reservation\ReservationController@printVoucher']);

        // Export Excel
        Route::post('/salesexportexcel', ['as' => 'sales.sales_export_excel', 'uses' => 'Reservation\ReservationController@sales_export_excel']);
        Route::post('/reservationexportexcel', ['as' => 'reservation.reservation_export_excel', 'uses' => 'Reservation\ReservationController@reservation_export_excel']);
        Route::post('/customerxportexcel', ['as' => 'customer.customer_export_excel', 'uses' => 'Reservation\ReservationController@customer_export_excel']);
        Route::post('/allotmentexportexcel', ['as' => 'reservation.allotment_export_excel', 'uses' => 'Reservation\ReservationController@allotment_export_excel']);
    });

    // Setting
    Route::group(['prefix' => 'main_page/setting'], function() {
        Route::get('/', ['as' => 'setting.index', 'uses' => 'Admin\SettingController@index']);
        Route::post('/', ['as' => 'setting.store', 'uses' => 'Admin\SettingController@store']);
    });

    // Page Setting
    Route::group(['prefix' => 'main_page/page_setting'], function() {
        Route::get('/', ['as' => 'page_setting.index', 'uses' => 'Admin\PageSettingController@index']);
        Route::get('/edit/{id}', ['as' => 'page_setting.edit', 'uses' => 'Admin\PageSettingController@edit']);
        Route::post('/', ['as' => 'page_setting.store', 'uses' => 'Admin\PageSettingController@store']);
    });
});
