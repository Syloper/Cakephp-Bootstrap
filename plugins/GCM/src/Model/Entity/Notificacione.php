<?php
namespace GCM\Model\Entity;

use Cake\ORM\Entity;

class Notificacione extends Entity{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
