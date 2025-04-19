<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavItem extends Model
{
    protected $fillable = [
        'label',
        'url',
        'visible',
        'order',
    ];
}
