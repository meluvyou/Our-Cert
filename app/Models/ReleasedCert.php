<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReleasedCert extends Model
{
    protected $table = "released_certs";
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'email',
        'request_type',
        'date_claim',
        'status'
    ];
    public $timestamps = true;

}
