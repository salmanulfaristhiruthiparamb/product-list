<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'upload_speed', 'download_speed', 'technology', 'static_ip'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * define technology stack
     * @var array
     */
    protected $technologyArray = [
        1 => 'fiber',
        2 => 'dialup'
    ];

    /**
     * create new accessor for Technology
     * 1 => Fiber
     * 2 => Dialup
     */
    public function getTechnologyAttribute($value)
    {
        return $this->technologyArray[$value];
    }

    /**
     * Create new accessor for Static IP
     * It return static ip yes for true else no
     */
    public function getTypeAttribute()
    {
        return $this->static_ip?"Yes":"No";
    }
}
