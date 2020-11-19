<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paso extends Model
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
                            'imagen',
                            'texto1',
                            'texto2',
                            'texto3',
                            ]; 
}
