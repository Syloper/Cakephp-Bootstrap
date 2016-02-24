<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Token'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tokens index large-9 medium-8 columns content">
    <h3><?= __('Tokens') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('clave') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tokens as $token): ?>
            <tr>
                <td><?= $this->Number->format($token->id) ?></td>
                <td><?= $this->Number->format($token->clave) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $token->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $token->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $token->id], ['confirm' => __('Are you sure you want to delete # {0}?', $token->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
