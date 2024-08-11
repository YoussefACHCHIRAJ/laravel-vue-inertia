<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Home');
});

Route::get('/users', function () {
    return inertia('Users', [
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

Route::get('/settings', function () {
    return inertia('Settings');
});

Route::post('/logout', function () {
    dd('Logging the user out');
});
