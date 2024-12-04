<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Client extends Model
{
    protected $fillable = ['name', 'surname', 'address', 'country'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'client_id');
    }
}
