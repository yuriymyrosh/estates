<?php

namespace App\Models\Estate;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Photo
 * @package App\Models\Estate
 *
 * @property integer $id
 * @property integer $estate_id
 * @property string $publicPath
 * @property string $path
 */
class Photo extends Model
{
    /**
     * @var string
     */
    protected $table = 'estates_photos';

    /**
     * @var array
     */
    protected $fillable = [
        'estate_id',
        'path',
    ];

    /**
     * @return mixed
     */
    public function getPublicPathAttribute()
    {
        return Storage::url($this->attributes['path']);
    }

    public function delete()
    {
        Storage::delete($this->attributes['path']);

        return parent::delete();
    }
}
