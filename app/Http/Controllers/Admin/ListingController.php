<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EmploymentType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Http\Resources\Admin\ListingDetailsResource;
use App\Http\Resources\Admin\ListingResource;
use App\Http\Resources\EmploymentTypeResource;
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
        return inertia()->render('Admin/Jobs/Create', [
            'employmentTypes' => EmploymentTypeResource::collection(EmploymentType::cases())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request): RedirectResponse
    {
        Listing::create($request->validated());

        return to_route('admin.listings.index');
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
            'employmentTypes' => EmploymentTypeResource::collection(EmploymentType::cases()),
            'listing' => new ListingDetailsResource($listing)
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(UpdateListingRequest $request, Listing $listing): RedirectResponse
    {
        $listing->updateOrFail($request->validated());

        return to_route('admin.listings.index');
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
