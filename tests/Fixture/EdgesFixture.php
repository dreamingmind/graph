<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EdgesFixture
 */
class EdgesFixture extends TestFixture
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
                'node_a_id' => 1,
                'node_b_id' => 1,
                'graph_id' => 1,
                'created' => '2023-08-29 02:54:18',
                'modified' => '2023-08-29 02:54:18',
            ],
        ];
        parent::init();
    }
}
