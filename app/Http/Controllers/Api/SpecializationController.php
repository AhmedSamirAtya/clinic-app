<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialization\StoreSpecializationRequest;
use App\Http\Requests\Specialization\UpdateSpecializationRequest;
use App\Models\Specialization;
use App\Http\Requests\SpecializationRequest;
use Illuminate\Http\JsonResponse;

/**
 * Class SpecializationController
 * @package App\Http\Controllers
 */
class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $specializations = Specialization::with(['doctors'])->paginate();

        return response()->json([
            'data' => $specializations->items(),
            'meta' => [
                'current_page' => $specializations->currentPage(),
                'last_page' => $specializations->lastPage(),
                'per_page' => $specializations->perPage(),
                'total' => $specializations->total(),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecializationRequest $request): JsonResponse
    {
        try {
            $specialization = Specialization::create($request->validated());

            return response()->json([
                'message' => 'Specialization created successfully.',
                'data' => $specialization,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create specialization.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialization $specialization): JsonResponse
    {
        return response()->json($specialization);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecializationRequest $request, Specialization $specialization): JsonResponse
    {
        try {
            $specialization->update($request->validated());

            return response()->json([
                'message' => 'Specialization updated successfully.',
                'data' => $specialization,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update specialization.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialization $specialization): JsonResponse
    {
        try {
            $specialization->delete();

            return response()->json([
                'message' => 'Specialization deleted successfully.',
            ], 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete specialization.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
