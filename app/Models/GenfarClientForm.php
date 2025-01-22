<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenfarClientForm extends Model
{
    use HasFactory;

    protected $table = 'genfar_client_forms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'client_id', 'password','qc1','qc2','qc3','qc4','qc5','qc6','qc7',
        'qc8','qc9','qc10','qc11','qc12','qc13','qc14','qc15','qc16','qc17','qc18',
        'qc19','qc20','qc21','qc22','qc23','qc24','qc25','qc26','qc27','qc28','qc29',
        'qc30','qc31','qc32','qc33','qc34','qc35','qc36','qc37','qc38','qc39','qc40',
        'qc41','qc42','qc43','qc44','qc45','qc46','qc47','qc48','qc49','qc50','qc51',
        'qc52','qc53','qc54','qc55','qc56','qc57','qc58','qc59','qc60','qc61','qc62',
        'qc63','qc64','qc65','qc66','qc67','qc68','qc69','qc70','qc71','qc72','qc73',
        'qc74','qc75','qc76','qc77','qc78','qc79','qc80','qc81','qc82','qc83','qc84',
        'qc85','qc86','qc87','qc88','qc89','qc90','qc91','qc92','qc93','qc94','qc95',
        'qc96','qc97','qc98','qc99','qc100','qc101','qc102','qc103','qc104','qc105',
        'qc106','qc107','multiple_select_country','country_homologation'
    ];
}
