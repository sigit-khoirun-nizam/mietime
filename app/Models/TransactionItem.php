<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'menus_id',
        'transactions_id'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menus_id');
    }
}
