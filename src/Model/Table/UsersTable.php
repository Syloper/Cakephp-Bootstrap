<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{

    public function initialize(array $config){
        parent::initialize($config);
        
        $this->table('users');
        $this->displayField('email');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator){
        $validator
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'El E-mail ya se encuentra registrado.'
                ]);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        return $validator;
    }

  /*  public function beforeSave(Event $event)
    {
        $entity = $event->data['entity'];

        if ($entity->isNew()) {
            $hasher = new DefaultPasswordHasher();

            // Generate an API 'token'
            $entity->api_key_plain = sha1(Text::uuid());

            // Bcrypt the token so BasicAuthenticate can check
            // it during login.
            $entity->api_key = $hasher->hash($entity->api_key_plain);
        }
        return true;
    }
*/
    
}
