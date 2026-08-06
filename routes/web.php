<?php

use App\Http\Middleware\EnsureTeamMembership;
use App\Models\BlogPost;
use App\Models\NewsPost;
use Illuminate\Support\Facades\Route;

// Публичные маршруты
Route::get('/', function () {
    return view('public.home', [
        'latestNews' => NewsPost::published()->latest('published_at')->take(3)->get(),
    ]);
})->name('home');

Route::view('/o-deputate', 'public.about')->name('about');

Route::get('/novosti', function () {
    return view('public.news', [
        'news' => NewsPost::published()->latest('published_at')->paginate(9),
    ]);
})->name('news');

Route::get('/novosti/{newsPost}', function (NewsPost $newsPost) {
    abort_unless($newsPost->status === 'published', 404);

    return view('public.show-post', [
        'post' => $newsPost,
        'related' => NewsPost::published()
            ->where('id', '!=', $newsPost->id)
            ->where('category', $newsPost->category)
            ->latest('published_at')
            ->take(3)
            ->get(),
    ]);
})->name('news.show');

Route::get('/blog', function () {
    return view('public.blog', [
        'blogPosts' => BlogPost::published()->latest('published_at')->paginate(9),
    ]);
})->name('blog');

Route::get('/blog/{blogPost}', function (BlogPost $blogPost) {
    abort_unless($blogPost->status === 'published', 404);

    return view('public.show-post', [
        'post' => $blogPost,
        'related' => BlogPost::published()
            ->where('id', '!=', $blogPost->id)
            ->where('category', $blogPost->category)
            ->latest('published_at')
            ->take(3)
            ->get(),
    ]);
})->name('blog.show');

Route::view('/kontakty', 'public.contacts')->name('contacts');

// Карта сайта
Route::get('/sitemap.xml', function () {
    $urls = collect([
        route('home'),
        route('about'),
        route('news'),
        route('blog'),
        route('contacts')
    ])
    ->merge(NewsPost::published()->pluck('slug')->map(fn ($slug) => route('news.show', $slug)))
    ->merge(BlogPost::published()->pluck('slug')->map(fn ($slug) => route('blog.show', $slug)));

    return response()
        ->view('public.sitemap', ['urls' => $urls])
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

// Административная панель
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::view('/', 'admin.dashboard')->name('dashboard');
        Route::view('/news', 'admin.news')->name('news');
        Route::view('/blog', 'admin.blog')->name('blog');
        Route::view('/appeals', 'admin.appeals')->name('appeals');
    });

// Маршруты с привязкой к команде (для многопользовательских аккаунтов)
Route::prefix('{current_team}')
    ->middleware(['auth', 'verified', EnsureTeamMembership::class])
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
    });

require __DIR__.'/settings.php';