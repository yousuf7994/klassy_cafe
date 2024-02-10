<?php

namespace App\Models;

use App\Models\Cake_Pastry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function cake_Pastry(){
        return $this->belongsTo(Cake_Pastry::class);
    }
}
