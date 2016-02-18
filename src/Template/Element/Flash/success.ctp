<!-- <div class="message success" onclick="this.classList.add('hidden')"><?= h($message) ?></div> -->
<div class="alert alert-success alert-dismissable" style="text-align:center;">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-check"></i> Correcto!</h4>
	<?= h($message) ?>
</div>

