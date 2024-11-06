<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        $search = $request->input('search');

        return Inertia::render('Frontend/Home', [
            'listings' => Listing::when($search, function ($query) use ($search) {
                return $query->where('title', 'like', "%{$search}%");
            })->latest()->get()
        ]);
    }
}
