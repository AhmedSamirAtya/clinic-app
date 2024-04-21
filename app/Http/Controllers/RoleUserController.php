<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Http\Requests\RoleUserRequest;

/**
 * Class RoleUserController
 * @package App\Http\Controllers
 */
class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roleUsers = RoleUser::paginate();

        return view('role-user.index', compact('roleUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $roleUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roleUser = new RoleUser();
        return view('role-user.create', compact('roleUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleUserRequest $request)
    {
        RoleUser::create($request->validated());

        return redirect()->route('role-users.index')
            ->with('success', 'RoleUser created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $roleUser = RoleUser::find($id);

        return view('role-user.show', compact('roleUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roleUser = RoleUser::find($id);

        return view('role-user.edit', compact('roleUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUserRequest $request, RoleUser $roleUser)
    {
        $roleUser->update($request->validated());

        return redirect()->route('role-users.index')
            ->with('success', 'RoleUser updated successfully');
    }

    public function destroy($id)
    {
        RoleUser::find($id)->delete();

        return redirect()->route('role-users.index')
            ->with('success', 'RoleUser deleted successfully');
    }
}
