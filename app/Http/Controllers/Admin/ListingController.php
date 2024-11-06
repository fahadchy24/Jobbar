<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Http\Resources\Admin\ListingDetailsResource;
use App\Http\Resources\Admin\ListingResource;
use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Throwable;

class ListingController extends Controller
{
    /**
     * Display a listings of the resource.
     */
    public function index(): Response
    {
        $listings = Listing::latest()->get();

        return inertia()->render('Admin/Jobs/Index', [
            'listings' => ListingResource::collection($listings)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return inertia()->render('Admin/Jobs/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request): Response
    {
        Listing::create($request->validated());

        return inertia()->render('Admin/Jobs/Index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing): Response
    {
        return inertia()->render('Admin/Jobs/Show', [
            'listing' => new ListingDetailsResource($listing)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing): Response
    {
        return inertia()->render('Admin/Jobs/Edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing): Response
    {
        $listing->update($request->validated());

        return inertia()->render('Admin/Jobs/Index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws Throwable
     */
    public function destroy(Listing $listing): RedirectResponse
    {
        $listing->deleteOrFail();

        return to_route('admin.listings.index');
    }
}
