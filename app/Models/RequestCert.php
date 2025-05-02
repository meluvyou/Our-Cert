<?php


namespace App\Models;
class RequestCert extends BaseModel
{
    protected $table = 'request_cert';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
    ];
    public $timestamps = true;
}