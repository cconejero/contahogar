<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class CardSpend extends Model
{
    use HasFactory;
    protected $with = ['currency', 'card', 'tag'];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
