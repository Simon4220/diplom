<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getStatus($status)
    {
        switch ($status) {
            case '1':
                return 'В обработке';
                break;
            case '2':
                return 'Доставляется';
                break;
            case '3':
                return 'Доставлен';
                break;
        }
    }

    public static function getNumber()
    {
        if($lastOrder = Order::orderBy('created_at', 'desc')->first()) {
            $lastId = $lastOrder->id;
            $number = '№'.str_pad($lastId + 1, 8, '0', STR_PAD_LEFT);
        } else {
            $number = '№'.str_pad(1, 8, '0', STR_PAD_LEFT);
        }
        return $number;
    }
}
