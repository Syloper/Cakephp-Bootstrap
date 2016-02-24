<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Token'), ['action' => 'edit', $token->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Token'), ['action' => 'delete', $token->id], ['confirm' => __('Are you sure you want to delete # {0}?', $token->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tokens'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Token'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tokens view large-9 medium-8 columns content">
    <h3><?= h($token->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($token->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Clave') ?></th>
            <td><?= $this->Number->format($token->clave) ?></td>
        </tr>
    </table>
</div>
