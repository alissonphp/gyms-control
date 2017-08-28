<?php

namespace App\Modules\Gyms\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GymInfos
 * @package App\Modules\Gyms\Models
 */
class GymInfos extends Model
{
    /**
     * @var string
     */
    protected $table = 'gym_infos';
    /**
     * @var array
     */
    protected $fillable = ['gyms_id','address','number','complement','zipcode','state','city','email','telephone','telephone2','website','logo','lati','long'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gym()
    {
        return $this->belongsTo(Gym::class,'gyms_id');
    }

}