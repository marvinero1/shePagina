<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $auditTimestamps = true;
    protected $auditStrict = true;
    protected $auditThreshold = 100;

    protected $auditEvents = [
        'created',
        'saved',
        'deleted',
        'restored',
        'updated'
    ];
    
    protected $fillable = [ 'titulo',
                            'descripcion',
                            'sec_1',
                            'sec_2',
                            'sec_3',
                            'descripcion_sec_1',
                            'descripcion_sec_2',
                            'descripcion_sec_3',
                            'imagen_portada',
                            'imagen_seccion',
                            ]; 
}