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
							<h3 class="panel-title"><i class="fa fa-cogs"></i> Module Status</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
							<label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
							<div class="col-sm-10">
								<select name="categoryaccordionmenu_status" id="input-status" class="form-control">
									<?php if ($categoryaccordionmenu_status) { ?>
									<option value="1" selected="selected"><?php echo $text_enabled; ?></option>
									<option value="0"><?php echo $text_disabled; ?></option>
									<?php } else { ?>
									<option value="1"><?php echo $text_enabled; ?></option>
									<option value="0" selected="selected"><?php echo $text_disabled; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>		
						</div>
					</div>
					<div class="row">
						<!-- Main Category Settings  START -->
						<div class="col-lg-4 col-md-12 col-sx-12 col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-cube"></i> Parent Category Settings</h3>
								</div>
								<div class="panel-body">
									<!-- Main Category Background Color START -->
									<div class="form-group">
										<!--<input type='button' class="btn btn-primary" id="demo-layout1" >-->
										<label class="col-sm-6 control-label" for="input-main-bg-color"><span data-toggle="tooltip" title="<?php echo $help_main_bg_color; ?>"><?php echo $entry_main_bg_color; ?></span></label>
										<div class="col-sm-5 color-pick input-group">
											<input type="text" name="categoryaccordionmenu_fm_main_bg_color" value="<?php echo $categoryaccordionmenu_fm_main_bg_color; ?>" placeholder="<?php echo $entry_main_bg_color; ?>" id="input-main-bg-color" class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
									<!-- Main Category Background Color END -->
									
									<!-- Main Category Hover/Selected Color START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-main-hover-color"><span data-toggle="tooltip" title="<?php echo $help_main_hover_color; ?>"><?php echo $entry_main_hover_color; ?></span></label>
										<div class="col-sm-5 color-pick input-group">
											<input type="text" name="categoryaccordionmenu_fm_main_hover_color" value="<?php echo $categoryaccordionmenu_fm_main_hover_color; ?>" placeholder="<?php echo $entry_main_hover_color; ?>" id="input-main-hover-color" class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
									<!-- Main Category Hover/Selected Color END -->
									
									<!-- Main Category Text Color START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-main-txt-color"><span data-toggle="tooltip" title="<?php echo $help_main_txt_color; ?>"><?php echo $entry_main_txt_color; ?></span></label>
										<div class="col-sm-5 color-pick input-group">
											<input type="text" name="categoryaccordionmenu_fm_main_txt_color" value="<?php echo $categoryaccordionmenu_fm_main_txt_color; ?>" placeholder="<?php echo $entry_main_txt_color; ?>" id="input-main-txt-color" class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
									<!-- Main Category Text Color END -->
									
									<!-- Main Category Text Size START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-main-txt-size"><span data-toggle="tooltip" title="<?php echo $help_main_txt_size; ?>"><?php echo $entry_main_txt_size; ?></span></label>
										<div class="col-sm-5 input-group">
											<input type="number" name="categoryaccordionmenu_fm_main_txt_size" value="<?php echo $categoryaccordionmenu_fm_main_txt_size; ?>" placeholder="<?php echo $entry_main_txt_size; ?>" id="input-main-txt-size" class="form-control" />
										</div>
									</div>
									<!-- Main Category Text Size END -->
									
									<!-- Display Main Category Icon Y/N START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-main-icon-display"><span data-toggle="tooltip" title="<?php echo $help_main_icon_display; ?>"><?php echo $entry_main_icon_display; ?></span></label>
										<div class="col-sm-5 input-group">
											<label class="radio-inline">
												<?php if ($categoryaccordionmenu_fm_main_icon_display) { ?>
												<input type="radio" name="categoryaccordionmenu_fm_main_icon_display" value="1" checked="checked" />
												<?php echo $text_yes; ?>
												<?php } else { ?>
												<input type="radio" name="categoryaccordionmenu_fm_main_icon_display" value="1" />
												<?php echo $text_yes; ?>
												<?php } ?>
											</label>
											<label class="radio-inline">
												<?php if (!$categoryaccordionmenu_fm_main_icon_display) { ?>
												<input type="radio" name="categoryaccordionmenu_fm_main_icon_display" value="0" checked="checked" />
												<?php echo $text_no; ?>
												<?php } else { ?>
												<input type="radio" name="categoryaccordionmenu_fm_main_icon_display" value="0" />
												<?php echo $text_no; ?>
												<?php } ?>
											</label>
										</div>
									</div>	
									<!-- Display Main Category Icon Y/N END -->
									
									
									<!-- Main Category Icon START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-main-icon"><span data-toggle="tooltip" title="<?php echo $help_main_icon; ?>"><?php echo $entry_main_icon; ?></span></label>
										<div class="col-sm-5 input-group">
											<select name="categoryaccordionmenu_fm_main_icon" id="input-main-icon" class="form-control fontawesome-select">
												<?php  foreach ($font_awesome_icon as $key=>$value) { ?>
													<?php if ($key == $categoryaccordionmenu_fm_main_icon) { ?>
														<option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?> - <?php echo $key; ?></option>
													<?php } else { ?>
														<option value="<?php echo $key; ?>"><?php echo $value; ?> - <?php echo $key; ?></option>
													<?php } ?>
												<?php }  ?>
											</select>
										</div>
									</div>
									<!-- Main Category Icon END -->
									
									<!-- Main Category Icon Color START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-main-icon-color"><span data-toggle="tooltip" title="<?php echo $help_main_icon_color; ?>"><?php echo $entry_main_icon_color; ?></span></label>
										<div class="col-sm-5 color-pick input-group">
											<input type="text" name="categoryaccordionmenu_fm_main_icon_color" value="<?php echo $categoryaccordionmenu_fm_main_icon_color; ?>" placeholder="<?php echo $entry_main_icon_color; ?>" id="input-main-icon-color" class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
									<!-- Main Category Icon Color END -->
									
									<!-- Main Category Icon Size START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-main-icon-size"><span data-toggle="tooltip" title="<?php echo $help_main_icon_size; ?>"><?php echo $entry_main_icon_size; ?></span></label>
										<div class="col-sm-5 input-group">
											<input type="number" name="categoryaccordionmenu_fm_main_icon_size" value="<?php echo $categoryaccordionmenu_fm_main_icon_size; ?>" placeholder="<?php echo $entry_main_icon_size; ?>" id="input-main-icon-size" class="form-control" />
										</div>
									</div>
									<!-- Main Category Icon Size END -->
									
									<!-- Main Category Padding START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-main-padding"><span data-toggle="tooltip" title="<?php echo $help_main_padding; ?>"><?php echo $entry_main_padding; ?></span></label>
										<div class="col-sm-5 input-group">
											<input type="number" name="categoryaccordionmenu_fm_main_padding_top" value="<?php echo $categoryaccordionmenu_fm_main_padding_top; ?>" placeholder="<?php echo $entry_padding_top; ?>" id="input-main-padding-top" class="form-control" />
											<input type="number" name="categoryaccordionmenu_fm_main_padding_right" value="<?php echo $categoryaccordionmenu_fm_main_padding_right; ?>" placeholder="<?php echo $entry_padding_right; ?>" id="input-main-padding-right" class="form-control" />
											<input type="number" name="categoryaccordionmenu_fm_main_padding_bottom" value="<?php echo $categoryaccordionmenu_fm_main_padding_bottom; ?>" placeholder="<?php echo $entry_padding_bottom; ?>" id="input-main-padding-bottom" class="form-control" />
											<input type="number" name="categoryaccordionmenu_fm_main_padding_left" value="<?php echo $categoryaccordionmenu_fm_main_padding_left; ?>" placeholder="<?php echo $entry_padding_left; ?>" id="input-main-padding-left" class="form-control" />
										</div>
									</div>
									<!-- Main Category Padding END -->
								</div>
							</div>
						</div>
						<!-- Main Category Settings END -->
						
						<!-- Child Category Settings START -->
						<div class="col-lg-4 col-md-12 col-sx-12 col-sm-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-cubes"></i> Child Category Settings</h3>
								</div>
								<div class="panel-body">
									<!-- Child Category Background Color START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-child-bg-color"><span data-toggle="tooltip" title="<?php echo $help_child_bg_color; ?>"><?php echo $entry_child_bg_color; ?></span></label>
										<div class="col-sm-5 color-pick input-group">
											<input type="text" name="categoryaccordionmenu_fm_child_bg_color" value="<?php echo $categoryaccordionmenu_fm_child_bg_color; ?>" placeholder="<?php echo $entry_child_bg_color; ?>" id="input-child-bg-color" class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
									<!-- Child Category Background Color END -->
									
									<!-- Child Category Hover/Selected Color START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-child-hover-color"><span data-toggle="tooltip" title="<?php echo $help_child_hover_color; ?>"><?php echo $entry_child_hover_color; ?></span></label>
										<div class="col-sm-5 color-pick input-group">
											<input type="text" name="categoryaccordionmenu_fm_child_hover_color" value="<?php echo $categoryaccordionmenu_fm_child_hover_color; ?>" placeholder="<?php echo $entry_child_hover_color; ?>" id="input-child-hover-color" class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
									<!-- Child Category Hover/Selected Color END -->
									
									<!-- Child Category Text Color START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-child-txt-color"><span data-toggle="tooltip" title="<?php echo $help_child_txt_color; ?>"><?php echo $entry_child_txt_color; ?></span></label>
										<div class="col-sm-5 color-pick input-group">
											<input type="text" name="categoryaccordionmenu_fm_child_txt_color" value="<?php echo $categoryaccordionmenu_fm_child_txt_color; ?>" placeholder="<?php echo $entry_child_txt_color; ?>" id="input-child-txt-color" class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
									<!-- Child Category Text Color END -->
									
									<!-- Child Category Text Size START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-child-txt-size"><span data-toggle="tooltip" title="<?php echo $help_child_txt_size; ?>"><?php echo $entry_child_txt_size; ?></span></label>
										<div class="col-sm-5 input-group">
											<input type="number" name="categoryaccordionmenu_fm_child_txt_size" value="<?php echo $categoryaccordionmenu_fm_child_txt_size; ?>" placeholder="<?php echo $entry_child_txt_size; ?>" id="input-child-txt-size" class="form-control" />
										</div>
									</div>
									<!-- Child Category Text Size END -->
									
									<!-- Display Child Category Icon Y/N START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-child-icon-display"><span data-toggle="tooltip" title="<?php echo $help_child_icon_display; ?>"><?php echo $entry_child_icon_display; ?></span></label>
										<div class="col-sm-5 input-group">
											<label class="radio-inline">
												<?php if ($categoryaccordionmenu_fm_child_icon_display) { ?>
												<input type="radio" name="categoryaccordionmenu_fm_child_icon_display" value="1" checked="checked" />
												<?php echo $text_yes; ?>
												<?php } else { ?>
												<input type="radio" name="categoryaccordionmenu_fm_child_icon_display" value="1" />
												<?php echo $text_yes; ?>
												<?php } ?>
											</label>
											<label class="radio-inline">
												<?php if (!$categoryaccordionmenu_fm_child_icon_display) { ?>
												<input type="radio" name="categoryaccordionmenu_fm_child_icon_display" value="0" checked="checked" />
												<?php echo $text_no; ?>
												<?php } else { ?>
												<input type="radio" name="categoryaccordionmenu_fm_child_icon_display" value="0" />
												<?php echo $text_no; ?>
												<?php } ?>
											</label>
										</div>
									</div>	
									<!-- Display Child Category Icon Y/N END -->
									
									<!-- Child Category Icon START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-child-icon"><span data-toggle="tooltip" title="<?php echo $help_child_icon; ?>"><?php echo $entry_child_icon; ?></span></label>
										<div class="col-sm-5 input-group">
											<select name="categoryaccordionmenu_fm_child_icon" id="input-child-icon" class="form-control fontawesome-select">
												<?php  foreach ($font_awesome_icon as $key=>$value) { ?>
													<?php if ($key == $categoryaccordionmenu_fm_child_icon) { ?>
														<option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?> - <?php echo $key; ?></option>
													<?php } else { ?>
														<option value="<?php echo $key; ?>"><?php echo $value; ?> - <?php echo $key; ?></option>
													<?php } ?>
												<?php }  ?>
											</select>
										</div>
									</div>
									<!-- Child Category Icon END -->
									
									<!-- Child Category Icon Color START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-child-icon-color"><span data-toggle="tooltip" title="<?php echo $help_child_icon_color; ?>"><?php echo $entry_child_icon_color; ?></span></label>
										<div class="col-sm-5 color-pick input-group">
											<input type="text" name="categoryaccordionmenu_fm_child_icon_color" value="<?php echo $categoryaccordionmenu_fm_child_icon_color; ?>" placeholder="<?php echo $entry_child_icon_color; ?>" id="input-child-icon-color" class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
									<!-- Child Category Icon Color END -->
									
									<!-- Child Category Icon Size START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-child-icon-size"><span data-toggle="tooltip" title="<?php echo $help_child_icon_size; ?>"><?php echo $entry_child_icon_size; ?></span></label>
										<div class="col-sm-5 input-group">
											<input type="number" name="categoryaccordionmenu_fm_child_icon_size" value="<?php echo $categoryaccordionmenu_fm_child_icon_size; ?>" placeholder="<?php echo $entry_child_icon_size; ?>" id="input-child-icon-size" class="form-control" />
										</div>
									</div>	
									<!-- Child Category Icon Size END -->
									
									<!-- Child Category Padding START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-child-padding"><span data-toggle="tooltip" title="<?php echo $help_child_padding; ?>"><?php echo $entry_child_padding; ?></span></label>
										<div class="col-sm-5 input-group">
											<input type="number" name="categoryaccordionmenu_fm_child_padding_top" value="<?php echo $categoryaccordionmenu_fm_child_padding_top; ?>" placeholder="<?php echo $entry_padding_top; ?>" id="input-child-padding-top" class="form-control" />
											<input type="number" name="categoryaccordionmenu_fm_child_padding_right" value="<?php echo $categoryaccordionmenu_fm_child_padding_right; ?>" placeholder="<?php echo $entry_padding_right; ?>" id="input-child-padding-right" class="form-control" />
											<input type="number" name="categoryaccordionmenu_fm_child_padding_bottom" value="<?php echo $categoryaccordionmenu_fm_child_padding_bottom; ?>" placeholder="<?php echo $entry_padding_bottom; ?>" id="input-child-padding-bottom" class="form-control" />
											<input type="number" name="categoryaccordionmenu_fm_child_padding_left" value="<?php echo $categoryaccordionmenu_fm_child_padding_left; ?>" placeholder="<?php echo $entry_padding_left; ?>" id="input-child-padding-left" class="form-control" />
										</div>
									</div>
									<!-- Child Category Padding END -->
								</div>
							</div>
						</div>
						<!-- Child Category Settings END -->
						
						<!-- Collapse/Expand-RTL-Custom Class Settings START -->
						<div class="col-lg-4 col-md-12 col-sx-12 col-sm-12">
							<!-- RTL Language Settings START-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-language"></i> RTL Language Settings</h3>
								</div>
								<div class="panel-body">
									<!-- RTL Language enable/disable START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-rtl"><span data-toggle="tooltip" title="<?php echo $help_rtl; ?>"><?php echo $entry_rtl; ?></span></label>
										<div class="col-sm-5 input-group">
											<select name="categoryaccordionmenu_rtl" id="input-child-icon" class="form-control fontawesome-select">
												<?php if ($categoryaccordionmenu_rtl == 1) { ?>
													<option value="1" selected="selected"><?php echo $text_yes; ?></option>
													<option value="0"><?php echo $text_no; ?></option>
												<?php } else { ?>
													<option value="1"><?php echo $text_yes; ?></option>
													<option value="0" selected="selected"><?php echo $text_no; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<!-- RTL Language enable/disable END -->
								</div>
							</div>
							<!-- RTL Language Settings END-->
						
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-compress"></i> Collapse/Expand Settings</h3>
								</div>
								<div class="panel-body">
									<!-- Collapse Icon START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-cbtn-icon"><span data-toggle="tooltip" title="<?php echo $help_cbtn_icon; ?>"><?php echo $entry_cbtn_icon; ?></span></label>
										<div class="col-sm-5 input-group">
											<select name="categoryaccordionmenu_fm_cbtn_icon" id="input-cbtn-icon" class="form-control fontawesome-select">
												<?php  foreach ($font_awesome_icon as $key=>$value) { ?>
													<?php if ($key == $categoryaccordionmenu_fm_cbtn_icon) { ?>
														<option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?> - <?php echo $key; ?></option>
													<?php } else { ?>
														<option value="<?php echo $key; ?>"><?php echo $value; ?> - <?php echo $key; ?></option>
													<?php } ?>
												<?php }  ?>
											</select>
										</div>
									</div>
									<!-- Collapse Icon END -->
									
									<!-- Expand Icon START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-ebtn-icon"><span data-toggle="tooltip" title="<?php echo $help_ebtn_icon; ?>"><?php echo $entry_ebtn_icon; ?></span></label>
										<div class="col-sm-5 input-group">
											<select name="categoryaccordionmenu_fm_ebtn_icon" id="input-ebtn-icon" class="form-control fontawesome-select">
												<?php  foreach ($font_awesome_icon as $key=>$value) { ?>
													<?php if ($key == $categoryaccordionmenu_fm_ebtn_icon) { ?>
														<option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?> - <?php echo $key; ?></option>
													<?php } else { ?>
														<option value="<?php echo $key; ?>"><?php echo $value; ?> - <?php echo $key; ?></option>
													<?php } ?>
												<?php }  ?>
											</select>
										</div>
									</div>
									<!-- Expand Icon END -->
									
									<!-- Collapse/Expand Icon Color START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-cebtn-icon-color"><span data-toggle="tooltip" title="<?php echo $help_cebtn_icon_color; ?>"><?php echo $entry_cebtn_icon_color; ?></span></label>
										<div class="col-sm-5 color-pick input-group">
											<input type="text" name="categoryaccordionmenu_fm_cebtn_icon_color" value="<?php echo $categoryaccordionmenu_fm_cebtn_icon_color; ?>" placeholder="<?php echo $entry_cebtn_icon_color; ?>" id="input-cebtn-icon-color" class="form-control" />
											<span class="input-group-addon"><i></i></span>
										</div>
									</div>
									<!-- Collapse/Expand Icon Color END -->
									
									<!-- Collapse/Expand Icon Size START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-cebtn-icon-size"><span data-toggle="tooltip" title="<?php echo $help_cebtn_icon_size; ?>"><?php echo $entry_cebtn_icon_size; ?></span></label>
										<div class="col-sm-5 input-group">
											<input type="number" name="categoryaccordionmenu_fm_cebtn_icon_size" value="<?php echo $categoryaccordionmenu_fm_cebtn_icon_size; ?>" placeholder="<?php echo $entry_cebtn_icon_size; ?>" id="input-cebtn-icon-size" class="form-control" />
										</div>
									</div>	
									<!-- Collapse/Expand Icon Size END -->
								</div>
							</div>
							
							<!-- Custom/Extra Class Settings START-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="fa fa-eye"></i> Custom/Extra Class Settings</h3>
								</div>
								<div class="panel-body">
									<!-- Custom/Extra Class for Parent Category START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-custom-class-parent"><span data-toggle="tooltip" title="<?php echo $help_custom_cls_parent; ?>"><?php echo $entry_custom_cls_parent; ?></span></label>
										<div class="col-sm-5 input-group">
											<input type="text" name="categoryaccordionmenu_custom_cls_parent" value="<?php echo $categoryaccordionmenu_custom_cls_parent; ?>" placeholder="<?php echo $entry_custom_cls_parent; ?>" id="input-custom-class-parent" class="form-control" />
										</div>
									</div>
									<!-- Custom/Extra Class for Parent Category END -->
									
									<!-- Custom/Extra Class for Child Category START -->
									<div class="form-group">
										<label class="col-sm-6 control-label" for="input-custom-class-child"><span data-toggle="tooltip" title="<?php echo $help_custom_cls_child; ?>"><?php echo $entry_custom_cls_child; ?></span></label>
										<div class="col-sm-5 input-group">
											<input type="text" name="categoryaccordionmenu_custom_cls_child" value="<?php echo $categoryaccordionmenu_custom_cls_child; ?>" placeholder="<?php echo $entry_custom_cls_child; ?>" id="input-custom-class-child" class="form-control" />
										</div>
									</div>
									<!-- Custom/Extra Class for Child Category END -->
								</div>
							</div>
							<!-- Custom/Extra Class Settings END-->
							
						</div>
						<!-- Collapse/Expand-RTL-Custom Class Settings END-->
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<style>
.fontawesome-select {font-family: 'FontAwesome', 'Helvetica';}
.fontawesome-select > option { border-bottom: 1px solid #CCCCCC; font-size: 15px; padding: 8px 4px; }
.categoryaccordion .panel-default, .categoryaccordion .panel-heading { border-color: #008080; }
.categoryaccordion .panel-default, .categoryaccordion .panel-heading { border-color: #008080; }
.categoryaccordion .panel-heading h3 { color: #800080; }
</style>
<script>
$(function(){
	$('.color-pick').colorpicker({format: 'hex'});
});
</script>
<?php echo $footer; ?>