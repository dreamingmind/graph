<?php
declare(strict_types=1);

use App\Utilities\Phinx\PhinxHelperTrait;
use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

final class CreateEdge extends AbstractMigration
{

    use PhinxHelperTrait;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
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
