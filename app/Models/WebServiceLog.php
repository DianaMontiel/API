<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebServiceLog extends Model
{
    protected $fillable = [
        'request_xml',
        'response_xml',
        'tipo'
    ];
}