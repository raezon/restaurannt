<?php

namespace App\Repositories;

use App\Interfaces\Repositories\SettingsRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsRepository implements SettingsRepositoryInterface 
{

  
    public function getOne()
    {
        return Settings::find(1);
    }
  
    public function create(array $data,$pictureName)
    {
        //need to be put on service later
        $option=[];
        $option['image'][]['image'] = $pictureName;
        $option['image'][]['width']=$data['logo_width'];
        $option['image'][]['height']= $data['logo_height'];
        $data['options']=json_encode($option,true);
        
        return Settings::create($data);
    }
  
    public function update($id, array $data)
    {
        Settings::where('id', $id)->update($data);
    }
  

}
