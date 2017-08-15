<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'book', 'bookid', 'ownerid', 'requesterid', 'approved', 'active'
    ];
}
