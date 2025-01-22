<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeSale extends Model
{
    use HasFactory;

    protected $table ='type_sales';

    protected $fillable = [
        'name'
    ];
}
