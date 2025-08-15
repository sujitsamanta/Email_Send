<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Email_Controller;

Route::view('','email_home');
Route::post('',[Email_Controller::class, 'send_email']);
