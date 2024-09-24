<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 */
class Setting extends Model
{
    protected $table = 'settings';

    public $timestamps = true;

    protected $fillable = [
        'key',
        'name',
        'description',
        'value',
        'type',
    ];

    protected $guarded = [];

        
}