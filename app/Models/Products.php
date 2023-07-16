<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\User;


class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'price', 'live',
    ];


    // Relate back to a user

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    // When ever price is set on the model take it and convert it into int
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn (float $price) => money($price / 100),
            set: fn (float $price) => $price * 100,
        )
            ->withoutObjectCaching();
    }

    public function applicationFeeAmount()
    {
        return $this->price->multiply(10)->divide(100);
    }
}
