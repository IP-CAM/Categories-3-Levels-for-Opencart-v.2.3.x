<div id="outer-wrap">
  	<!-- Category Accordion Menu Navigation -->
	<nav class="mainNav">
		<ul class="<?php if(isset($fm_custom_class_parent)) echo $fm_custom_class_parent; ?>">
			<?php foreach ($categories as $category) { ?>
				<?php if ($category['category_id'] == $category_id) { ?>
						<li class="selected"><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?> <?php if($fm_main_icon_display) echo "<i class='fa ". $fm_main_icon ." '></i>"; ?></a>
							<?php if ($category['children']) { ?>
								<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
									<?php foreach ($category['children'] as $child) { ?>
										<?php if ($child['category_id'] == $child_id) { ?>
											<li class="selected" class="1stlevel"><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
												<?php if ($child['children_2']) { ?>
													<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
														<?php foreach ($child['children_2'] as $child_2) { ?>
															<?php if ($child_2['category_id'] == $child_2_id) { ?>
																<li class="selected" class="2ndlevel"><a href="<?php echo $child_2['href']; ?>"><?php echo $child_2['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																	<?php if($child_2['children_3']) { ?>
																	<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																		<?php foreach ($child_2['children_3'] as $child_3) { ?>
																			<?php if ($child_3['category_id'] == $child_3_id) { ?>
																				<li class="selected" class="3rdlevel"><a href="<?php echo $child_3['href']; ?>"><?php echo $child_3['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																					<?php if($child_3['children_4']) { ?>
																						<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																							<?php foreach ($child_3['children_4'] as $child_4) { ?>
																								<?php if ($child_4['category_id'] == $child_4_id) { ?>
																									<li class="selected" class="4thlevel"><a href="<?php echo $child_4['href']; ?>"><?php echo $child_4['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																										<?php if($child_4['children_5']) { ?>
																											<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																												<?php foreach ($child_4['children_5'] as $child_5) { ?>
																													<?php if ($child_5['category_id'] == $child_5_id) { ?>
																														<li class="selected" class="5thlevel"><a href="<?php echo $child_5['href']; ?>"><?php echo $child_5['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a></li>
																													<?php } else { ?>
																														<li class="5thlevel"><a href="<?php echo $child_5['href']; ?>"><?php echo $child_5['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a></li>
																													<?php } ?>
																												<?php } ?>
																											</ul>
																										<?php }  ?>
																									</li>
																								<?php } else { ?>
																									<li class="4thlevel"><a href="<?php echo $child_4['href']; ?>"><?php echo $child_4['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																										<?php if($child_4['children_5']) { ?>
																											<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																												<?php foreach ($child_4['children_5'] as $child_5) { ?>
																													<?php if ($child_5['category_id'] == $child_5_id) { ?>
																														<li class="selected" class="5thlevel"><a href="<?php echo $child_5['href']; ?>"><?php echo $child_5['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a></li>
																													<?php } else { ?>
																														<li class="5thlevel"><a href="<?php echo $child_5['href']; ?>"><?php echo $child_5['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a></li>
																													<?php } ?>
																												<?php } ?>
																											</ul>
																										<?php } ?>
																									</li>
																								<?php } ?>
																							<?php } ?>
																						</ul>
																					<?php } ?>
																				</li>
																			<?php } else { ?>
																				<li class="3rdlevel"><a href="<?php echo $child_3['href']; ?>"><?php echo $child_3['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																					<?php if($child_3['children_4']) { ?>
																						<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																							<?php foreach ($child_3['children_4'] as $child_4) { ?>
																								<li class="4thlevel"><a href="<?php echo $child_4['href']; ?>"><?php echo $child_4['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																									<?php if($child_4['children_5']) { ?>
																										<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																											<?php foreach ($child_4['children_5'] as $child_5) { ?>
																												<li class="5thlevel"><a href="<?php echo $child_5['href']; ?>"><?php echo $child_5['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a></li>
																											<?php } ?>
																										</ul>
																									<?php } ?>
																								</li>
																							<?php } ?>
																						</ul>
																					<?php } ?>
																				</li>
																			<?php } ?>
																		<?php } ?>
																	</ul>
																	<?php } ?>
																</li>
															<?php } else { ?>
																<li class="2ndlevel"><a href="<?php echo $child_2['href']; ?>"><?php echo $child_2['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																	<?php if($child_2['children_3']) { ?>
																		<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																			<?php foreach ($child_2['children_3'] as $child_3) { ?>
																				<li class="3rdlevel"><a href="<?php echo $child_3['href']; ?>"><?php echo $child_3['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																					<?php if($child_3['children_4']) { ?>
																						<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																							<?php foreach ($child_3['children_4'] as $child_4) { ?>
																								<li class="4thlevel"><a href="<?php echo $child_4['href']; ?>"><?php echo $child_4['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																									<?php if($child_4['children_5']) { ?>
																										<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																											<?php foreach ($child_4['children_5'] as $child_5) { ?>
																												<li class="5thlevel"><a href="<?php echo $child_5['href']; ?>"><?php echo $child_5['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a></li>
																											<?php } ?>
																										</ul>
																									<?php } ?>
																								</li>
																							<?php } ?>
																						</ul>
																					<?php } ?>
																				</li>
																			<?php } ?>
																		</ul>
																	<?php } ?>
																</li>
															<?php } ?>
														<?php } ?>
													</ul>
												<?php } ?>
											</li>
										<?php } else { ?>
											<li class="1stlevel"><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
												<?php if ($child['children_2']) { ?>
													<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
														<?php foreach ($child['children_2'] as $child_2) { ?>
															<li class="2ndlevel"><a href="<?php echo $child_2['href']; ?>"><?php echo $child_2['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																<?php if($child_2['children_3']) { ?>
																<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																	<?php foreach ($child_2['children_3'] as $child_3) { ?>
																		<li class="3rdlevel"><a href="<?php echo $child_3['href']; ?>"><?php echo $child_3['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																			<?php if($child_3['children_4']) { ?>
																				<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																					<?php foreach ($child_3['children_4'] as $child_4) { ?>
																						<li class="4thlevel"><a href="<?php echo $child_4['href']; ?>"><?php echo $child_4['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																							<?php if($child_4['children_5']) { ?>
																								<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																									<?php foreach ($child_4['children_5'] as $child_5) { ?>
																										<li class="5thlevel"><a href="<?php echo $child_5['href']; ?>"><?php echo $child_5['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a></li>
																									<?php } ?>
																								</ul>
																							<?php } ?>
																						</li>
																					<?php } ?>
																				</ul>
																			<?php } ?>
																		</li>
																	<?php } ?>
																</ul>
																<?php } ?>
															</li>
														<?php } ?>
													</ul>
												<?php } ?>
											</li>
										<?php } ?>
									<?php } ?>
								</ul>
							<?php } ?>			
						</li>
					<?php } else { ?>
						<li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?> <?php if($fm_main_icon_display) echo "<i class='fa ". $fm_main_icon ." '></i>"; ?></a>
							<?php if ($category['children']) { ?>
								<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
									<?php foreach ($category['children'] as $child) { ?>
										<li class="1stlevel"><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
											<?php if ($child['children_2']) { ?>
												<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
													<?php foreach ($child['children_2'] as $child_2) { ?>
														<li class="2ndlevel"><a href="<?php echo $child_2['href']; ?>"><?php echo $child_2['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
															<?php if($child_2['children_3']) { ?>
																<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																	<?php foreach ($child_2['children_3'] as $child_3) { ?>
																		<li class="3rdlevel"><a href="<?php echo $child_3['href']; ?>"><?php echo $child_3['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																			<?php if($child_3['children_4']) { ?>
																				<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																					<?php foreach ($child_3['children_4'] as $child_4) { ?>
																						<li class="4thlevel"><a href="<?php echo $child_4['href']; ?>"><?php echo $child_4['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a>
																							<?php if($child_4['children_5']) { ?>
																								<ul class="<?php if(isset($fm_custom_class_child)) echo $fm_custom_class_child; ?>">
																									<?php foreach ($child_4['children_5'] as $child_5) { ?>
																										<li class="5thlevel"><a href="<?php echo $child_5['href']; ?>"><?php echo $child_5['name']; ?> <?php if($fm_child_icon_display) echo "<i class='fa ". $fm_child_icon ." '></i>"; ?></a></li>
																									<?php } ?>
																								</ul>
																							<?php } ?>
																						</li>
																					<?php } ?>
																				</ul>
																			<?php } ?>
																		</li>
																	<?php } ?>
																</ul>
															<?php } ?>
														</li>
													<?php } ?>
												</ul>
											<?php } ?>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</li>
					<?php } ?>
			<?php } ?>		
		</ul>
	</nav>

</div>
<style type="text/css">
	/*-----------------------------------------------*
				Category Accrodion Menu 
	*-----------------------------------------------*/
	.mainNav {background: #222;width: 100%;}
	.mainNav ul {margin: 0; padding: 0; list-style: none; /*border-bottom: 1px solid #444*/ }
	.mainNav ul li { border-top: 1px solid #444; background: <?php echo $main_bg = $fm_main_bg_color ? $fm_main_bg_color : '#222'; ?>; }
	.mainNav ul li a { color: <?php echo $main_txt_color = $fm_main_txt_color ? $fm_main_txt_color : '#fff'; ?>; display: block; font-size: <?php echo $main_txt_size = $fm_main_txt_size ? $fm_main_txt_size : '12'; ?>px; font-family: Verdana; line-height: normal; padding:<?php echo $main_padding_top = $fm_main_padding_top ? $fm_main_padding_top : '8'; ?>px  <?php echo $main_padding_right = $fm_main_padding_right ? $fm_main_padding_right : '10'; ?>px  <?php echo $main_padding_bottom = $fm_main_padding_bottom ? $fm_main_padding_bottom : '8'; ?>px <?php echo $main_padding_left = $fm_main_padding_left ? $fm_main_padding_left : '10'; ?>px; text-decoration:none; }
	.mainNav ul li a:hover { background: <?php echo $main_bg_hover = $fm_main_hover_color ? $fm_main_hover_color : '#333'; ?>; text-decoration: none;}
	.mainNav .selected > a { background: <?php echo $main_bg_selected = $fm_main_hover_color ? $fm_main_hover_color : '#333'; ?>; }
	.mainNav ul li a i { color: <?php echo $main_icon_color = $fm_main_icon_color ? $fm_main_icon_color : '#fff'; ?>; font-size: <?php echo $main_icon_size = $fm_main_icon_size ? $fm_main_icon_size : '14'; ?>px; padding: 4px; }
	.mainNav ul li ul li a i { color: <?php echo $child_icon_color = $fm_child_icon_color ? $fm_child_icon_color : '#fff'; ?>; font-size: <?php echo $child_icon_size = $fm_child_icon_size ? $fm_child_icon_size : '14'; ?>px; }
	.accordion-btn i { color: <?php echo $cebtn_icon_color = $fm_cebtn_icon_color ? $fm_cebtn_icon_color : '#fff'; ?>; font-size: <?php echo $cebtn_icon_size = $fm_cebtn_icon_size ? $fm_cebtn_icon_size : '14'; ?>px; }
	
	.mainNav ul ul { /*border-bottom: none;*/ }
	.mainNav ul ul li { border-top: 1px solid #222; background: <?php echo $child_bg = $fm_child_bg_color ? $fm_child_bg_color : '#111'; ?>; }
	.mainNav ul ul li a { color: <?php echo $child_txt_color = $fm_child_txt_color ? $fm_child_txt_color : '#fff'; ?>; display: block; font-size: <?php echo $child_txt_size = $fm_child_txt_size ? $fm_child_txt_size : '12'; ?>px; line-height: normal; padding: <?php echo $child_padding_top = $fm_child_padding_top ? $fm_child_padding_top : '8'; ?>px <?php echo $child_padding_right = $fm_child_padding_right ? $fm_child_padding_right : '10'; ?>px <?php echo $child_padding_bottom = $fm_child_padding_bottom ? $fm_child_padding_bottom : '8'; ?>px <?php echo $child_padding_left = $fm_child_padding_left ? $fm_child_padding_left : '35'; ?>px; }
	.mainNav ul ul li a:hover { background: <?php echo $child_bg_hover = $fm_child_hover_color ? $fm_child_hover_color : '#333'; ?>; }
	
	.mainNav ul ul ul { /*border-top:1px solid #222;*/ }
	.mainNav ul ul ul li { /*border:none;*/ }
	.mainNav ul ul ul li a { padding: <?php echo $child_padding_top = $fm_child_padding_top ? $fm_child_padding_top : '8'; ?>px <?php echo $child_padding_right = $fm_child_padding_right ? $fm_child_padding_right : '10'; ?>px <?php echo $child_padding_bottom = $fm_child_padding_bottom ? $fm_child_padding_bottom : '8'; ?>px <?php echo $child_padding_left = $fm_child_padding_left ? $fm_child_padding_left : '35'; ?>px; }
	.mainNav ul li { text-align: right;}
	
	/* Accordion Button */
	ul li.has-subnav .accordion-btn { color:#fff; background:rgba(255,255,255, 0.15); font-size:16px; }
	
	@media screen and (max-width: 700px) {
		.mainNav {width: 100%;}
	}
</style>

<script type="text/javascript">
	jQuery(document).ready(function(){
		//Accordion
		jQuery('.mainNav').navAccordion({
			expandButtonText: "<i class='fa <?php if(isset($fm_ebtn_icon)) echo $fm_ebtn_icon; else echo 'fa-plus'; ?>'></i>", 
			collapseButtonText: "<i class='fa <?php if(isset($fm_cbtn_icon)) echo $fm_cbtn_icon; else echo 'fa-minus'; ?>'></i>",
			buttonPosition: "left",
			slideSpeed: "slow",
			headersOnly: false,
			headersOnlyCheck: false,
		}); 
	});
</script>