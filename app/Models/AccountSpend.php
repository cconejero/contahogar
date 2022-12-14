<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSpend extends Model
{
    use HasFactory;

    protected $with = ['tag'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
