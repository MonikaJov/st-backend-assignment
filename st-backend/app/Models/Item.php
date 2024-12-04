<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;

class Item extends Model
{
    protected $fillable = ['name', 'quantity', 'amount'];

    public function invoices()
    {
        return $this->belongsToMany(
            Invoice::class,
            'invoices_items',
            'item_id',
            'invoice_id');
    }
}
