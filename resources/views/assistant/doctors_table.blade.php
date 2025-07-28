@extends('layouts.assistant.master')

@section('template_title')
    {{  ' ' . __('clinicDoctors') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="container">
            <h1>Clinic Doctors Grouped by Doctor</h1>

            @if ($clinicDoctorsGrouped->isEmpty())
                <p>No clinic-doctor associations found for this clinic.</p>
            @else
                @foreach ($clinicDoctorsGrouped as $doctorId => $clinicDoctorAssociations)
                    <div class="card mb-4">
                        <div class="card-header">
                            {{-- Display Doctor's Name --}}
                            {{-- Option 1: If you eager loaded 'doctor' relationship in the model --}}
                            @if ($clinicDoctorAssociations->first()->doctor)
                                <h2>{{ $clinicDoctorAssociations->first()->doctor->name }}</h2>
                            @else
                                {{-- Option 2: If you don't have the relationship or want to fetch name separately --}}
                                @php
                                    // This is less efficient if done in a loop, prefer eager loading
                                    $doctor = \App\Models\Doctor::find($doctorId);
                                @endphp
                                <h2>{{ $doctor ? $doctor->name : 'Unknown Doctor (ID: ' . $doctorId . ')' }}</h2>
                            @endif
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($clinicDoctorAssociations as $association)
                                    <li class="list-group-item">
                                        {{-- Assuming you have a 'clinic' relationship in ClinicDoctor model --}}
                                        @if ($association->clinic)
                                            {{ $association->clinic->name }} <br>
                                        @else
                                            <strong>Clinic ID:</strong> {{ $association->clinic_id }} <br>
                                        @endif

                                        {{-- If Clinic model has address --}}
                                        {{ $association->start_time?->format('H:i') }} -
                                        {{ $association->end_time?->format('H:i') }} <br>
                                        {{ implode(', ', $association->working_days ?? []) }}
                                        <br>
                                        ${{ number_format($association->appointment_price, 2) }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
