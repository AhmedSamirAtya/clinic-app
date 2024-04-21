<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Http\Requests\AssistantRequest;

/**
 * Class AssistantController
 * @package App\Http\Controllers
 */
class AssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assistants = Assistant::paginate();

        return view('assistant.index', compact('assistants'))
            ->with('i', (request()->input('page', 1) - 1) * $assistants->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assistant = new Assistant();
        return view('assistant.create', compact('assistant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssistantRequest $request)
    {
        Assistant::create($request->validated());

        return redirect()->route('assistants.index')
            ->with('success', 'Assistant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $assistant = Assistant::find($id);

        return view('assistant.show', compact('assistant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $assistant = Assistant::find($id);

        return view('assistant.edit', compact('assistant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssistantRequest $request, Assistant $assistant)
    {
        $assistant->update($request->validated());

        return redirect()->route('assistants.index')
            ->with('success', 'Assistant updated successfully');
    }

    public function destroy($id)
    {
        Assistant::find($id)->delete();

        return redirect()->route('assistants.index')
            ->with('success', 'Assistant deleted successfully');
    }
}
