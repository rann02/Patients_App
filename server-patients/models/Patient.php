<?php

namespace MyApp\Models;

use Phalcon\Mvc\Model;

class Patient extends Model
{
    public function initialize()
    {
        $this->setSource('Patient');
    }
 }
