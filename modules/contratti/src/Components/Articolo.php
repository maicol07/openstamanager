<?php
/*
 * OpenSTAManager: il software gestionale open source per l'assistenza tecnica e la fatturazione
 * Copyright (C) DevCode s.n.c.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

namespace Modules\Contratti\Components;

use Common\Components\Article;
use Modules\Articoli\Articolo as Original;
use Modules\Contratti\Contratto;

class Articolo extends Article
{
    use RelationTrait;

    public $movimenta_magazzino = false;

    protected $table = 'co_righe_contratti';

    /**
     * Crea un nuovo articolo collegato ad un contratto.
     *
     * @return self
     */
    public static function build(Contratto $contratto, Original $articolo)
    {
        $model = parent::build($contratto, $articolo);

        return $model;
    }
}
