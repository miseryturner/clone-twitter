<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show() {
        $ideas = Idea::withTrashed()->get();
        return view('admin.dashboard', compact('ideas'));
    }
}
