<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-bell-o"></i> Agregar Notificación</h3>
    </div>

    <?= $this->Form->create($notificacione, ['class' => 'form-horizontal', 'data-parsley-validate' => '', 'type' => 'file' ]) ?>
        <div class="box-body">
            <div class="form-group">
                <label for="titulo" class="col-sm-2 control-label">Titulo</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('titulo', ['required' => true, 'class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="contenido" class="col-sm-2 control-label">Contenido</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('contenido', ['required' => true, 'class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="fecha_inicio" class="col-sm-2 control-label">Fecha de inicio</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('fecha_inicio', ['class' => 'form-control input-group date datetimepicker1', 'label' => false, 'type' => 'text']); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="fecha_vence" class="col-sm-2 control-label">Fecha de vencimiento</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('fecha_vence', ['class' => 'form-control input-group date datetimepicker1', 'label' => false, 'type' => 'text']); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="autocancel" class="col-sm-2 control-label">Autocancel</label>
                <div class="col-sm-10">
                    <label>
                        <?php echo $this->Form->input('autocancel', ['class' => '', 'label' => false, 'type' => 'checkbox']); ?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="sonido" class="col-sm-2 control-label">Sonido</label>
                <div class="col-sm-10">
                    <label>
                        <?php echo $this->Form->input('sonido', ['class' => '', 'label' => false, 'type' => 'checkbox']); ?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="vibrar" class="col-sm-2 control-label">Vibrar</label>
                <div class="col-sm-10">
                    <label>
                        <?php echo $this->Form->input('vibrar', ['class' => '', 'label' => false, 'type' => 'checkbox']); ?>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="led" class="col-sm-2 control-label">LED</label>
                <div class="col-sm-10">
                    <label>
                        <?php echo $this->Form->input('led', ['class' => '', 'label' => false, 'type' => 'checkbox']); ?>
                    </label>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <?= $this->Form->button(__('Agregar'), ["class" => "btn pull-right", "value" => 'agregar']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
