<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $search = $request->input('search');

        $listings = Listing::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', "%{$search}%");
        })->latest()->get();

        return view('frontend.home', compact('listings'));
    }
}
