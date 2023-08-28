<?php
declare(strict_types=1);

use App\Utilities\Phinx\PhinxHelperTrait;
use Migrations\AbstractMigration;

class LinkGraphToNode extends AbstractMigration
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
        $table = $this->table('nodes');
        $this->requiredForeignKey($table, 'graphs', 'metadata_id')
            ->save();
    }
}
