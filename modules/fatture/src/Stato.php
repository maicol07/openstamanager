<?php

namespace Modules\Fatture;

use Base\Model;

class Stato extends Model
{
    protected $table = 'co_statidocumento';

    public function fatture()
    {
        return $this->hasMany(Fattura::class, 'idstatodocumento');
    }
}
