<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NodesFixture
 */
class NodesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => '',
                'metadata_id' => 1,
                'graph_id' => 1,
                'created' => '2023-08-29 02:44:13',
                'modified' => '2023-08-29 02:44:13',
            ],
        ];
        parent::init();
    }
}
