<?php

namespace Update;

use Phinx\Migration\AbstractMigration;
use Database;

class Migration extends AbstractMigration
{
    /** @var \Illuminate\Database\Capsule\Manager $capsule */
    public $capsule;
    /** @var \Illuminate\Database\Schema\Builder $capsule */
    public $schema;

    public function init()
    {
        \App::definePaths(__DIR__.'/../..');

        $this->capsule = Database::getConnection()->getCapsule();
        $this->schema = $this->capsule->schema();
    }
}
