<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'create'])->name('login');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return inertia('Home');
    });

    Route::get('/users', function () {
        return inertia('Users/Index', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->paginate()
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]),
            'filters' => Request::only(['search'])
        ]);
    })->name('students.index');

    Route::get('/users/create', function () {
        return inertia('Users/Create');
    });

    Route::post('/users', function () {
        //* validate the request
        $attributes = Request::validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //* create the user

        User::create($attributes);

        //* redirect
        return redirect('/users');
    });

    Route::post('/logout', function () {
        dd('Logging the user out');
    });
});
