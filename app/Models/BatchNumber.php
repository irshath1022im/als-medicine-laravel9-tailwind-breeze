<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchNumber extends Model
{
    use HasFactory;

    protected $fillable = ['item_id', 'batch_number', 'expiry_date', 'initial_qty', 'status'];


    // public function getExpiryDateAttribute($value)
    // {
    //     $now = Carbon::now();
    //     $dt = Carbon::createFromDate($value);

    //     // return Carbon::now()->diffForHumans(Carbon::now()->subYear());

    //     return Carbon::parse($dt)->diffForHumans($now);

    //     //  return $now->diffForHumans($dt);
    //     // return $value->diffForHumans();

    //     return $now->diffForHumans($dt->copy()->subMonth()); // 1 day from now


    // }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function receiving_items()
    {
        return $this->hasMany(ReceivingItem::class);
    }

    public function consumptions()
    {
        return $this->hasMany(Consumption::class);
    }



}
