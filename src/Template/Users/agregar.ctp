<h1>agregar usuario</h1>
<?php
    echo $this->Form->create($user);
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    echo $this->Form->button(__('Crear usuario'));
    echo $this->Form->end();
?>