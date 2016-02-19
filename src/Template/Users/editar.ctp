<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-users"></i> Editar Usuario</h3>
    </div>

    <?= $this->Form->create($user, ['class' => 'form-horizontal', 'data-parsley-validate' => '', 'type' => 'file' ]) ?>
        <div class="box-body">
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('email', ['required' => true, 'class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
            <input type="hidden" name="ahreloco" value=""></input>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-10">
                    <?php echo $this->Form->input('password', ['required' => true, 'class' => 'form-control', 'label' => false]); ?>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <?= $this->Form->button(__('Editar'), ["class" => "btn pull-right", "value" => 'editar']) ?>
        </div>
    <?= $this->Form->end() ?>
</div>
