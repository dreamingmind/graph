<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\TestSuite\Fixture\TestFixture;

/**
 * NodesFixture
 */
class NodesFixture extends TestFixture
{
    use LocatorAwareTrait;

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
                'name' => 'one',
                'metadata_id' => null,
                'graph_id' => 1,
                'created' => '2023-08-29 02:44:13',
                'modified' => '2023-08-29 02:44:13',
            ],
            [
                'id' => 2,
                'name' => 'two',
                'metadata_id' => null,
                'graph_id' => 1,
                'created' => '2023-08-29 02:44:13',
                'modified' => '2023-08-29 02:44:13',
            ],
            [
                'id' => 3,
                'name' => 'three',
                'metadata_id' => null,
                'graph_id' => 1,
                'created' => '2023-08-29 02:44:13',
                'modified' => '2023-08-29 02:44:13',
            ],
            [
                'id' => 5,
                'name' => 'five',
                'metadata_id' => null,
                'graph_id' => 1,
                'created' => '2023-08-29 02:44:13',
                'modified' => '2023-08-29 02:44:13',
            ],
            [
                'id' => 4,
                'name' => 'other one',
                'metadata_id' => null,
                'graph_id' => 2,
                'created' => '2023-08-29 02:44:13',
                'modified' => '2023-08-29 02:44:13',
            ],
        ];
        parent::init();
    }

}
