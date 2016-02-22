<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> Mi cuenta</h3>
    </div>

    <?= $this->Form->create($user_data, ['class' => 'form-horizontal', 'type' => 'file' ]) ?>
        <div class="box-body">
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('email', ['class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('nombre', ['class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="apellido" class="col-sm-2 control-label">Apellido</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('apellido', ['class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Imagen</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('imagen', ['class' => 'form-control', 'label' => false, 'type' => 'file']); ?>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label for="nuevo_pass" class="col-sm-2 control-label">Nueva contraseña</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('nuevo_pass', ['class' => 'form-control', 'label' => false, 'type' => 'password']); ?>
                </div>
            </div>

            <div class="form-group">
                <label for="repetir_pass" class="col-sm-2 control-label">Repetir contraseña</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('repetir_pass', ['class' => 'form-control', 'label' => false, 'type' => 'password']); ?>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <?= $this->Form->button(__('Editar'), ["class" => "btn pull-right", "value" => 'editar']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
