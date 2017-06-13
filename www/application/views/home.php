<?php require_once('layouts/header.php'); ?>

<style>
	body {
		background-color: #f7f7f7;
		font-family: inherit;
	}
	.content {
		background-color: #ffffff;
		height: calc(100vh - 54px);
	}
	#projects_list ul {
		list-style: none;
		padding: 0;
		margin: auto;
	}
	.today, .next_week {
		font-size: 17px;
	}
	.projects {
		 font-size: 16px;
		 text-decoration: underline;
	}
	.count {
		opacity: 0.5;
	}
	.priority_project {
		min-width: 13px;
		min-height: 13px;
		border-radius: 50%;
		margin-right: .5rem
	}
	#new_project_selected_color {
		width: 16px;
		height: 16px;
		background-color: rgb(255, 0, 0);
	}
	@media ( max-width: 1200px ) and ( min-width: 768px ) {
		#add_project button {
			width: 100%;
		}
	}
</style>

<nav class="navbar navbar-toggleable-sm navbar-light bg-info">
	<a class="navbar-brand text-white" href="/">TODO</a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#projects_list" aria-controls="projects_list" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<nav class="navbar navbar-toggleable-sm navbar-light bg-faded sidebar pl-0 pr-0">
				<div class="collapse navbar-collapse" id="projects_list">
					<ul>
						<li>
							<p  class="text-muted today"><b>Today <small class="count">5</small></b></p>
						</li>
						<li>
							<p class="text-muted next_week"><b>Next 7 days</b></p>
						</li>
						<li>
							<br>
							<p class="text-muted projects"><b>Projects</b></p>
						</li>

						<!-- foreach -->
						<li class="mb-3">
							<div class="d-flex align-items-center text-muted">
								<div class="priority_project" style="background-color: red;"></div>
								Work <small class="count ml-2">2</small>
							</div>
						</li>
						<li class="mb-3">
							<div class="d-flex align-items-center text-muted">
								<div class="priority_project" style="background-color: green;"></div>
								Home <small class="count ml-2">5</small>
							</div>
						</li>
						<li class="mb-3">
							<div class="d-flex align-items-center text-muted">
								<div class="priority_project" style="background-color: yellow;"></div>
								Music Rock Music <small class="count ml-2">15</small>
							</div>
						</li>
						<!-- end foreach -->

						<li>
							<button type="button" class="btn btn-info" data-toggle="collapse" href="#add_project" aria-expanded="false" aria-controls="add_project">+ Add</button>

							<div class="collapse mt-3" id="add_project">
								<form action="" method="POST" role="form">
									<div class="input-group form-group">
										<span class="input-group-addon colorpicker-component" id="select_color"><i id="new_project_selected_color"></i></span>
										<input type="hidden" name="color" id="new_project_color">
										<input type="text" name="name" class="form-control" placeholder="">
									</div>

									<button type="submit" class="btn btn-success">Save</button>
									<button type="button" class="btn btn-danger float-xl-right" data-toggle="collapse" href="#add_project" aria-expanded="false" aria-controls="add_project">Cancel</button>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="col-md-8 content">
			content
		</div>
	</div>
</div>

<?php require_once('layouts/footer.php'); ?>


<script>
	$(function() {
		$('#select_color').colorpicker({
			align: 'left'
		}).on('changeColor', function(e) {
			let color = e.color.toString('hex');
			$('#new_project_color').val(color);
			$('#new_project_selected_color')[0].style.backgroundColor = color;
		});
	});
</script>