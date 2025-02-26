<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $infos = auth()->user();
            return view('dashboard', compact('infos'));
        }
        return redirect()->route('homepage');
    }
}
