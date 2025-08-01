@php
    $doctors = \App\Models\Doctor::all();
    $patients = \App\Models\Patient::all();
    $appointmentTypes = \App\Constants\TypesOfAppointment::ALL_TYPES;
    // Assume $appointment and $clinic are also defined here for the form to work
@endphp

@section('styles')
    {{-- Flatpickr CSS for the calendar and time picker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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

        {{-- Display area for the doctor's schedule --}}
        <div id="doctor-schedule-info" class="mt-3">
            {{-- Schedule information will be dynamically inserted here --}}
        </div>

        {{-- Hidden input for clinic_id as before --}}
        @if(isset($clinic))
            <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">
        @endif

        <div class="form-group">
            <label for="appointment_date" class="form-label">{{ __('Appointment Date') }}</label>
            <input type="text" id="appointment_date" name="appointment_date" class="form-control" placeholder="Select Date"
                   value="{{ old('appointment_date', $appointment->appointment_date ?? '') }}">
            {!! $errors->first('appointment_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="appointment_time" class="form-label">{{ __('Appointment Time') }}</label>
            <input type="text" id="appointment_time" name="appointment_time" class="form-control" placeholder="Select Time"
                   value="{{ old('appointment_time', $appointment->appointment_time ?? '') }}">
            {!! $errors->first('appointment_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const doctorSelect = document.getElementById('doctor_id');
            const scheduleInfoContainer = document.getElementById('doctor-schedule-info');
            const appointmentDateInput = document.getElementById('appointment_date');
            const appointmentTimeInput = document.getElementById('appointment_time');

            let datePickerInstance;
            let timePickerInstance;

            doctorSelect.addEventListener('change', function() {
                const doctorId = this.value;
                if (doctorId) {
                    fetchSchedule(doctorId);
                } else {
                    scheduleInfoContainer.innerHTML = '';
                    destroyPickers();
                }
            });

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
                            initializePickers(data.schedule);
                        } else {
                            scheduleInfoContainer.innerHTML = '<p class="text-danger">No schedule found for this doctor.</p>';
                            destroyPickers();
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching doctor schedule:', error);
                        scheduleInfoContainer.innerHTML = '<p class="text-danger">An error occurred while fetching the doctor\'s schedule.</p>';
                        destroyPickers();
                    });
            }

            function displaySchedule(schedule) {
                const { working_days, start_time, end_time } = schedule;
                const daysString = working_days.join(', ');
                const html = `
                    <p><strong>Working Days:</strong> ${daysString}</p>
                    <p><strong>Working Hours:</strong> From ${start_time} to ${end_time}</p>
                `;
                scheduleInfoContainer.innerHTML = html;
            }

            function initializePickers(schedule) {
                const { working_days, start_time, end_time } = schedule;

                // Map your string days to Flatpickr's numeric days (0 = Sunday, 1 = Monday, etc.)
                const daysMap = {
                    'الاحد': 0, 'الاثتنين': 1, 'الثلاثاء': 2, 'الاربعاء': 3,
                    'الخميس': 4, 'الجمعه': 5, 'السبت': 6
                };
                const enableDays = working_days.map(day => daysMap[day]);

                // Destroy old instances to prevent memory leaks and conflicts
                destroyPickers();

                // Initialize the Date Picker
                datePickerInstance = flatpickr(appointmentDateInput, {
                    dateFormat: "Y-m-d",
                    enable: [{
                        from: "today",
                        to: null
                    }],
                    disable: [
                        function(date) {
                            // disable all days not in the working_days array
                            return !enableDays.includes(date.getDay());
                        }
                    ]
                });

                // Initialize the Time Picker
                timePickerInstance = flatpickr(appointmentTimeInput, {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                    minTime: start_time,
                    maxTime: end_time
                });
            }

            function destroyPickers() {
                if (datePickerInstance) {
                    datePickerInstance.destroy();
                    datePickerInstance = null;
                }
                if (timePickerInstance) {
                    timePickerInstance.destroy();
                    timePickerInstance = null;
                }
            }
        });
    </script>
@endsection
