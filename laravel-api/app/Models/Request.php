<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Request extends Authenticatable
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'uuid',
        'category_id',
        'quality_id',
        'link',
        'message',
        'user_id',
        'status_id',
    ];
}
