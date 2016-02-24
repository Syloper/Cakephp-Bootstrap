<?php
namespace GCM\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use GCM\Model\Entity\Notificacione;

class NotificacionesTable extends Table{

   
    public function initialize(array $config){
        parent::initialize($config);

        $this->table('notificaciones');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

    }


    /*public function validationDefault(Validator $validator){
        $validator
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->requirePresence('contenido', 'create')
            ->notEmpty('contenido');

        $validator
            ->add('fecha_inicio', 'valid', ['rule' => 'datetime'])
            ->requirePresence('fecha_inicio', 'create')
            ->notEmpty('fecha_inicio');

        $validator
            ->add('fecha_vence', 'valid', ['rule' => 'datetime'])
            ->requirePresence('fecha_vence', 'create')
            ->notEmpty('fecha_vence');

        $validator
            ->add('autocancel', 'valid', ['rule' => 'boolean'])
            ->requirePresence('autocancel', 'create')
            ->notEmpty('autocancel');

        $validator
            ->add('sonido', 'valid', ['rule' => 'boolean'])
            ->requirePresence('sonido', 'create')
            ->notEmpty('sonido');

        $validator
            ->add('vibrar', 'valid', ['rule' => 'boolean'])
            ->requirePresence('vibrar', 'create')
            ->notEmpty('vibrar');

        $validator
            ->add('led', 'valid', ['rule' => 'boolean'])
            ->requirePresence('led', 'create')
            ->notEmpty('led');

        return $validator;
    }*/
}
