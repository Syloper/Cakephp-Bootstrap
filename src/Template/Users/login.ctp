<?= $this->Flash->render('auth') ?>

<div class="login-box">
    <div class="login-logo">  
        <a href="../../index2.html"><b>Cakephp Bootstrap</b></a>
    </div>
    
    <div class="login-box-body">
        <p class="login-box-msg">Ingresá tus datos</p>

        <?= $this->Form->create() ?>
            <div class="form-group has-feedback">
                <!-- <input type="email" class="form-control" placeholder="Email"> -->
                <?= $this->Form->input('email', ['placeholder' => __('Email'), 'required' => true, 'class' => 'form-control', 'label' => false]) ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <!-- <input type="password" class="form-control" placeholder="Password"> -->
                <?= $this->Form->input('password', ['placeholder' => __('Contraseña'), 'required' => true, 'class' => 'form-control', 'label' => false]) ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <!-- <input type="checkbox"> Recordar usuario -->
                            <?php echo $this->Form->checkbox('remember_me', ['hiddenField' => false]); ?>
                            <?php echo $this->Form->label('Recordar usuario'); ?>
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button> -->
                    <?= $this->Form->button(__('Entrar'), ['class' => 'btn btn-primary btn-block btn-flat']); ?>
                </div>
            </div>
            
        <?= $this->Form->end() ?>

    </div>
</div>