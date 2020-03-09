<?php





// frontend route start here
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','Frontend\DashboardController@Dashboard');
Route::get('/career','Frontend\DashboardController@Career');
Route::get('/fashion_tex','Frontend\DashboardController@FashionTex');
Route::get('/calendar','Frontend\DashboardController@Calendar');
Route::get('/appointment','Frontend\DashboardController@Appointment');
Route::get('/fashion_tex_style','Frontend\DashboardController@fashionTexStyle');
Route::get('/fashion_tex_social_media','Frontend\DashboardController@fashionTexSocialMedia');
//frontend route end here

//backend route start here
Route::resource('/calendar','Admin\CalendarAppointmentController');
Route::get('/all_appointment','Admin\CalendarAppointmentController@AllAppointment');
Route::get('/appointment_send','Admin\CalendarAppointmentController@store');
Route::post('/email_send','Admin\CalendarAppointmentController@appointmentReplyMail')->name('email.send');
Route::post('/approve/mail','Admin\CalendarAppointmentController@emailSend')->name('approve.mail');
Route::resource('employee','Admin\EmployeeController');
Route::post('/employee/update','Admin\EmployeeController@update')->name('employee.update');
Route::resource('fashion','Admin\FashionTexController');
Route::resource('assignment','Admin\CareerPointController');
Route::resource('task','Admin\TaskController');
Route::get('/assignment/edit/{id}','Admin\CareerPointController@edit');
Route::get('/assignment/delete/{id}','Admin\CareerPointController@destroy');
Route::resource('complete_assignment','Admin\CompleteAssignmentController');
Route::resource('track_complete_assignment','Admin\TrackCompleteAssignmentController');
Route::get('recycle_bin','Admin\TrackCompleteAssignmentController@trashed')->name('recycle_bin');
Route::get('/track/restore/{id}','Admin\TrackCompleteAssignmentController@restore');
Route::get('/track/permanent/delete/{id}','Admin\TrackCompleteAssignmentController@permanentDelete');
Route::resource('reports','Admin\ReportController');
Route::post('/approved/edit/','Admin\ReportController@approved')->name('approved.edit');
Route::post('/report/edit/','Admin\ReportController@reportEdit')->name('report.edit');
Route::get('/report/clear/{id}','Admin\ReportController@reportClear');
Route::get('/report/delete/{id}','Admin\ReportController@reportDelete');
Route::resource('role','Admin\RoleController');
Route::get('/role/delete/{id}','Admin\RoleController@destroy');
//backend route end here


