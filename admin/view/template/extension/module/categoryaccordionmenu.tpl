<?php echo $header; ?><?php echo $column_left; ?>
<div id="content" class="categoryaccordion">
	<div class="page-header">
		<div class="container-fluid">
			<div class="pull-right">
				<button type="submit" form="form-category" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
				<a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
			</div>
			<h1><?php echo $heading_module_title; ?></h1>
			<ul class="breadcrumb">
				<?php foreach ($breadcrumbs as $breadcrumb) { ?>
				<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	
	<div class="container-fluid">
		<?php if ($success) { ?>
			<div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
				<button type="button" class="close" data-dismiss="alert">&times;</button>
			</div>
		<?php } ?>
		<?php if ($error_warning) { ?>
			<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
				<button type="button" class="close" data-dismiss="alert">&times;</button>
			</div>
		<?php } ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
			</div>
			<div class="panel-body">
				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-cubes"></i> Category Accordion Menu - <b>Multi-Store Settings</b></h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<td class="text-left"><?php echo $column_name; ?></td>
											<td class="text-left"><?php echo $column_url; ?></td>
											<td class="text-right"><?php echo $column_action; ?></td>
										</tr>
									</thead>
									<tbody>
										<?php if ($stores) { ?>
										<?php foreach ($stores as $store) { ?>
										<tr>
											<td class="text-left"><?php echo $store['name']; ?></td>
											<td class="text-left"><?php echo $store['url']; ?></td>
											<td class="text-right"><a href="<?php echo $store['edit']; ?>" data-toggle="tooltip" title="<?php echo $text_edit_btn; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
										</tr>
										<?php } ?>
										<?php } else { ?>
										<tr>
											<td class="text-center" colspan="4"><?php echo $text_no_results; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
				</form>
				
				<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-support"></i> Help & Support</b></h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
									<tbody>
										<tr>
											<td class="text-left"><b>Module Name</b></td>
											<td class="text-left">Category Accordion Menu</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td class="text-left"><b>Developed by</b></td>
											<td class="text-left">Nice Web Development Team</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td class="text-left"><b>Opencart Version Compatibility</b></td>
											<td class="text-left">2.0.0.0, &nbsp;&nbsp;2.0.1.0, &nbsp;&nbsp;2.0.1.1, &nbsp;&nbsp;2.0.2.0, &nbsp;&nbsp;2.0.3.1, &nbsp;&nbsp;2.1.0.1, &nbsp;&nbsp;2.1.0.2, &nbsp;&nbsp;2.2.0.0, &nbsp;&nbsp;2.3.0.0</td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td class="text-left"><b>Contact Us</b></td>
											<td class="text-left"><b>mobileworld.email@gmail.com</b></td>
										</tr>
									</tbody>
									<tbody>
										<tr>
											<td class="text-left"><b>View More Extension</b></td>
											<td class="text-left"><a href="http://www.opencart.com/index.php?route=extension/extension&filter_username=scf8127" target="_blank">View More</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
<style>
.categoryaccordion .panel-default, .categoryaccordion .panel-heading { border-color: #008080; }
.categoryaccordion .panel-default, .categoryaccordion .panel-heading { border-color: #008080; }
.categoryaccordion .panel-heading h3 { color: #800080; }
</style>
<?php echo $footer; ?>