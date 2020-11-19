<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resumen extends Model{

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
                            'video_url']; 
}