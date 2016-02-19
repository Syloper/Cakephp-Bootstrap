<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> Agregar Usuario</h3>
    </div>

    <?= $this->Form->create($user, ['class' => 'form-horizontal', 'data-parsley-validate' => '', 'type' => 'file' ]) ?>
        <div class="box-body">
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('email', ['required' => true, 'class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('password', ['required' => true, 'class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <?= $this->Form->button(__('Agregar'), ["class" => "btn pull-right", "value" => 'agregar']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
