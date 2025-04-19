<?php

use App\Models\Setting;

if (!function_exists('getSetting')) {
    function getSetting($key, $default = null)
    {
        return Setting::first()?->$key ?? $default;
    }
}
