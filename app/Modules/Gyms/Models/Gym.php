<?php

namespace App\Modules\Gyms\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Gym
 * @package App\Modules\Gyms\Models
 */
class Gym extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['name','legal_name','register','responsable'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function infos()
    {
        return $this->hasOne(GymInfos::class,'gyms_id');
    }

}