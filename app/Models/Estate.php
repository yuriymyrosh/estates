<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estate
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $region_id
 * @property integer $room_option_id
 * @property string $description
 * @property string $phone
 *
 * @property RoomOption $roomOption
 * @property Region $region
 */
class Estate extends Model
{
    protected $fillable = [
        'name',
        'address',
        'region_id',
        'room_option_id',
        'description',
        'phone',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roomOption()
    {
        return $this->belongsTo(RoomOption::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
