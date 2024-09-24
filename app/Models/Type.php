<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table = 'types';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'key',
        'name_en',
        'name_vi',
        'thumbnail', 
        'parent_id'
    ];

    protected $guarded = [];
    
    public function chart()
    {
        return $this->hasMany('App\Models\Chart', 'type_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Type', 'parent_id', 'id');
    }
    public function children()
    {
        return $this->hasMany('App\Models\Type', 'parent_id', 'id');
    }
      protected static function boot()
    {
        parent::boot();
        static::deleting(function($user) {
            foreach(['chart' => 'delete'] as $relation => $action)
            {
                if($action == 'delete')
                {
                    foreach($user->{$relation} as $item)
                    {
                        $item->{$action}();
                    }
                }
                else if($action == 'detach')
                {
                    $user->{$relation}()->{$action}();
                }
            }
          
        });
    }

}
