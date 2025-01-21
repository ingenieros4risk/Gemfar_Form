<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiRequestOld extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'sanofi_request_olds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod_homologacion',
        'nombre',
        'tipo_documento',
        'identificacion',
        'tipo_homologacion',
        'fecha_diligenciamiento',
        'pais',
        'departamento',
        'ciudad',
        'direccion',
        'correo',
        'especialidad',
        'especialidad_otra',
        'funcionario',
        'grado_academico',
        'posicion_academico',
        'miembro_cientifico',
        'miembro_colciencias',
        'experiencia_investigador',
        'publicaciones',
        'tiene_libros',
        'conferencista',
        'posters',
        'premios',
        'grados_academico',
        'experiencia_clinica',
        'experiencia_conferencia',
        'asociado_hospital',
        'articulos',
        'libros',
        'profesor_principal',
        'ponencia_regional',
        'ponencia_internacional',
        'presidencia_sociedad',
        'miembro_internacional',
        'presidencia_nacional',
        'premios_internacionales',
        'especialista',
        'influencia',
        'score',
        'codigo_colegiatura',
        'banco_beneficiario',
        'ciudad_banco_beneficiario',
        'país_banco_beneficiario',
        'cuenta_beneficiario',
        'tipo_cuenta',
        'moneda',
        'iban',
        'swift',
        'cuenta_interbancaria',
        'banco_intermediario',
        'cuenta_intermediario',
        'ciudad_intermediario',
        'pais_intermediario',
        'aba_intermediario',
        'tipo_cuenta_intermediario',
        'gestiones_hcp',
        'nombre_representante_legal',
        'tipo_documento_representante_legal',
        'documento_representante_legal',
        'cargo_representante_legal',
        'telefono_representante_legal',
        'Celular_representante_legal',
        'email_representante_legal',
        'fax_representante_legal',
        'persona_contacto',
        'taxonomia_documentos',
        'fecha_homologacion',
        'url_doc_proveedor',
        'url_doc_homologacion'
    ];
}
