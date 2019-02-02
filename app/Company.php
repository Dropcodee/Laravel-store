<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Company extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'location', 'country', 'email', 'emailTwo','phone','phoneTwo','photo'
    ];
}
