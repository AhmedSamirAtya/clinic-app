@php
    $patients = \App\Models\Patient::all();
    $appointmentTypes = \App\Constants\TypesOfAppointment::ALL_TYPES;
    // Assume $appointment and $clinic are also defined here for the form to work
@endphp

@section('styles')
    {{-- Flatpickr CSS for the calendar and time picker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        /* Custom CSS to fix potential display issues with Flatpickr */
        .flatpickr-calendar {
            box-sizing: border-box;
            display: block;
            direction: rtl; /* Ensure right-to-left layout for Arabic */
        }

        .flatpickr-months {
            display: flex;
            justify-content: space-between;
        }

        .flatpickr-weekdaycontainer,
        .dayContainer {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            text-align: center;
        }

        .flatpickr-day {
            box-sizing: border-box;
            display: inline-block;
            width: 100%;
        }

        .flatpickr-day.selected,
        .flatpickr-day.startRange,
        .flatpickr-day.endRange {
            background: #1abc9c;
            border-color: #1abc9c;
            color: #fff;
        }

        /* Adjust input field to show correct direction and text alignment */
        .flatpickr-input {
            text-align: right;
            direction: rtl;
        }
    </style>
@endsection

<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group">
            <label for="patient_id" class="form-label">{{ __('Patient') }}</label>
            <select class="form-control" title="Patient" id="patient_id" name="patient_id">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" @if (isset($appointment) && $patient->id == $appointment->patient_id) selected @endif>
                        {{ $patient->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('patient_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="doctor_id" class="form-label">{{ __('Doctor') }}</label>
            <select class="form-control" title="Doctor" id="doctor_id" name="doctor_id">
                <option value="">{{ __('Select a Doctor') }}</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" @if (isset($appointment) && $doctor->id == $appointment->doctor_id) selected @endif>
                        {{ $doctor->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('doctor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        @if(isset($clinic))
        {{$clinic->id}}
            <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">
        @endif

         <div class="form-group mb-2 mb20">
            <label for="date" class="form-label">{{ __('Date') }}</label>
            <input type="date" name="date"
                class="form-control @error('date') is-invalid @enderror"
                value="{{ old('date',  $appointment?->date?->format('Y-m-d')) }}"
                id="date" placeholder="Date">
            {!! $errors->first(
                'date',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div id="doctor-schedule-info"></div>
        <div class="form-group mb-2 mb20 mt-4">
            <div class="form-group">
                <label for="type" class="form-label">{{ __('Type') }}</label>
                <select class="form-control" title="Type" id="type" name="type">
                    @foreach ($appointmentTypes as $type)
                        <option value="{{ $type }}" @if (isset($appointment) && $type == $appointment->type) selected @endif>
                            {{ $type }}</option>
                    @endforeach
                </select>
                {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="form-group mb-2 mb20">
            <label for="reason" class="form-label">{{ __('Reason') }}</label>
            <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror"
                value="{{ old('reason', $appointment->reason ?? '') }}" id="reason" placeholder="reason">
            {!! $errors->first('reason', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="col-md-12 mt20 mt-2">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
</div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const doctorSelect = document.getElementById('doctor_id');
        const scheduleInfoContainer = document.getElementById('doctor-schedule-info');

        // Listen for changes on the doctor selection dropdown
        doctorSelect.addEventListener('change', function() {
            const doctorId = this.value;
            if (doctorId) {
                fetchSchedule(doctorId);
            } else {
                scheduleInfoContainer.innerHTML = '';
            }
        });

        // Function to fetch the doctor's schedule from the server
        function fetchSchedule(doctorId) {
            const url = `/assistants/appointments/get-doctor-schedule/${doctorId}`;
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.schedule) {
                        displaySchedule(data.schedule);
                    } else {
                        scheduleInfoContainer.innerHTML = '<p class="text-danger">No schedule found for this doctor.</p>';
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    scheduleInfoContainer.innerHTML = '<p class="text-danger">An error occurred while fetching the doctor\'s schedule.</p>';
                });
        }

        // Function to display the fetched schedule with formatted times
        function displaySchedule(schedule) {
            const { working_days, start_time, end_time } = schedule;

            // Extract the time part (e.g., "14:00") from the ISO 8601 strings
            const formattedStartTime = start_time.split('T')[1].substring(0, 5);
            const formattedEndTime = end_time.split('T')[1].substring(0, 5);

            // Assuming working_days is a comma-separated string or an array.
            const daysString = Array.isArray(working_days) ? working_days.join(', ') : working_days;
            const html = `
                <p><strong>Working Days:</strong> ${daysString} - - <strong>Working Hours:</strong> From ${formattedStartTime} to ${formattedEndTime}</p>
            `;
            scheduleInfoContainer.innerHTML = html;
        }

        // Initial check for a selected doctor on page load
        if (doctorSelect.value) {
            fetchSchedule(doctorSelect.value);
        }
    });
</script>
@endsection
