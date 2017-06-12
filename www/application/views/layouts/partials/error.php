<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>Error:</strong>
	<?php if ( is_array($_SESSION['error']) ) :?>
		<ul>
			<?php foreach ($_SESSION['error'] as $error) : ?>
				<li><?php echo $error; ?></li>
			<?php endforeach; ?>
		</ul>
	<?php else : echo $_SESSION['error']; ?>
	<?php endif; ?>
</div>