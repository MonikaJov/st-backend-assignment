<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Invoice extends Model
{
    protected $fillable = ['invoice_number', 'client_id', 'surname', 'address', 'country'];
    public function items()
    {
        return $this->belongsToMany(
            Item::class,
            'invoices_items',
            'invoice_id',
            'item_id');
    }
}
