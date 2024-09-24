<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
   protected $table = 'charts';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'title',
        'user_id',
        'type_id',
        'thumbnail',
        'display_slide',
        'display_collect',
    ];

    protected $guarded = [];
     /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }  
    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id', 'id');
    }  
}
