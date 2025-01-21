<?php

namespace App\Models\Inspektor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspektorDocumentType extends Model
{
    use HasFactory;

    protected $table = 'inspektor_document_types';
    
    protected $fillable = [
        'name', 'cat'
    ];
}
