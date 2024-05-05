<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Http\Requests\LocationRequest;

/**
 * Class LocationController
 * @package App\Http\Controllers
 */
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::paginate();

        return view('location.index', compact('locations'))
            ->with('i', (request()->input('page', 1) - 1) * $locations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $location = new Location();
        return view('location.create', compact('location'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request)
    {
        Location::create($request->validated());

        return redirect()->route('locations.index')
            ->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $location = Location::find($id);

        return view('location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $location = Location::find($id);

        return view('location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, Location $location)
    {
        $location->update($request->validated());

        return redirect()->route('locations.index')
            ->with('success', 'Location updated successfully');
    }

    public function destroy($id)
    {
        Location::find($id)->delete();

        return redirect()->route('locations.index')
            ->with('success', 'Location deleted successfully');
    }
}
