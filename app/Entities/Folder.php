<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use CodeIgniter\I18n\Time;

class Folder extends Entity
{
    protected $id;
    protected $contractor;
    protected $recipient;
    protected $name;
    protected $status;
    protected $created_at;
    protected $created_by;
    protected $updated_at;
    protected $updated_by;

    protected $attributes = [
        'status' => 'incomplet',
    ];

    protected $datamap = [];
    
    // Les dates 'created_at' et 'updated_at' auront la date et l'heure courantes par défaut
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'created_at' => 'TIMESTAMP',
        'updated_at' => 'TIMESTAMP',
    ];

    public function __construct(array $data = null)
    {
        parent::__construct($data);

        // Si 'created_at' n'est pas défini, utilisez la date et l'heure actuelles
        if (empty($this->attributes['created_at'])) {
            $time = Time::now('Africa/Brazzaville');
            $this->attributes['created_at'] = $time->toDateTimeString();
        }

        // Si 'updated_at' n'est pas défini, utilisez la date et l'heure actuelles
        if (empty($this->attributes['updated_at'])) {
             $time = Time::now('Africa/Brazzaville');
            $this->attributes['updated_at'] = $time->toDateTimeString();
        }
    }
}

