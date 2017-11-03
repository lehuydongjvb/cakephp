<!DOCTYPE html>
<html>
<body>

<div class="users form large-9 medium-8 column content">
	<h1>UPLOAD FILE</h1>
	<div class="content">
		<?php echo $this->Flash->render(); ?>
		<div class="upload-form">
			<?php echo $this->Form->create('uploadfile', ['enctype' => 'multipart/form-data']); ?>
			<input type="file" name="uploadfile" >
			<!-- <?= $this->Form->input('uploadfile',['type' => 'file', 'class' => 'form-control']); ?> -->
			<?= $this->Form->button(__('Upload File'), ['type' => 'submit', 'class' => 'form-controlbtn btn-default']); ?>
			<?= $this->Form->end(); ?>
		</div>
	</div>
</div>

</body>
</html>