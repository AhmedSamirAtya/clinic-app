<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}">
            <img src="{{ URL::asset('assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/logo-dark.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround"
                        src="{{ URL::asset('assets/img/faces/6.jpg') }}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()?->email }}</h4>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ url('/' . ($page = 'doctor-dashboard')) }}">
                    <a class="side-menu__item" href="{{ url('/' . ($page = '')) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3" />
                            <path
                                d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z" />
                        </svg><span class="side-menu__label">Home</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('users.index') }}"><span
                        class="side-menu__label">Users</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('doctors.index') }}"><span
                        class="side-menu__label">Doctors</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('assistants.index') }}"><span
                        class="side-menu__label">Assistants</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('clinics.index') }}"><span
                        class="side-menu__label">Clinics</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('clinic-doctors.index') }}"><span
                        class="side-menu__label">ClinicDoctors</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('locations.index') }}"><span
                        class="side-menu__label">Locations</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('patients.index') }}"><span
                        class="side-menu__label">Patients</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('appointments.index') }}"><span
                        class="side-menu__label">Appointments</span><span
                        class="badge badge-success side-badge">{{ \App\Models\Appointment::count() }}</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('patient-histories.index') }}"><span
                        class="side-menu__label">Patient-History</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('medicines.index') }}"><span
                        class="side-menu__label">Medicines</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('prescriptions.index') }}"><span
                        class="side-menu__label">Prescriptions</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('specializations.index') }}"><span
                        class="side-menu__label">Specializations</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('specializations-doctors.index') }}"><span
                        class="side-menu__label">Specializations Doctor</span></a>
            </li>
        </ul>
    </div>
</aside>
