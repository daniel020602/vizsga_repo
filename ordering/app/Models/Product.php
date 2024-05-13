<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name','desc','price'];

    public function Order()
    {
        return $this->HasMany(Order::class);
    }

}
