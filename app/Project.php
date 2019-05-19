<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'rate_type',
        'rate_amount',
    ];

    /**
     * Get the user that owns the project
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
