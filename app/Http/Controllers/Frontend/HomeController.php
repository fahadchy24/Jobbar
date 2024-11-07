<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeListingResource;
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

        $listings = Listing::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', "%{$search}%");
        })->latest()->get();

        return Inertia::render('Frontend/Home', [
            'listings' => HomeListingResource::collection($listings),
            'listing_count' => number_format($listings->count()),
            'plural' => str('Result')->plural($listings->count()),
            'searchQuery' => request('search', '')
        ]);
    }
}
