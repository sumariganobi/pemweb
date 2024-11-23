<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GudangLocation extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name',
        'description',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'location_id');
    }

    public function incomingTransactions()
    {
        return $this->hasMany(IncomingTransaction::class);
    }

    public function outgoingTransactions()
    {
        return $this->hasMany(OutgoingTransaction::class);
    }
}
