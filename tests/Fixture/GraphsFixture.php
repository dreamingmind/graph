<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GraphsFixture
 */
class GraphsFixture extends TestFixture
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
                'name' => 'main',
                'metadata_id' => null,
                'created' => '2023-08-29 02:32:55',
                'modified' => '2023-08-29 02:32:55',
            ],
            [
                'id' => 2,
                'name' => 'additional',
                'metadata_id' => null,
                'created' => '2023-08-29 02:32:55',
                'modified' => '2023-08-29 02:32:55',
            ],
        ];
        parent::init();
    }
}
