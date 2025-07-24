<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\Auth\PatientLoginRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Patient\Auth\PatientRegisterationRequest;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class PatientAuthController extends Controller
{
    public function register(PatientRegisterationRequest $request): JsonResponse
    {
        try {
            $patient = Patient::create([
                'name' => $request->name,
                'job' => $request->job,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Attempt to authenticate the newly created patient
            if (Auth::guard('patient')->attempt($request->only('email', 'password'))) {
                // Authentication successful
                return response()->json([
                    'message' => 'Patient registered successfully',
                    'data' => $patient,
                    'status' => true,
                    'code' => 201, // HTTP Created
                ], 201);
            } else {
                // Authentication failed (should not happen if creation was successful)
                $patient->delete(); // Remove the partially created patient
                return response()->json([
                    'message' => 'Registration failed',
                    'data' => null,
                    'status' => false,
                    'code' => 500,
                ], 500);
            }

        } catch (\Exception $e) {
            // Handle exceptions (e.g., database errors, validation issues)
            return response()->json([
                'message' => 'An error occurred during registration',
                'data' => null,
                'status' => false,
                'code' => 500,
            ], 500);
        }
    }

    public function login(PatientLoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $token=null;
        if (Auth::guard('patient')->attempt($credentials)) {
            $patient = Auth::guard('patient')->user();
            $token = $patient->createToken('authToken')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'data' => [
                    'user' => $patient,
                    'token' => $token,
                ],
                'status' => true,
                'code' => 200,
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials',
                'data' => null,
                'status' => false,
                'code' => 401, // Unauthorized
            ], 401);
        }
    }
}
