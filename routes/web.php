<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Models\Country;

Route::get('/', function () {
    return view('index', [
        'countries' => Country::all(),
        'active' => 'Dashboard'
    ]);
});

Route::resource('customer', CustomerController::class)->names([
    'index' => 'customer.index',
    'create' => 'customer.create',
    'show' => 'customer.show',
    'edit' => 'customer.edit',
    'update' => 'customer.update',
    'destroy' => 'customer.destroy',
]);

// Dalam tampilan Blade
// <a href="{{ route('posts.index') }}">Daftar Post</a>

// Dalam controller
// return redirect()->route('posts.index');
