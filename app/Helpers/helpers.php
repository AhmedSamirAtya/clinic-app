<?php

use App\Models\ClinicUser;
use App\Models\User;

if (!function_exists('isClinicHasAdmin')) {
    function isClinicHasAdmin($clinicId)
    {
        $clinicUsers = ClinicUser::where('clinic_id', $clinicId)->pluck('user_id');
        if (count(User::where('role_id', 2)->whereIn('id', $clinicUsers)->pluck('id')) > 0) {
            return true;
        }
        return false;
    }
}
