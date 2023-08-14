<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Comment extends Entity
{

    const NO_NAME = "名前なし";
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
        '*' => true,
    ];

    public function getName()
    {
        return $this->name ?? self::NO_NAME . '_' . $this->id;
    }

    public function getModified()
    {
        return date('Y年m月d日 H時i分',strtotime($this->modified));
    }
}
