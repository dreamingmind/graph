<?php

declare(strict_types=1);

use App\Utilities\Phinx\PhinxHelperTrait;
use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class MyNewMigration extends AbstractMigration
{

    use PhinxHelperTrait;

    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table = $this->table('edges');
        $table
            ->addColumn('name', 'char', ['limit' => 255])
            ->addColumn('metadata_id', 'integer', ['limit' => MysqlAdapter::INT_REGULAR])
            ->create();
        $this->requiredCakeNormColumns($table)
            ->update();

    }
}
