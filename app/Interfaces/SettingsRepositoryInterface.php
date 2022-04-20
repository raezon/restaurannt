<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SettingsRepositoryRepositoryInterface
{

    public function updateSetting($settingId, array $setting);
}
