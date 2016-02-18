<!-- <div class="message error" onclick="this.classList.add('hidden');"><?= h($message) ?></div> -->
<div class="alert alert-danger alert-dismissable" style="text-align:center;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Alerta!</h4>
	<?= h($message) ?>
</div>
