<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ListingDetailsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Listing $listing): View
    {
        return view('frontend.listing_details', compact('listing'));
    }
}
