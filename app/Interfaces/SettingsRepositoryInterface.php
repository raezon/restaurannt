<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SettingsRepositoryInterface
{

    public function update($settingId, array $setting);
}
