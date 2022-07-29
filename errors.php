<?php
// $errors = array('s','a');
if (count($errors) > 0) : ?>

	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p style="margin-bottom:5px"><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>

<?php endif ?>