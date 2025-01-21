<?php

namespace App\Models\Sanofi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanofiRequestForm extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'sanofi_request_forms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ethics', 'hys', 'csr', 'csi', 'csy', 'env', 'dda', 'name', 'document', 'date_homologation','status','users_id','codsolicitud', 'sanofi_provider', 'multiple_select_country', 'is_pep',
        'country_homologation', 'date_fill', 'is_pep_checks' ,'is_decision_check','certificado_existencia', 'rut', 'cedula_rep',
        'licencia_medica', 'curriculum_vitae', 'certificado_bancaria', 'certificado_oea', 'certificado_laft', 'certificado_iso',
        'certificado_politicas', 'certificado_financiero', 'certificado_comercial','quest_1', 'quest_3', 'quest_4', 'quest_5', 'quest_6',
        'quest_8', 'quest_9', 'quest_10', 'quest_11', 'quest_12', 'quest_14', 'quest_15', 'quest_16', 'quest_17', 'quest_18', 'quest_19',
        'quest_21', 'quest_22','quest_24', 'quest_25','quest_26', 'quest_27', 'quest_28', 'quest_29', 'quest_30', 'quest_31', 'quest_32',
        'quest_35', 'quest_46', 'quest_47', 'quest_38', 'quest_39', 'quest_64', 'quest_65', 'quest_66', 'quest_67', 'quest_68', 'quest_69',
        'quest_59', 'quest_60', 'quest_61', 'quest_40', 'quest_41', 'quest_42', 'quest_43', 'quest_44', 'quest_45', 'quest_49', 'quest_50',
        'quest_51', 'quest_52', 'quest_53', 'quest_54', 'quest_55', 'quest_56', 'quest_57', 'quest_58', 'quest_62', 'quest_63', 'quest_64',
        'quest_92', 'quest_93', 'quest_94', 'quest_95', 'quest_96', 'quest_97', 'quest_98', 'quest_99', 'quest_100', 'quest_101',
        'quest_102', 'quest_103', 'quest_104', 'quest_105', 'quest_hcp_1', 'quest_hcp_2', 'quest_hcp_3', 'quest_hcp_4', 'quest_hcp_5',
        'quest_hcp_6', 'quest_hcp_7', 'quest_hcp_8', 'quest_hcp_9', 'quest_hcp_10', 'quest_hcp_11', 'quest_hcp_12', 'quest_hcp_13',
        'quests_1', 'quests_2', 'quests_3', 'quests_4', 'quests_5', 'quests_6', 'quests_7', 'quests_8', 'alert_dda','coincidencia_laft', 'antecedentes_disciplinarios', 'antecedentes_penales',
        'antecedentes_fiscales', 'coincidencia_pep', 'coincidencia_listas', 'coincidencia_fuentes', 'created_at', 'score', 'password', 'sanofi_request_risk_id','quest_72F', 'quest_72', 'ebi_comentario','ebi_plan','ebi_recomendacion',
        'sarlaft_comentario' , 'hys_comentario', 'csr_comentario', 'env_comentario', 'csy_comentario', 'ethics_date', 'sarlaft_date', 'hys_date',
        'csr_date', 'env_date', 'csy_date','certificaciones_seguridad', 'file_basc', 'date_basc', 'file_iso28000', 'date_iso28000',
        'file_neec', 'date_neec', 'file_ctpat', 'date_ctpat', 'file_bcp', 'certificaciones_hse', 'file_iso14001', 'date_iso14001', 'file_iso45001',
        'date_iso45001', 'file_ruc', 'date_ruc', 'file_iso26000', 'date_iso26000', 'file_sa8000', 'date_sa8000', 'file_smeta', 'date_smeta', 'file_psci',
        'date_psci', 'file_ecovadis', 'date_ecovadis', 'csi_1', 'csi_2', 'csi_3', 'csi_4', 'csi_5', 'csi_6', 'csi_7', 'csi_8','csi_9','csi_10',
        'hse_date', 'hse_otros','sarlaft_observation'
    ];


}
