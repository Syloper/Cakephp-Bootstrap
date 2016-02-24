<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Notificacione'), ['action' => 'edit', $notificacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notificacione'), ['action' => 'delete', $notificacione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notificacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notificaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notificacione'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notificaciones view large-9 medium-8 columns content">
    <h3><?= h($notificacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Titulo') ?></th>
            <td><?= h($notificacione->titulo) ?></td>
        </tr>
        <tr>
            <th><?= __('Contenido') ?></th>
            <td><?= h($notificacione->contenido) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($notificacione->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha Inicio') ?></th>
            <td><?= h($notificacione->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th><?= __('Fecha Vence') ?></th>
            <td><?= h($notificacione->fecha_vence) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($notificacione->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($notificacione->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Autocancel') ?></th>
            <td><?= $notificacione->autocancel ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Sonido') ?></th>
            <td><?= $notificacione->sonido ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Vibrar') ?></th>
            <td><?= $notificacione->vibrar ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Led') ?></th>
            <td><?= $notificacione->led ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
</div>
