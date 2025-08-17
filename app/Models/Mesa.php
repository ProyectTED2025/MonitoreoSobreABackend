<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesas';

    protected $fillable = [
        'id_mesa_geografia',
        'id_proceso_electoral',
        'codigo_mesa',
        'num_mesa',
        'numero_mesa',
        'id_pais',
        'nom_pais',
        'dep',
        'nom_dep',
        'prov',
        'nom_prov',
        'circun',
        'nom_circun',
        'sec',
        'nom_mun',
        'id_loc',
        'nom_loc',
        'dist',
        'nom_dist',
        'zona',
        'nom_zona',
        'reci',
        'nom_reci',
        'ci_not_e',
        'nom_not_e',
        'inscritos_habilitados',
        'listado_indice',
        'copias_actas',
        'observaciones',
        'id_user',
    ];
}
