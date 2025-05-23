<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminCertRequest extends Model
{
    protected $table = "admin_cert_request";
    protected $primaryKey = "id";   
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'request_type',
        'request_purpose',
        'status',
        'action',
    ];
}
