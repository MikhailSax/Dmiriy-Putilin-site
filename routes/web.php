<?php

use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;

Route::view('/', 'public.home')->name('home');
Route::view('/o-deputate', 'public.about')->name('about');
Route::view('/novosti', 'public.news')->name('news');
Route::view('/blog', 'public.blog')->name('blog');
Route::view('/kontakty', 'public.contacts')->name('contacts');

Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

require __DIR__.'/settings.php';
