<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Throwable;

class ListingController extends Controller
{
    /**
     * Display a listings of the resource.
     */
    public function index(): View
    {
        $listings = Listing::latest()->get();
        return view('admin.listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.listings.create');
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
    public function show(Listing $listing)
    {
        return view('admin.listings.show', compact('listing'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing): View
    {
        return view('admin.listings.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing): RedirectResponse
    {
        $listing->update($request->validated());
        return to_route('admin.listings.index');
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(Listing $listing): RedirectResponse
    {
        $listing->deleteOrFail();
        return redirect()->route('admin.listings.index');
    }
}
