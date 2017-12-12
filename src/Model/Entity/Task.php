<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Task Entity
 *
 * @property string $TargetYearMonthDay
 * @property string $TargetYearMonth
 * @property string $Day
 * @property string $StartTime
 * @property string $EndTime
 * @property string $WorkTime
 * @property string $WorkTimeCompany
 * @property string $StartLocation
 * @property string $EndLocation
 * @property string $Notes
 * @property bool $StartOn
 * @property bool $EndOn
 * @property bool $NeedApplication
 * @property bool $HaveTask
 */
class Task extends Entity
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
        'TargetYearMonth' => true,
        'Day' => true,
        'StartTime' => true,
        'EndTime' => true,
        'WorkTime' => true,
        'WorkTimeCompany' => true,
        'StartLocation' => true,
        'EndLocation' => true,
        'Notes' => true,
        'StartOn' => true,
        'EndOn' => true,
        'NeedApplication' => true,
        'HaveTask' => true
    ];
}
