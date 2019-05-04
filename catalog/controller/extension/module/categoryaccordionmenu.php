<?php
class ControllerExtensionModuleCategoryAccordionMenu extends Controller {
	public function index() {
		$this->load->language('extension/module/categoryaccordionmenu');

		$data['heading_title'] = $this->language->get('heading_title');
		
		$this->document->addScript('catalog/view/javascript/jquery/categoryaccrodionmenu/Accordion.min.js');

		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}

		if (isset($parts[0])) {
			$data['category_id'] = $parts[0];
		} else {
			$data['category_id'] = 0;
		}

		if (isset($parts[1])) {
			$data['child_id'] = $parts[1];
		} else {
			$data['child_id'] = 0;
		}
		
		if (isset($parts[2])) {
			$data['child_2_id'] = $parts[2];
		} else {
			$data['child_2_id'] = 0;
		}
		
		if (isset($parts[3])) {
			$data['child_3_id'] = $parts[3];
		} else {
			$data['child_3_id'] = 0;
		}
		
		if (isset($parts[4])) {
			$data['child_4_id'] = $parts[4];
		} else {
			$data['child_4_id'] = 0;
		}
		
		if (isset($parts[5])) {
			$data['child_5_id'] = $parts[5];
		} else {
			$data['child_5_id'] = 0;
		}

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
				$children_data = array();
				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach($children as $child) {
				
					$children_data_2 = array();
					$children_2 = $this->model_catalog_category->getCategories($child['category_id']);
					
					foreach($children_2 as $child_2) {
					
						$children_data_3 = array();
						$children_3 = $this->model_catalog_category->getCategories($child_2['category_id']);
						
						foreach($children_3 as $child_3) {
						
							$children_data_4 = array();
							$children_4 = $this->model_catalog_category->getCategories($child_3['category_id']);
							
							foreach($children_4 as $child_4) {
							
								$children_data_5 = array();
								$children_5 = $this->model_catalog_category->getCategories($child_4['category_id']);
								
								foreach($children_5 as $child_5) {
									
									$filter_data_5 = array('filter_category_id' => $child_5['category_id'], 'filter_sub_category' => true);
								
									//Sub-Sub-Sub-Sub-Sub Category - 5th Level
									$children_data_5[] = array(
										'category_id' => $child_5['category_id'],
										'name' => $child_5['name'],
										'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] . '_' . $child_2['category_id'] . '_' . $child_3['category_id'] . '_' . $child_4['category_id'] . '_' . $child_5['category_id'])
									);
								
								}
								
								$filter_data_4 = array('filter_category_id' => $child_4['category_id'], 'filter_sub_category' => true);
								
								//Sub-Sub-Sub-Sub Category - 4th Level
								$children_data_4[] = array(
									'category_id' => $child_4['category_id'],
									'name' => $child_4['name'],
									'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] . '_' . $child_2['category_id'] . '_' . $child_3['category_id'] . '_' . $child_4['category_id']),
									'children_5'  => $children_data_5
								);
								
							}
							
							$filter_data_3 = array('filter_category_id' => $child_3['category_id'], 'filter_sub_category' => true);
						
							//Sub-Sub-Sub Category - 3rd Level
							$children_data_3[] = array(
								'category_id' => $child_3['category_id'],
								'name' => $child_3['name'],
								'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] . '_' . $child_2['category_id'] . '_' . $child_3['category_id']),
								'children_4'  => $children_data_4
							);
							
						}
						
						$filter_data_2 = array('filter_category_id' => $child_2['category_id'], 'filter_sub_category' => true);
						
						//Sub-Sub Category - 2nd Level
						$children_data_2[] = array(
							'category_id' => $child_2['category_id'],
							'name' => $child_2['name'],
							'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] . '_' . $child_2['category_id']),
							'children_3'  => $children_data_3
						);
					}
					
					$filter_data = array('filter_category_id' => $child['category_id'], 'filter_sub_category' => true);
					
					//Sub-Category - 1st Level
					$children_data[] = array(
						'category_id' => $child['category_id'],
						'name' => $child['name'],
						'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id']),
						'children_2'  => $children_data_2
					);
				}
			//}

			$filter_data = array(
				'filter_category_id'  => $category['category_id'],
				'filter_sub_category' => true
			);
			
			//Main Category - 0th Level
			$data['categories'][] = array(
				'category_id' => $category['category_id'],
				'name'        => $category['name'],
				'children'    => $children_data,
				'href'        => $this->url->link('product/category', 'path=' . $category['category_id'])
			);
		}


		/* Main Category Settings START */
		$data['fm_main_bg_color'] = $this->config->get('categoryaccordionmenu_fm_main_bg_color');
		$data['fm_main_hover_color'] = $this->config->get('categoryaccordionmenu_fm_main_hover_color');
		$data['fm_main_txt_color'] = $this->config->get('categoryaccordionmenu_fm_main_txt_color');
		$data['fm_main_txt_size'] = $this->config->get('categoryaccordionmenu_fm_main_txt_size');
		$data['fm_main_icon_display'] = $this->config->get('categoryaccordionmenu_fm_main_icon_display');
		$data['fm_main_icon'] = $this->config->get('categoryaccordionmenu_fm_main_icon');
		$data['fm_main_icon_color'] = $this->config->get('categoryaccordionmenu_fm_main_icon_color');
		$data['fm_main_icon_size'] = $this->config->get('categoryaccordionmenu_fm_main_icon_size');
		$data['fm_main_padding_top'] = $this->config->get('categoryaccordionmenu_fm_main_padding_top');
		$data['fm_main_padding_right'] = $this->config->get('categoryaccordionmenu_fm_main_padding_right');
		$data['fm_main_padding_bottom'] = $this->config->get('categoryaccordionmenu_fm_main_padding_bottom');
		$data['fm_main_padding_left'] = $this->config->get('categoryaccordionmenu_fm_main_padding_left');
		/* Main Category Settings END */ 
		
		/* Child Category Settings START */
		$data['fm_child_bg_color'] = $this->config->get('categoryaccordionmenu_fm_child_bg_color');
		$data['fm_child_hover_color'] = $this->config->get('categoryaccordionmenu_fm_child_hover_color');
		$data['fm_child_txt_color'] = $this->config->get('categoryaccordionmenu_fm_child_txt_color');
		$data['fm_child_txt_size'] = $this->config->get('categoryaccordionmenu_fm_child_txt_size');
		$data['fm_child_icon_display'] = $this->config->get('categoryaccordionmenu_fm_child_icon_display');
		$data['fm_child_icon'] = $this->config->get('categoryaccordionmenu_fm_child_icon');
		$data['fm_child_icon_color'] = $this->config->get('categoryaccordionmenu_fm_child_icon_color');
		$data['fm_child_icon_size'] = $this->config->get('categoryaccordionmenu_fm_child_icon_size');
		$data['fm_child_padding_top'] = $this->config->get('categoryaccordionmenu_fm_child_padding_top');
		$data['fm_child_padding_right'] = $this->config->get('categoryaccordionmenu_fm_child_padding_right');
		$data['fm_child_padding_bottom'] = $this->config->get('categoryaccordionmenu_fm_child_padding_bottom');
		$data['fm_child_padding_left'] = $this->config->get('categoryaccordionmenu_fm_child_padding_left');
		/* Child Category Settings END */
		
		/* Collaps/Expand Settings START */
		$data['fm_cebtn_icon_color'] = $this->config->get('categoryaccordionmenu_fm_cebtn_icon_color');
		$data['fm_cbtn_icon'] = $this->config->get('categoryaccordionmenu_fm_cbtn_icon');
		$data['fm_ebtn_icon'] = $this->config->get('categoryaccordionmenu_fm_ebtn_icon');
		$data['fm_cebtn_icon_size'] = $this->config->get('categoryaccordionmenu_fm_cebtn_icon_size');
		/* Collaps/Expand Settings END */
		
		/* Custom/Extra Class Settings START */
		$data['fm_custom_class_parent'] = $this->config->get('categoryaccordionmenu_custom_cls_parent');
		$data['fm_custom_class_child'] = $this->config->get('categoryaccordionmenu_custom_cls_child');
		/* Custom/Extra Class Settings END */
		
		/* RTL Language Settings START */
		$data['fm_rtl'] = $this->config->get('categoryaccordionmenu_rtl');
		/* RTL Language Settings END */
		
		if ($data['fm_rtl'] == 1) {
			return $this->load->view('extension/module/categoryaccordionmenu_rtl', $data);
		} else {
			return $this->load->view('extension/module/categoryaccordionmenu', $data);
		}
	}
}