<?php

namespace App\Livewire\Admin;

use App\Models\Appeal;
use App\Models\BlogPost;
use App\Models\NewsPost;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'newsCount' => NewsPost::count(),
            'blogCount' => BlogPost::count(),
            'appealsCount' => Appeal::count(),
            'latestAppeals' => Appeal::latest()->take(5)->get(),
            'latestNews' => NewsPost::latest()->take(5)->get(),
        ]);
    }
}
