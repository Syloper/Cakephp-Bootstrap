<?php //$d_categorias = '/img/categorias/'; ?>
<?php //$d_iconos     = '/img/iconos/'; ?>

<div class="box">
	<div class="box-header">
		<h3 class="box-title">Lista de usuarios</h3>
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
					<th><?php echo $this->Paginator->sort('email', 'E-Mail'); ?></th>
					<th><?php echo $this->Paginator->sort('created', 'Creación'); ?></th>
					<th>Acciones</th>
				</tr>

				<?php foreach($users as $c): ?>

				<tr>
					<td></td>
					<td><?= $this->Number->format($c->id) ?></td>
					<td><?= h($c->email) ?></td>
					<td><?= h($c->created) ?></td>
					<td>
                        <?= $this->Html->link(null, ['action' => 'editar', $c->id], ['class' => 'fa fa-pencil']) ?> |
                        <?= $this->Form->postLink(null, ['action' => 'elimiar', $c->id], ['class' => 'fa fa-trash', 'confirm' => __('¿Seguro que desea eliminar el usuario con email {0}?', $c->email)]) ?>
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