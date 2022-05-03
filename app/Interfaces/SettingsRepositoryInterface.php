<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SettingsRepositoryInterface
{
    public function getOne();
    public function create(array $setting);
    public function update($settingId, array $setting);
}
