<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aggregatedetail Entity
 *
 * @property string $ReserveKey
 * @property string|null $ReserveType
 * @property string|null $Amount
 */
class Aggregatedetail extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'ReserveType' => true,
        'Amount' => true
    ];
}
