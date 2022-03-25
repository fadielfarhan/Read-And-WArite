<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    public function detail()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }

    public function total()
    {
        return $this->detail->sum(function ($d) {
            return $d->quantity * $d->product->price;
        });
    }
}
