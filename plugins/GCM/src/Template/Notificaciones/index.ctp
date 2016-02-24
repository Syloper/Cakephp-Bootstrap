<div class="box">
    <div class="box-header">
        <h3 class="box-title">Lista de notificaciones</h3>
        <div class="box-tools">
            <div class="input-group" style="width: 220px;">
                <div class="col-xs-12">
                    <?php echo $this->Form->create(null, ['url' => ['action' => 'buscar']]); ?>
                        <div class="col-xs-10">
                            <input type="text" name="q" class="form-control" placeholder="Buscar">
                        </div>
                        <div class="col-xs-2">
                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tbody>
            
                <tr>
                    <th></th>
                    <th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
                    <th><?php echo $this->Paginator->sort('titulo', 'Titulo'); ?></th>
                    <th><?php echo $this->Paginator->sort('contenido', 'Contenido'); ?></th>
                    <th><?php echo $this->Paginator->sort('fecha_vence', 'Fecha vencimiento'); ?></th>
                    <th><?php echo $this->Paginator->sort('autocancel', 'Autocancel'); ?></th>
                    <th><?php echo $this->Paginator->sort('sonido', 'Sonido'); ?></th>
                    <th><?php echo $this->Paginator->sort('vibrar', 'Vibrar'); ?></th>
                    <th><?php echo $this->Paginator->sort('led', 'LED'); ?></th>
                    <th>Acciones</th>
                </tr>
                <?php foreach($notificaciones as $c): ?>
                <tr>
                    <td></td>
                    <td><?= $this->Number->format($c->id) ?></td>
                    <td><?= h($c->titulo) ?></td>
                    <td><?= h($c->contenido) ?></td>
                    <td><?php echo $c->fecha_vence; ?></td>
                    <td><?php echo ($c->autocancel)?'Si':'No'; ?></td>
                    <td><?php echo ($c->sonido)?'Si':'No'; ?></td>
                    <td><?php echo ($c->vibrar)?'Si':'No'; ?></td>
                    <td><?php echo ($c->led)?'Si':'No'; ?></td>

                    <td>
                        <?= $this->Html->link(null, ['action' => 'enviar', $c->id], ['class' => 'fa fa-send', 'alt' => 'Enviar', 'title' => 'Enviar']) ?> |
                        <?= $this->Html->link(null, ['action' => 'editar', $c->id], ['class' => 'fa fa-pencil']) ?> |
                        <?= $this->Form->postLink(null, ['action' => 'elimiar', $c->id], ['class' => 'fa fa-trash', 'confirm' => __('¿Seguro que desea eliminar la notificacion {0}?', $c->titulo)]) ?>
                    </td>
                </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
        <div class="pagination pagination-large">
            <ul class="pagination">
                <?php
                    echo $this->Paginator->prev(__('Anterior'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
                    echo $this->Paginator->next(__('Siguiente'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
                ?>
            </ul>
        </div>
    </div>
</div>