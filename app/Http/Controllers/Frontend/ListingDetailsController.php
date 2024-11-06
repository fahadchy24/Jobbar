<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListingDetailsResource;
use App\Models\Listing;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ListingDetailsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Listing $listing): Response
    {
        return Inertia::render('Frontend/ListingDetails', [
            'listing' => new ListingDetailsResource($listing)
        ]);
    }
}
