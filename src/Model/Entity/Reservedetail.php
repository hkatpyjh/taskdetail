<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservedetail Entity
 *
 * @property string $Machine
 * @property string|null $ReserveKey
 * @property string|null $ReserveType
 * @property string|null $Amount
 */
class Reservedetail extends Entity
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
        'Machine' => true,
        'ReserveKey' => true,
        'ReserveType' => true,
        'Amount' => true
    ];
}
