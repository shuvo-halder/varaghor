<?php

namespace Modules\GeneralSetting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \Modules\GeneralSetting\Database\factories\SettingFactory::new();
    }
}
