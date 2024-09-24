<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'content',
        'reply',
        'email',
        'status',
        'id_user',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [];
     /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    } 
}
