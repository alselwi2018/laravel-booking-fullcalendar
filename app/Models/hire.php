<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hire extends Model
{
    use HasFactory;
    protected $fillable = [
        'start','end','title','driver_id',
        'vehicle_id','vehicle'
    ];
}
