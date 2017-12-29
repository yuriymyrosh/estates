<?php

namespace App\Models;

use App\Models\Estate\Photo;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estate
 * @package App\Models
 *
 * @property integer $id
 * @property string $address
 * @property integer $region_id
 * @property integer $room_option_id
 * @property string $description
 * @property integer $price
 * @property string $phone
 *
 * @property RoomOption $roomOption
 * @property Photo[] $photos
 * @property Region $region
 */
class Estate extends Model
{
    protected $fillable = [
        'address',
        'region_id',
        'room_option_id',
        'description',
        'price',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
