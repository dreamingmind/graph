<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Edge Entity
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $metadata_id
 * @property int $node_a_id
 * @property int $node_b_id
 * @property int $graph_id
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Node $node
 * @property \App\Model\Entity\Graph $graph
 */
class Edge extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'metadata_id' => true,
        'node_a_id' => true,
        'node_b_id' => true,
        'graph_id' => true,
        'created' => true,
        'modified' => true,
        'node' => true,
        'graph' => true,
    ];
}
