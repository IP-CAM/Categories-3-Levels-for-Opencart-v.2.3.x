<?php
class ControllerExtensionModuleCategoryAccordionMenu extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/categoryaccordionmenu');

		$this->document->setTitle($this->language->get('title'));

		$this->load->model('setting/setting');
		
		$this->load->model('setting/store');
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', 'SSL'));
		}
		

		$data['heading_title'] 				= $this->language->get('heading_title');
		$data['heading_module_title'] 		= $this->language->get('heading_module_title');
		$data['text_edit'] 					= $this->language->get('text_edit');
		$data['text_enabled'] 				= $this->language->get('text_enabled');
		$data['text_disabled'] 				= $this->language->get('text_disabled');
		$data['text_yes'] 					= $this->language->get('text_yes');
		$data['text_no'] 					= $this->language->get('text_no');
		$data['entry_status'] 				= $this->language->get('entry_status');
		$data['text_list'] 					= $this->language->get('text_list');
		$data['text_edit_btn'] 				= $this->language->get('text_edit_btn');
		$data['text_no_results'] 			= $this->language->get('text_no_results');
		$data['column_name'] 				= $this->language->get('column_name');
		$data['column_url'] 				= $this->language->get('column_url');
		$data['column_action'] 				= $this->language->get('column_action');
		$data['button_save'] 				= $this->language->get('button_save');
		$data['button_cancel'] 				= $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/categoryaccordionmenu', 'token=' . $this->session->data['token'], true)
		);


		$data['action'] = $this->url->link('extension/module/categoryaccordionmenu', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);
		
		/* Multi-Store List START */
		$data['stores'] = array();

		$data['stores'][] = array(
			'store_id' => 0,
			'name'     => $this->config->get('config_name') . $this->language->get('text_default'),
			'url'      => HTTP_CATALOG,
			'edit'     => $this->url->link('extension/module/categoryaccordionmenu/setting', 'token=' . $this->session->data['token']  . '&type=module',  'SSL')
		);

		$results = $this->model_setting_store->getStores();

		foreach ($results as $result) {
			$data['stores'][] = array(
				'store_id' => $result['store_id'],
				'name'     => $result['name'],
				'url'      => $result['url'],
				'edit'     => $this->url->link('module/categoryaccordionmenu/setting_store', 'token=' . $this->session->data['token'] . '&store_id=' . $result['store_id'] . '&type=module', 'SSL')
			);
		}
		/* Multi-Store List END */
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/categoryaccordionmenu', $data));
	}
	
	public function setting() {
		$this->load->language('extension/module/categoryaccordionmenu');

		$this->document->setTitle($this->language->get('title'));

		$this->load->model('setting/setting');
		
		$this->document->addStyle('view/javascript/jquery/categoryaccrodionmenu/bootstrap-colorpicker.min.css');
		$this->document->addScript('view/javascript/jquery/categoryaccrodionmenu/bootstrap-colorpicker.min.js');
		
		
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			
			$this->model_setting_setting->editSetting('categoryaccordionmenu', $this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/categoryaccordionmenu', 'token=' . $this->session->data['token'] . '&type=module', 'SSL'));
		}
		
		$data['heading_title'] 				= $this->language->get('heading_title');
		$data['heading_module_title'] 		= $this->language->get('heading_module_title');

		$data['text_edit'] 					= $this->language->get('text_edit');
		$data['text_enabled'] 				= $this->language->get('text_enabled');
		$data['text_disabled'] 				= $this->language->get('text_disabled');
		$data['text_yes'] 					= $this->language->get('text_yes');
		$data['text_no'] 					= $this->language->get('text_no');

		$data['entry_status'] 				= $this->language->get('entry_status');
		$data['entry_pre_define'] 			= $this->language->get('entry_pre_define');
		$data['entry_main_bg_color'] 		= $this->language->get('entry_main_bg_color');
		$data['entry_main_hover_color']		= $this->language->get('entry_main_hover_color');
		$data['entry_main_txt_color'] 		= $this->language->get('entry_main_txt_color');
		$data['entry_main_txt_size'] 		= $this->language->get('entry_main_txt_size');
		$data['entry_main_icon_display'] 	= $this->language->get('entry_main_icon_display');
		$data['entry_main_icon'] 			= $this->language->get('entry_main_icon');
		$data['entry_main_icon_color'] 		= $this->language->get('entry_main_icon_color');
		$data['entry_main_icon_size'] 		= $this->language->get('entry_main_icon_size');
		$data['entry_main_padding'] 		= $this->language->get('entry_main_padding');
		$data['entry_padding_top'] 			= $this->language->get('entry_padding_top');
		$data['entry_padding_right'] 		= $this->language->get('entry_padding_right');
		$data['entry_padding_bottom']		= $this->language->get('entry_padding_bottom');
		$data['entry_padding_left'] 		= $this->language->get('entry_padding_left');
		
		$data['entry_child_bg_color'] 		= $this->language->get('entry_child_bg_color');
		$data['entry_child_hover_color'] 	= $this->language->get('entry_child_hover_color');
		$data['entry_child_txt_color'] 		= $this->language->get('entry_child_txt_color');
		$data['entry_child_txt_size'] 		= $this->language->get('entry_child_txt_size');
		$data['entry_child_icon_display'] 	= $this->language->get('entry_child_icon_display');
		$data['entry_child_icon'] 			= $this->language->get('entry_child_icon');
		$data['entry_child_icon_color'] 	= $this->language->get('entry_child_icon_color');
		$data['entry_child_icon_size'] 		= $this->language->get('entry_child_icon_size');
		$data['entry_child_padding'] 		= $this->language->get('entry_child_padding');
		
		$data['entry_cebtn_bg_color'] 		= $this->language->get('entry_cebtn_bg_color');
		$data['entry_cebtn_hover_color'] 	= $this->language->get('entry_cebtn_hover_color');
		$data['entry_cebtn_icon_color'] 	= $this->language->get('entry_cebtn_icon_color');
		$data['entry_cebtn_icon_size'] 		= $this->language->get('entry_cebtn_icon_size');
		$data['entry_cbtn_icon'] 			= $this->language->get('entry_cbtn_icon');
		$data['entry_ebtn_icon'] 			= $this->language->get('entry_ebtn_icon');
		
		$data['entry_custom_cls_parent'] 	= $this->language->get('entry_custom_cls_parent');
		$data['entry_custom_cls_child'] 	= $this->language->get('entry_custom_cls_child');
		$data['entry_rtl'] 					= $this->language->get('entry_rtl');
		
		$data['help_main_bg_color'] 		= $this->language->get('help_main_bg_color');
		$data['help_main_hover_color'] 		= $this->language->get('help_main_hover_color');
		$data['help_main_txt_color'] 		= $this->language->get('help_main_txt_color');
		$data['help_main_txt_size'] 		= $this->language->get('help_main_txt_size');
		$data['help_main_icon_display']		= $this->language->get('help_main_icon_display');
		$data['help_main_icon'] 			= $this->language->get('help_main_icon');
		$data['help_main_icon_color'] 		= $this->language->get('help_main_icon_color');
		$data['help_main_icon_size'] 		= $this->language->get('help_main_icon_size');
		$data['help_main_padding'] 			= $this->language->get('help_main_padding');
		
		$data['help_child_bg_color'] 		= $this->language->get('help_child_bg_color');
		$data['help_child_hover_color'] 	= $this->language->get('help_child_hover_color');
		$data['help_child_txt_color'] 		= $this->language->get('help_child_txt_color');
		$data['help_child_txt_size'] 		= $this->language->get('help_child_txt_size');
		$data['help_child_icon_display'] 	= $this->language->get('help_child_icon_display');
		$data['help_child_icon'] 			= $this->language->get('help_child_icon');
		$data['help_child_icon_color'] 		= $this->language->get('help_child_icon_color');
		$data['help_child_icon_size'] 		= $this->language->get('help_child_icon_size');
		$data['help_child_padding'] 		= $this->language->get('help_child_padding');
		
		$data['help_cebtn_bg_color'] 		= $this->language->get('help_cebtn_bg_color');
		$data['help_cebtn_hover_color'] 	= $this->language->get('help_cebtn_hover_color');
		$data['help_cebtn_icon_color'] 		= $this->language->get('help_cebtn_icon_color');
		$data['help_cebtn_icon_size'] 		= $this->language->get('help_cebtn_icon_size');
		$data['help_cbtn_icon'] 			= $this->language->get('help_cbtn_icon');
		$data['help_ebtn_icon'] 			= $this->language->get('help_ebtn_icon');
		
		$data['help_custom_cls_parent'] 	= $this->language->get('help_custom_cls_parent');
		$data['help_custom_cls_child'] 		= $this->language->get('help_custom_cls_child');
		$data['help_rtl'] 					= $this->language->get('help_rtl');

		$data['button_save'] 				= $this->language->get('button_save');
		$data['button_cancel'] 				= $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);
		
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/categoryaccordionmenu/setting', 'token=' . $this->session->data['token'], true)
		);

		
		$data['action'] = $this->url->link('extension/module/categoryaccordionmenu/setting', 'token=' . $this->session->data['token'], 'SSL');
		
		$data['cancel'] = $this->url->link('extension/module/categoryaccordionmenu', 'token=' . $this->session->data['token'] . '&type=module', true);
		
		
		$data['font_awesome_icon'] = array( 'fa-glass' => '&#xf000', 'fa-music' => '&#xf001', 'fa-search' => '&#xf002', 'fa-envelope-o' => '&#xf003', 'fa-heart' => '&#xf004', 'fa-star' => '&#xf005', 'fa-star-o' => '&#xf006', 'fa-user' => '&#xf007', 'fa-film' => '&#xf008', 'fa-th-large' => '&#xf009', 'fa-th' => '&#xf00a', 'fa-th-list' => '&#xf00b', 'fa-check' => '&#xf00c', 'fa-times' => '&#xf00d', 'fa-search-plus' => '&#xf00e', 'fa-search-minus' => '&#xf010', 'fa-power-off' => '&#xf011', 'fa-signal' => '&#xf012', 'fa-cog' => '&#xf013', 'fa-trash-o' => '&#xf014', 'fa-home' => '&#xf015', 'fa-file-o' => '&#xf016', 'fa-clock-o' => '&#xf017', 'fa-road' => '&#xf018', 'fa-download' => '&#xf019', 'fa-arrow-circle-o-down' => '&#xf01a', 'fa-arrow-circle-o-up' => '&#xf01b', 'fa-inbox' => '&#xf01c', 'fa-play-circle-o' => '&#xf01d', 'fa-repeat' => '&#xf01e', 'fa-refresh' => '&#xf021', 'fa-list-alt' => '&#xf022', 'fa-lock' => '&#xf023', 'fa-flag' => '&#xf024', 'fa-headphones' => '&#xf025', 'fa-volume-off' => '&#xf026', 'fa-volume-down' => '&#xf027', 'fa-volume-up' => '&#xf028', 'fa-qrcode' => '&#xf029', 'fa-barcode' => '&#xf02a', 'fa-tag' => '&#xf02b', 'fa-tags' => '&#xf02c', 'fa-book' => '&#xf02d', 'fa-bookmark' => '&#xf02e', 'fa-print' => '&#xf02f', 'fa-camera' => '&#xf030', 'fa-font' => '&#xf031', 'fa-bold' => '&#xf032', 'fa-italic' => '&#xf033', 'fa-text-height' => '&#xf034', 'fa-text-width' => '&#xf035', 'fa-align-left' => '&#xf036', 'fa-align-center' => '&#xf037', 'fa-align-right' => '&#xf038', 'fa-align-justify' => '&#xf039', 'fa-list' => '&#xf03a', 'fa-outdent' => '&#xf03b', 'fa-indent' => '&#xf03c', 'fa-video-camera' => '&#xf03d', 'fa-picture-o' => '&#xf03e', 'fa-pencil' => '&#xf040', 'fa-map-marker' => '&#xf041', 'fa-adjust' => '&#xf042', 'fa-tint' => '&#xf043', 'fa-pencil-square-o' => '&#xf044', 'fa-share-square-o' => '&#xf045', 'fa-check-square-o' => '&#xf046', 'fa-arrows' => '&#xf047', 'fa-step-backward' => '&#xf048', 'fa-fast-backward' => '&#xf049', 'fa-backward' => '&#xf04a', 'fa-play' => '&#xf04b', 'fa-pause' => '&#xf04c', 'fa-stop' => '&#xf04d', 'fa-forward' => '&#xf04e', 'fa-fast-forward' => '&#xf050', 'fa-step-forward' => '&#xf051', 'fa-eject' => '&#xf052', 'fa-chevron-left' => '&#xf053', 'fa-chevron-right' => '&#xf054', 'fa-plus-circle' => '&#xf055', 'fa-minus-circle' => '&#xf056', 'fa-times-circle' => '&#xf057', 'fa-check-circle' => '&#xf058', 'fa-question-circle' => '&#xf059', 'fa-info-circle' => '&#xf05a', 'fa-crosshairs' => '&#xf05b', 'fa-times-circle-o' => '&#xf05c', 'fa-check-circle-o' => '&#xf05d', 'fa-ban' => '&#xf05e', 'fa-arrow-left' => '&#xf060', 'fa-arrow-right' => '&#xf061', 'fa-arrow-up' => '&#xf062', 'fa-arrow-down' => '&#xf063', 'fa-share' => '&#xf064', 'fa-expand' => '&#xf065', 'fa-compress' => '&#xf066', 'fa-plus' => '&#xf067', 'fa-minus' => '&#xf068', 'fa-asterisk' => '&#xf069', 'fa-exclamation-circle' => '&#xf06a', 'fa-gift' => '&#xf06b', 'fa-leaf' => '&#xf06c', 'fa-fire' => '&#xf06d', 'fa-eye' => '&#xf06e', 'fa-eye-slash' => '&#xf070', 'fa-exclamation-triangle' => '&#xf071', 'fa-plane' => '&#xf072', 'fa-calendar' => '&#xf073', 'fa-random' => '&#xf074', 'fa-comment' => '&#xf075', 'fa-magnet' => '&#xf076', 'fa-chevron-up' => '&#xf077', 'fa-chevron-down' => '&#xf078', 'fa-retweet' => '&#xf079', 'fa-shopping-cart' => '&#xf07a', 'fa-folder' => '&#xf07b', 'fa-folder-open' => '&#xf07c', 'fa-arrows-v' => '&#xf07d', 'fa-arrows-h' => '&#xf07e', 'fa-bar-chart-o' => '&#xf080', 'fa-twitter-square' => '&#xf081', 'fa-facebook-square' => '&#xf082', 'fa-camera-retro' => '&#xf083', 'fa-key' => '&#xf084', 'fa-cogs' => '&#xf085', 'fa-comments' => '&#xf086', 'fa-thumbs-o-up' => '&#xf087', 'fa-thumbs-o-down' => '&#xf088', 'fa-star-half' => '&#xf089', 'fa-heart-o' => '&#xf08a', 'fa-sign-out' => '&#xf08b', 'fa-linkedin-square' => '&#xf08c', 'fa-thumb-tack' => '&#xf08d', 'fa-external-link' => '&#xf08e', 'fa-sign-in' => '&#xf090', 'fa-trophy' => '&#xf091', 'fa-github-square' => '&#xf092', 'fa-upload' => '&#xf093', 'fa-lemon-o' => '&#xf094', 'fa-phone' => '&#xf095', 'fa-square-o' => '&#xf096', 'fa-bookmark-o' => '&#xf097', 'fa-phone-square' => '&#xf098', 'fa-twitter' => '&#xf099', 'fa-facebook' => '&#xf09a', 'fa-github' => '&#xf09b', 'fa-unlock' => '&#xf09c', 'fa-credit-card' => '&#xf09d', 'fa-rss' => '&#xf09e', 'fa-hdd-o' => '&#xf0a0', 'fa-bullhorn' => '&#xf0a1', 'fa-bell' => '&#xf0f3', 'fa-certificate' => '&#xf0a3', 'fa-hand-o-right' => '&#xf0a4', 'fa-hand-o-left' => '&#xf0a5', 'fa-hand-o-up' => '&#xf0a6', 'fa-hand-o-down' => '&#xf0a7', 'fa-arrow-circle-left' => '&#xf0a8', 'fa-arrow-circle-right' => '&#xf0a9', 'fa-arrow-circle-up' => '&#xf0aa', 'fa-arrow-circle-down' => '&#xf0ab', 'fa-globe' => '&#xf0ac', 'fa-wrench' => '&#xf0ad', 'fa-tasks' => '&#xf0ae', 'fa-filter' => '&#xf0b0', 'fa-briefcase' => '&#xf0b1', 'fa-arrows-alt' => '&#xf0b2', 'fa-users' => '&#xf0c0', 'fa-link' => '&#xf0c1', 'fa-cloud' => '&#xf0c2', 'fa-flask' => '&#xf0c3', 'fa-scissors' => '&#xf0c4', 'fa-files-o' => '&#xf0c5', 'fa-paperclip' => '&#xf0c6', 'fa-floppy-o' => '&#xf0c7', 'fa-square' => '&#xf0c8', 'fa-bars' => '&#xf0c9', 'fa-list-ul' => '&#xf0ca', 'fa-list-ol' => '&#xf0cb', 'fa-strikethrough' => '&#xf0cc', 'fa-underline' => '&#xf0cd', 'fa-table' => '&#xf0ce', 'fa-magic' => '&#xf0d0', 'fa-truck' => '&#xf0d1', 'fa-pinterest' => '&#xf0d2', 'fa-pinterest-square' => '&#xf0d3', 'fa-google-plus-square' => '&#xf0d4', 'fa-google-plus' => '&#xf0d5', 'fa-money' => '&#xf0d6', 'fa-caret-down' => '&#xf0d7', 'fa-caret-up' => '&#xf0d8', 'fa-caret-left' => '&#xf0d9', 'fa-caret-right' => '&#xf0da', 'fa-columns' => '&#xf0db', 'fa-sort' => '&#xf0dc', 'fa-sort-desc' => '&#xf0dd', 'fa-sort-asc' => '&#xf0de', 'fa-envelope' => '&#xf0e0', 'fa-linkedin' => '&#xf0e1', 'fa-undo' => '&#xf0e2', 'fa-gavel' => '&#xf0e3', 'fa-tachometer' => '&#xf0e4', 'fa-comment-o' => '&#xf0e5', 'fa-comments-o' => '&#xf0e6', 'fa-bolt' => '&#xf0e7', 'fa-sitemap' => '&#xf0e8', 'fa-umbrella' => '&#xf0e9', 'fa-clipboard' => '&#xf0ea', 'fa-lightbulb-o' => '&#xf0eb', 'fa-exchange' => '&#xf0ec', 'fa-cloud-download' => '&#xf0ed', 'fa-cloud-upload' => '&#xf0ee', 'fa-user-md' => '&#xf0f0', 'fa-stethoscope' => '&#xf0f1', 'fa-suitcase' => '&#xf0f2', 'fa-bell-o' => '&#xf0a2', 'fa-coffee' => '&#xf0f4', 'fa-cutlery' => '&#xf0f5', 'fa-file-text-o' => '&#xf0f6', 'fa-building-o' => '&#xf0f7', 'fa-hospital-o' => '&#xf0f8', 'fa-ambulance' => '&#xf0f9', 'fa-medkit' => '&#xf0fa', 'fa-fighter-jet' => '&#xf0fb', 'fa-beer' => '&#xf0fc', 'fa-h-square' => '&#xf0fd', 'fa-plus-square' => '&#xf0fe', 'fa-angle-double-left' => '&#xf100', 'fa-angle-double-right' => '&#xf101', 'fa-angle-double-up' => '&#xf102', 'fa-angle-double-down' => '&#xf103', 'fa-angle-left' => '&#xf104', 'fa-angle-right' => '&#xf105', 'fa-angle-up' => '&#xf106', 'fa-angle-down' => '&#xf107', 'fa-desktop' => '&#xf108', 'fa-laptop' => '&#xf109', 'fa-tablet' => '&#xf10a', 'fa-mobile' => '&#xf10b', 'fa-circle-o' => '&#xf10c', 'fa-quote-left' => '&#xf10d', 'fa-quote-right' => '&#xf10e', 'fa-spinner' => '&#xf110', 'fa-circle' => '&#xf111', 'fa-reply' => '&#xf112', 'fa-github-alt' => '&#xf113', 'fa-folder-o' => '&#xf114', 'fa-folder-open-o' => '&#xf115', 'fa-smile-o' => '&#xf118', 'fa-frown-o' => '&#xf119', 'fa-meh-o' => '&#xf11a', 'fa-gamepad' => '&#xf11b', 'fa-keyboard-o' => '&#xf11c', 'fa-flag-o' => '&#xf11d', 'fa-flag-checkered' => '&#xf11e', 'fa-terminal' => '&#xf120', 'fa-code' => '&#xf121', 'fa-reply-all' => '&#xf122', 'fa-star-half-o' => '&#xf123', 'fa-location-arrow' => '&#xf124', 'fa-crop' => '&#xf125', 'fa-code-fork' => '&#xf126', 'fa-chain-broken' => '&#xf127', 'fa-question' => '&#xf128', 'fa-info' => '&#xf129', 'fa-exclamation' => '&#xf12a', 'fa-superscript' => '&#xf12b', 'fa-subscript' => '&#xf12c', 'fa-eraser' => '&#xf12d', 'fa-puzzle-piece' => '&#xf12e', 'fa-microphone' => '&#xf130', 'fa-microphone-slash' => '&#xf131', 'fa-shield' => '&#xf132', 'fa-calendar-o' => '&#xf133', 'fa-fire-extinguisher' => '&#xf134', 'fa-rocket' => '&#xf135', 'fa-maxcdn' => '&#xf136', 'fa-chevron-circle-left' => '&#xf137', 'fa-chevron-circle-right' => '&#xf138', 'fa-chevron-circle-up' => '&#xf139', 'fa-chevron-circle-down' => '&#xf13a', 'fa-html5' => '&#xf13b', 'fa-css3' => '&#xf13c', 'fa-anchor' => '&#xf13d', 'fa-unlock-alt' => '&#xf13e', 'fa-bullseye' => '&#xf140', 'fa-ellipsis-h' => '&#xf141', 'fa-ellipsis-v' => '&#xf142', 'fa-rss-square' => '&#xf143', 'fa-play-circle' => '&#xf144', 'fa-ticket' => '&#xf145', 'fa-minus-square' => '&#xf146', 'fa-minus-square-o' => '&#xf147', 'fa-level-up' => '&#xf148', 'fa-level-down' => '&#xf149', 'fa-check-square' => '&#xf14a', 'fa-pencil-square' => '&#xf14b', 'fa-external-link-square' => '&#xf14c', 'fa-share-square' => '&#xf14d', 'fa-compass' => '&#xf14e', 'fa-caret-square-o-down' => '&#xf150', 'fa-caret-square-o-up' => '&#xf151', 'fa-caret-square-o-right' => '&#xf152', 'fa-eur' => '&#xf153', 'fa-gbp' => '&#xf154', 'fa-usd' => '&#xf155', 'fa-inr' => '&#xf156', 'fa-jpy' => '&#xf157', 'fa-rub' => '&#xf158', 'fa-krw' => '&#xf159', 'fa-btc' => '&#xf15a', 'fa-file' => '&#xf15b', 'fa-file-text' => '&#xf15c', 'fa-sort-alpha-asc' => '&#xf15d', 'fa-sort-alpha-desc' => '&#xf15e', 'fa-sort-amount-asc' => '&#xf160', 'fa-sort-amount-desc' => '&#xf161', 'fa-sort-numeric-asc' => '&#xf162', 'fa-sort-numeric-desc' => '&#xf163', 'fa-thumbs-up' => '&#xf164', 'fa-thumbs-down' => '&#xf165', 'fa-youtube-square' => '&#xf166', 'fa-youtube' => '&#xf167', 'fa-xing' => '&#xf168', 'fa-xing-square' => '&#xf169', 'fa-youtube-play' => '&#xf16a', 'fa-dropbox' => '&#xf16b', 'fa-stack-overflow' => '&#xf16c', 'fa-instagram' => '&#xf16d', 'fa-flickr' => '&#xf16e', 'fa-adn' => '&#xf170', 'fa-bitbucket' => '&#xf171', 'fa-bitbucket-square' => '&#xf172', 'fa-tumblr' => '&#xf173', 'fa-tumblr-square' => '&#xf174', 'fa-long-arrow-down' => '&#xf175', 'fa-long-arrow-up' => '&#xf176', 'fa-long-arrow-left' => '&#xf177', 'fa-long-arrow-right' => '&#xf178', 'fa-apple' => '&#xf179', 'fa-windows' => '&#xf17a', 'fa-android' => '&#xf17b', 'fa-linux' => '&#xf17c', 'fa-dribbble' => '&#xf17d', 'fa-skype' => '&#xf17e', 'fa-foursquare' => '&#xf180', 'fa-trello' => '&#xf181', 'fa-female' => '&#xf182', 'fa-male' => '&#xf183', 'fa-gittip' => '&#xf184', 'fa-sun-o' => '&#xf185', 'fa-moon-o' => '&#xf186', 'fa-archive' => '&#xf187', 'fa-bug' => '&#xf188', 'fa-vk' => '&#xf189', 'fa-weibo' => '&#xf18a', 'fa-renren' => '&#xf18b', 'fa-pagelines' => '&#xf18c', 'fa-stack-exchange' => '&#xf18d', 'fa-arrow-circle-o-right' => '&#xf18e', 'fa-arrow-circle-o-left' => '&#xf190', 'fa-caret-square-o-left' => '&#xf191', 'fa-dot-circle-o' => '&#xf192', 'fa-wheelchair' => '&#xf193', 'fa-vimeo-square' => '&#xf194', 'fa-try' => '&#xf195', 'fa-plus-square-o' => '&#xf196', 'fa-space-shuttle' => '&#xf197', 'fa-slack' => '&#xf198', 'fa-envelope-square' => '&#xf199', 'fa-wordpress' => '&#xf19a', 'fa-openid' => '&#xf19b', 'fa-university' => '&#xf19c', 'fa-graduation-cap' => '&#xf19d', 'fa-yahoo' => '&#xf19e', 'fa-google' => '&#xf1a0', 'fa-reddit' => '&#xf1a1', 'fa-reddit-square' => '&#xf1a2', 'fa-stumbleupon-circle' => '&#xf1a3', 'fa-stumbleupon' => '&#xf1a4', 'fa-delicious' => '&#xf1a5', 'fa-digg' => '&#xf1a6', 'fa-pied-piper' => '&#xf1a7', 'fa-pied-piper-alt' => '&#xf1a8', 'fa-drupal' => '&#xf1a9', 'fa-joomla' => '&#xf1aa', 'fa-language' => '&#xf1ab', 'fa-fax' => '&#xf1ac', 'fa-building' => '&#xf1ad', 'fa-child' => '&#xf1ae', 'fa-paw' => '&#xf1b0', 'fa-spoon' => '&#xf1b1', 'fa-cube' => '&#xf1b2', 'fa-cubes' => '&#xf1b3', 'fa-behance' => '&#xf1b4', 'fa-behance-square' => '&#xf1b5', 'fa-steam' => '&#xf1b6', 'fa-steam-square' => '&#xf1b7', 'fa-recycle' => '&#xf1b8', 'fa-car' => '&#xf1b9', 'fa-taxi' => '&#xf1ba', 'fa-tree' => '&#xf1bb', 'fa-spotify' => '&#xf1bc', 'fa-deviantart' => '&#xf1bd', 'fa-soundcloud' => '&#xf1be', 'fa-database' => '&#xf1c0', 'fa-file-pdf-o' => '&#xf1c1', 'fa-file-word-o' => '&#xf1c2', 'fa-file-excel-o' => '&#xf1c3', 'fa-file-powerpoint-o' => '&#xf1c4', 'fa-file-image-o' => '&#xf1c5', 'fa-file-archive-o' => '&#xf1c6', 'fa-file-audio-o' => '&#xf1c7', 'fa-file-video-o' => '&#xf1c8', 'fa-file-code-o' => '&#xf1c9', 'fa-vine' => '&#xf1ca', 'fa-codepen' => '&#xf1cb', 'fa-jsfiddle' => '&#xf1cc', 'fa-life-ring' => '&#xf1cd', 'fa-circle-o-notch' => '&#xf1ce', 'fa-rebel' => '&#xf1d0', 'fa-empire' => '&#xf1d1', 'fa-git-square' => '&#xf1d2', 'fa-git' => '&#xf1d3', 'fa-hacker-news' => '&#xf1d4', 'fa-tencent-weibo' => '&#xf1d5', 'fa-qq' => '&#xf1d6', 'fa-weixin' => '&#xf1d7', 'fa-paper-plane' => '&#xf1d8', 'fa-paper-plane-o' => '&#xf1d9', 'fa-history' => '&#xf1da', 'fa-circle-thin' => '&#xf1db', 'fa-header' => '&#xf1dc', 'fa-paragraph' => '&#xf1dd', 'fa-sliders' => '&#xf1de', 'fa-share-alt' => '&#xf1e0', 'fa-share-alt-square' => '&#xf1e1', 'fa-bomb' => '&#xf1e2' );
		$data['awesome_icon'] = array_keys($data['font_awesome_icon']);
		
		if (isset($this->request->post['categoryaccordionmenu_status'])) {
			$data['categoryaccordionmenu_status'] = $this->request->post['categoryaccordionmenu_status'];
		} else {
			$data['categoryaccordionmenu_status'] = $this->config->get('categoryaccordionmenu_status');
		}
		
		/* Main Category Settings START */ 
		if (isset($this->request->post['categoryaccordionmenu_fm_main_bg_color'])) {
			$data['categoryaccordionmenu_fm_main_bg_color'] = $this->request->post['categoryaccordionmenu_fm_main_bg_color'];
		} else {
			$data['categoryaccordionmenu_fm_main_bg_color'] = $this->config->get('categoryaccordionmenu_fm_main_bg_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_hover_color'])) {
			$data['categoryaccordionmenu_fm_main_hover_color'] = $this->request->post['categoryaccordionmenu_fm_main_hover_color'];
		} else {
			$data['categoryaccordionmenu_fm_main_hover_color'] = $this->config->get('categoryaccordionmenu_fm_main_hover_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_txt_color'])) {
			$data['categoryaccordionmenu_fm_main_txt_color'] = $this->request->post['categoryaccordionmenu_fm_main_txt_color'];
		} else {
			$data['categoryaccordionmenu_fm_main_txt_color'] = $this->config->get('categoryaccordionmenu_fm_main_txt_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_txt_size'])) {
			$data['categoryaccordionmenu_fm_main_txt_size'] = $this->request->post['categoryaccordionmenu_fm_main_txt_size'];
		} else {
			$data['categoryaccordionmenu_fm_main_txt_size'] = $this->config->get('categoryaccordionmenu_fm_main_txt_size');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_icon_display'])) {
			$data['categoryaccordionmenu_fm_main_icon_display'] = $this->request->post['categoryaccordionmenu_fm_main_icon_display'];
		} else {
			$data['categoryaccordionmenu_fm_main_icon_display'] = $this->config->get('categoryaccordionmenu_fm_main_icon_display');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_icon'])) {
			$data['categoryaccordionmenu_fm_main_icon'] = $this->request->post['categoryaccordionmenu_fm_main_icon'];
		} else {
			$data['categoryaccordionmenu_fm_main_icon'] = $this->config->get('categoryaccordionmenu_fm_main_icon');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_icon_color'])) {
			$data['categoryaccordionmenu_fm_main_icon_color'] = $this->request->post['categoryaccordionmenu_fm_main_icon_color'];
		} else {
			$data['categoryaccordionmenu_fm_main_icon_color'] = $this->config->get('categoryaccordionmenu_fm_main_icon_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_icon_size'])) {
			$data['categoryaccordionmenu_fm_main_icon_size'] = $this->request->post['categoryaccordionmenu_fm_main_icon_size'];
		} else {
			$data['categoryaccordionmenu_fm_main_icon_size'] = $this->config->get('categoryaccordionmenu_fm_main_icon_size');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_padding_top'])) {
			$data['categoryaccordionmenu_fm_main_padding_top'] = $this->request->post['categoryaccordionmenu_fm_main_padding_top'];
		} else {
			$data['categoryaccordionmenu_fm_main_padding_top'] = $this->config->get('categoryaccordionmenu_fm_main_padding_top');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_padding_right'])) {
			$data['categoryaccordionmenu_fm_main_padding_right'] = $this->request->post['categoryaccordionmenu_fm_main_padding_right'];
		} else {
			$data['categoryaccordionmenu_fm_main_padding_right'] = $this->config->get('categoryaccordionmenu_fm_main_padding_right');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_padding_bottom'])) {
			$data['categoryaccordionmenu_fm_main_padding_bottom'] = $this->request->post['categoryaccordionmenu_fm_main_padding_bottom'];
		} else {
			$data['categoryaccordionmenu_fm_main_padding_bottom'] = $this->config->get('categoryaccordionmenu_fm_main_padding_bottom');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_padding_left'])) {
			$data['categoryaccordionmenu_fm_main_padding_left'] = $this->request->post['categoryaccordionmenu_fm_main_padding_left'];
		} else {
			$data['categoryaccordionmenu_fm_main_padding_left'] = $this->config->get('categoryaccordionmenu_fm_main_padding_left');
		}
		/* Main Category Settings END */
		
		/* Child Category Settings START */
		if (isset($this->request->post['categoryaccordionmenu_fm_child_bg_color'])) {
			$data['categoryaccordionmenu_fm_child_bg_color'] = $this->request->post['categoryaccordionmenu_fm_child_bg_color'];
		} else {
			$data['categoryaccordionmenu_fm_child_bg_color'] = $this->config->get('categoryaccordionmenu_fm_child_bg_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_hover_color'])) {
			$data['categoryaccordionmenu_fm_child_hover_color'] = $this->request->post['categoryaccordionmenu_fm_child_hover_color'];
		} else {
			$data['categoryaccordionmenu_fm_child_hover_color'] = $this->config->get('categoryaccordionmenu_fm_child_hover_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_txt_color'])) {
			$data['categoryaccordionmenu_fm_child_txt_color'] = $this->request->post['categoryaccordionmenu_fm_child_txt_color'];
		} else {
			$data['categoryaccordionmenu_fm_child_txt_color'] = $this->config->get('categoryaccordionmenu_fm_child_txt_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_txt_size'])) {
			$data['categoryaccordionmenu_fm_child_txt_size'] = $this->request->post['categoryaccordionmenu_fm_child_txt_size'];
		} else {
			$data['categoryaccordionmenu_fm_child_txt_size'] = $this->config->get('categoryaccordionmenu_fm_child_txt_size');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_icon_display'])) {
			$data['categoryaccordionmenu_fm_child_icon_display'] = $this->request->post['categoryaccordionmenu_fm_child_icon_display'];
		} else {
			$data['categoryaccordionmenu_fm_child_icon_display'] = $this->config->get('categoryaccordionmenu_fm_child_icon_display');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_icon'])) {
			$data['categoryaccordionmenu_fm_child_icon'] = $this->request->post['categoryaccordionmenu_fm_child_icon'];
		} else {
			$data['categoryaccordionmenu_fm_child_icon'] = $this->config->get('categoryaccordionmenu_fm_child_icon');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_icon_color'])) {
			$data['categoryaccordionmenu_fm_child_icon_color'] = $this->request->post['categoryaccordionmenu_fm_child_icon_color'];
		} else {
			$data['categoryaccordionmenu_fm_child_icon_color'] = $this->config->get('categoryaccordionmenu_fm_child_icon_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_icon_size'])) {
			$data['categoryaccordionmenu_fm_child_icon_size'] = $this->request->post['categoryaccordionmenu_fm_child_icon_size'];
		} else {
			$data['categoryaccordionmenu_fm_child_icon_size'] = $this->config->get('categoryaccordionmenu_fm_child_icon_size');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_padding_top'])) {
			$data['categoryaccordionmenu_fm_child_padding_top'] = $this->request->post['categoryaccordionmenu_fm_child_padding_top'];
		} else {
			$data['categoryaccordionmenu_fm_child_padding_top'] = $this->config->get('categoryaccordionmenu_fm_child_padding_top');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_padding_right'])) {
			$data['categoryaccordionmenu_fm_child_padding_right'] = $this->request->post['categoryaccordionmenu_fm_child_padding_right'];
		} else {
			$data['categoryaccordionmenu_fm_child_padding_right'] = $this->config->get('categoryaccordionmenu_fm_child_padding_right');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_padding_bottom'])) {
			$data['categoryaccordionmenu_fm_child_padding_bottom'] = $this->request->post['categoryaccordionmenu_fm_child_padding_bottom'];
		} else {
			$data['categoryaccordionmenu_fm_child_padding_bottom'] = $this->config->get('categoryaccordionmenu_fm_child_padding_bottom');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_padding_left'])) {
			$data['categoryaccordionmenu_fm_child_padding_left'] = $this->request->post['categoryaccordionmenu_fm_child_padding_left'];
		} else {
			$data['categoryaccordionmenu_fm_child_padding_left'] = $this->config->get('categoryaccordionmenu_fm_child_padding_left');
		}
		/* Child Category Settings END */
		
		/* Collaps/Expand Settings START */
		if (isset($this->request->post['categoryaccordionmenu_fm_cebtn_icon_color'])) {
			$data['categoryaccordionmenu_fm_cebtn_icon_color'] = $this->request->post['categoryaccordionmenu_fm_cebtn_icon_color'];
		} else {
			$data['categoryaccordionmenu_fm_cebtn_icon_color'] = $this->config->get('categoryaccordionmenu_fm_cebtn_icon_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_cbtn_icon'])) {
			$data['categoryaccordionmenu_fm_cbtn_icon'] = $this->request->post['categoryaccordionmenu_fm_cbtn_icon'];
		} else {
			$data['categoryaccordionmenu_fm_cbtn_icon'] = $this->config->get('categoryaccordionmenu_fm_cbtn_icon');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_ebtn_icon'])) {
			$data['categoryaccordionmenu_fm_ebtn_icon'] = $this->request->post['categoryaccordionmenu_fm_ebtn_icon'];
		} else {
			$data['categoryaccordionmenu_fm_ebtn_icon'] = $this->config->get('categoryaccordionmenu_fm_ebtn_icon');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_cebtn_icon_size'])) {
			$data['categoryaccordionmenu_fm_cebtn_icon_size'] = $this->request->post['categoryaccordionmenu_fm_cebtn_icon_size'];
		} else {
			$data['categoryaccordionmenu_fm_cebtn_icon_size'] = $this->config->get('categoryaccordionmenu_fm_cebtn_icon_size');
		}
		/* Collaps/Expand Settings END */
		
		
		/* Custom/Extra Class Settings START */
		if (isset($this->request->post['categoryaccordionmenu_custom_cls_parent'])) {
			$data['categoryaccordionmenu_custom_cls_parent'] = $this->request->post['categoryaccordionmenu_custom_cls_parent'];
		} else {
			$data['categoryaccordionmenu_custom_cls_parent'] = $this->config->get('categoryaccordionmenu_custom_cls_parent');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_custom_cls_child'])) {
			$data['categoryaccordionmenu_custom_cls_child'] = $this->request->post['categoryaccordionmenu_custom_cls_child'];
		} else {
			$data['categoryaccordionmenu_custom_cls_child'] = $this->config->get('categoryaccordionmenu_custom_cls_child');
		}
		/* Custom/Extra Class Settings END */
		
		/* RTL Language Settings Settings START */
		if (isset($this->request->post['categoryaccordionmenu_rtl'])) {
			$data['categoryaccordionmenu_rtl'] = $this->request->post['categoryaccordionmenu_rtl'];
		} else {
			$data['categoryaccordionmenu_rtl'] = $this->config->get('categoryaccordionmenu_rtl');
		}
		/* RTL Language Settings Settings END */
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/categoryaccordionmenu_setting', $data));
	}
	
	public function setting_store() {
		$this->load->language('extension/module/categoryaccordionmenu');
		
		$this->document->setTitle($this->language->get('title'));

		$this->load->model('setting/store');
		
		$this->document->addStyle('view/javascript/jquery/categoryaccrodionmenu/bootstrap-colorpicker.min.css');
		$this->document->addScript('view/javascript/jquery/categoryaccrodionmenu/bootstrap-colorpicker.min.js');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
		
			$this->load->model('setting/setting');

			$this->model_setting_setting->editSetting('categoryaccordionmenu', $this->request->post, $this->request->get['store_id']);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/module/categoryaccordionmenu', 'token=' . $this->session->data['token'] . '&type=module' . '&store_id=' . $this->request->get['store_id'], 'SSL'));
		}

		$data['heading_title'] 				= $this->language->get('heading_title');
		$data['heading_module_title'] 		= $this->language->get('heading_module_title');

		$data['text_edit'] 					= $this->language->get('text_edit');
		$data['text_enabled'] 				= $this->language->get('text_enabled');
		$data['text_disabled'] 				= $this->language->get('text_disabled');
		$data['text_yes'] 					= $this->language->get('text_yes');
		$data['text_no'] 					= $this->language->get('text_no');

		$data['entry_status'] 				= $this->language->get('entry_status');
		$data['entry_pre_define'] 			= $this->language->get('entry_pre_define');
		$data['entry_main_bg_color'] 		= $this->language->get('entry_main_bg_color');
		$data['entry_main_hover_color']		= $this->language->get('entry_main_hover_color');
		$data['entry_main_txt_color'] 		= $this->language->get('entry_main_txt_color');
		$data['entry_main_txt_size'] 		= $this->language->get('entry_main_txt_size');
		$data['entry_main_icon_display'] 	= $this->language->get('entry_main_icon_display');
		$data['entry_main_icon'] 			= $this->language->get('entry_main_icon');
		$data['entry_main_icon_color'] 		= $this->language->get('entry_main_icon_color');
		$data['entry_main_icon_size'] 		= $this->language->get('entry_main_icon_size');
		$data['entry_main_padding'] 		= $this->language->get('entry_main_padding');
		$data['entry_padding_top'] 			= $this->language->get('entry_padding_top');
		$data['entry_padding_right'] 		= $this->language->get('entry_padding_right');
		$data['entry_padding_bottom']		= $this->language->get('entry_padding_bottom');
		$data['entry_padding_left'] 		= $this->language->get('entry_padding_left');
		
		$data['entry_child_bg_color'] 		= $this->language->get('entry_child_bg_color');
		$data['entry_child_hover_color'] 	= $this->language->get('entry_child_hover_color');
		$data['entry_child_txt_color'] 		= $this->language->get('entry_child_txt_color');
		$data['entry_child_txt_size'] 		= $this->language->get('entry_child_txt_size');
		$data['entry_child_icon_display'] 	= $this->language->get('entry_child_icon_display');
		$data['entry_child_icon'] 			= $this->language->get('entry_child_icon');
		$data['entry_child_icon_color'] 	= $this->language->get('entry_child_icon_color');
		$data['entry_child_icon_size'] 		= $this->language->get('entry_child_icon_size');
		$data['entry_child_padding'] 		= $this->language->get('entry_child_padding');
		
		$data['entry_cebtn_bg_color'] 		= $this->language->get('entry_cebtn_bg_color');
		$data['entry_cebtn_hover_color'] 	= $this->language->get('entry_cebtn_hover_color');
		$data['entry_cebtn_icon_color'] 	= $this->language->get('entry_cebtn_icon_color');
		$data['entry_cebtn_icon_size'] 		= $this->language->get('entry_cebtn_icon_size');
		$data['entry_cbtn_icon'] 			= $this->language->get('entry_cbtn_icon');
		$data['entry_ebtn_icon'] 			= $this->language->get('entry_ebtn_icon');
		
		$data['entry_custom_cls_parent'] 	= $this->language->get('entry_custom_cls_parent');
		$data['entry_custom_cls_child'] 	= $this->language->get('entry_custom_cls_child');
		$data['entry_rtl'] 					= $this->language->get('entry_rtl');
		
		
		$data['help_main_bg_color'] 		= $this->language->get('help_main_bg_color');
		$data['help_main_hover_color'] 		= $this->language->get('help_main_hover_color');
		$data['help_main_txt_color'] 		= $this->language->get('help_main_txt_color');
		$data['help_main_txt_size'] 		= $this->language->get('help_main_txt_size');
		$data['help_main_icon_display']		= $this->language->get('help_main_icon_display');
		$data['help_main_icon'] 			= $this->language->get('help_main_icon');
		$data['help_main_icon_color'] 		= $this->language->get('help_main_icon_color');
		$data['help_main_icon_size'] 		= $this->language->get('help_main_icon_size');
		$data['help_main_padding'] 			= $this->language->get('help_main_padding');
		
		$data['help_child_bg_color'] 		= $this->language->get('help_child_bg_color');
		$data['help_child_hover_color'] 	= $this->language->get('help_child_hover_color');
		$data['help_child_txt_color'] 		= $this->language->get('help_child_txt_color');
		$data['help_child_txt_size'] 		= $this->language->get('help_child_txt_size');
		$data['help_child_icon_display'] 	= $this->language->get('help_child_icon_display');
		$data['help_child_icon'] 			= $this->language->get('help_child_icon');
		$data['help_child_icon_color'] 		= $this->language->get('help_child_icon_color');
		$data['help_child_icon_size'] 		= $this->language->get('help_child_icon_size');
		$data['help_child_padding'] 		= $this->language->get('help_child_padding');
		
		$data['help_cebtn_bg_color'] 		= $this->language->get('help_cebtn_bg_color');
		$data['help_cebtn_hover_color'] 	= $this->language->get('help_cebtn_hover_color');
		$data['help_cebtn_icon_color'] 		= $this->language->get('help_cebtn_icon_color');
		$data['help_cebtn_icon_size'] 		= $this->language->get('help_cebtn_icon_size');
		$data['help_cbtn_icon'] 			= $this->language->get('help_cbtn_icon');
		$data['help_ebtn_icon'] 			= $this->language->get('help_ebtn_icon');
		
		$data['help_custom_cls_parent'] 	= $this->language->get('help_custom_cls_parent');
		$data['help_custom_cls_child'] 		= $this->language->get('help_custom_cls_child');
		$data['help_rtl'] 					= $this->language->get('help_rtl');

		$data['button_save'] 				= $this->language->get('button_save');
		$data['button_cancel'] 				= $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], 'SSL')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/module/categoryaccordionmenu/setting', 'token=' . $this->session->data['token'], true)
		);

		$data['action'] = $this->url->link('extension/module/categoryaccordionmenu/setting_store', 'token=' . $this->session->data['token'] . '&store_id=' . $this->request->get['store_id'], 'SSL');
		
		$data['cancel'] = $this->url->link('extension/module/categoryaccordionmenu', 'token=' . $this->session->data['token'] . '&type=module', true);
		
		
		$data['font_awesome_icon'] = array( 'fa-glass' => '&#xf000', 'fa-music' => '&#xf001', 'fa-search' => '&#xf002', 'fa-envelope-o' => '&#xf003', 'fa-heart' => '&#xf004', 'fa-star' => '&#xf005', 'fa-star-o' => '&#xf006', 'fa-user' => '&#xf007', 'fa-film' => '&#xf008', 'fa-th-large' => '&#xf009', 'fa-th' => '&#xf00a', 'fa-th-list' => '&#xf00b', 'fa-check' => '&#xf00c', 'fa-times' => '&#xf00d', 'fa-search-plus' => '&#xf00e', 'fa-search-minus' => '&#xf010', 'fa-power-off' => '&#xf011', 'fa-signal' => '&#xf012', 'fa-cog' => '&#xf013', 'fa-trash-o' => '&#xf014', 'fa-home' => '&#xf015', 'fa-file-o' => '&#xf016', 'fa-clock-o' => '&#xf017', 'fa-road' => '&#xf018', 'fa-download' => '&#xf019', 'fa-arrow-circle-o-down' => '&#xf01a', 'fa-arrow-circle-o-up' => '&#xf01b', 'fa-inbox' => '&#xf01c', 'fa-play-circle-o' => '&#xf01d', 'fa-repeat' => '&#xf01e', 'fa-refresh' => '&#xf021', 'fa-list-alt' => '&#xf022', 'fa-lock' => '&#xf023', 'fa-flag' => '&#xf024', 'fa-headphones' => '&#xf025', 'fa-volume-off' => '&#xf026', 'fa-volume-down' => '&#xf027', 'fa-volume-up' => '&#xf028', 'fa-qrcode' => '&#xf029', 'fa-barcode' => '&#xf02a', 'fa-tag' => '&#xf02b', 'fa-tags' => '&#xf02c', 'fa-book' => '&#xf02d', 'fa-bookmark' => '&#xf02e', 'fa-print' => '&#xf02f', 'fa-camera' => '&#xf030', 'fa-font' => '&#xf031', 'fa-bold' => '&#xf032', 'fa-italic' => '&#xf033', 'fa-text-height' => '&#xf034', 'fa-text-width' => '&#xf035', 'fa-align-left' => '&#xf036', 'fa-align-center' => '&#xf037', 'fa-align-right' => '&#xf038', 'fa-align-justify' => '&#xf039', 'fa-list' => '&#xf03a', 'fa-outdent' => '&#xf03b', 'fa-indent' => '&#xf03c', 'fa-video-camera' => '&#xf03d', 'fa-picture-o' => '&#xf03e', 'fa-pencil' => '&#xf040', 'fa-map-marker' => '&#xf041', 'fa-adjust' => '&#xf042', 'fa-tint' => '&#xf043', 'fa-pencil-square-o' => '&#xf044', 'fa-share-square-o' => '&#xf045', 'fa-check-square-o' => '&#xf046', 'fa-arrows' => '&#xf047', 'fa-step-backward' => '&#xf048', 'fa-fast-backward' => '&#xf049', 'fa-backward' => '&#xf04a', 'fa-play' => '&#xf04b', 'fa-pause' => '&#xf04c', 'fa-stop' => '&#xf04d', 'fa-forward' => '&#xf04e', 'fa-fast-forward' => '&#xf050', 'fa-step-forward' => '&#xf051', 'fa-eject' => '&#xf052', 'fa-chevron-left' => '&#xf053', 'fa-chevron-right' => '&#xf054', 'fa-plus-circle' => '&#xf055', 'fa-minus-circle' => '&#xf056', 'fa-times-circle' => '&#xf057', 'fa-check-circle' => '&#xf058', 'fa-question-circle' => '&#xf059', 'fa-info-circle' => '&#xf05a', 'fa-crosshairs' => '&#xf05b', 'fa-times-circle-o' => '&#xf05c', 'fa-check-circle-o' => '&#xf05d', 'fa-ban' => '&#xf05e', 'fa-arrow-left' => '&#xf060', 'fa-arrow-right' => '&#xf061', 'fa-arrow-up' => '&#xf062', 'fa-arrow-down' => '&#xf063', 'fa-share' => '&#xf064', 'fa-expand' => '&#xf065', 'fa-compress' => '&#xf066', 'fa-plus' => '&#xf067', 'fa-minus' => '&#xf068', 'fa-asterisk' => '&#xf069', 'fa-exclamation-circle' => '&#xf06a', 'fa-gift' => '&#xf06b', 'fa-leaf' => '&#xf06c', 'fa-fire' => '&#xf06d', 'fa-eye' => '&#xf06e', 'fa-eye-slash' => '&#xf070', 'fa-exclamation-triangle' => '&#xf071', 'fa-plane' => '&#xf072', 'fa-calendar' => '&#xf073', 'fa-random' => '&#xf074', 'fa-comment' => '&#xf075', 'fa-magnet' => '&#xf076', 'fa-chevron-up' => '&#xf077', 'fa-chevron-down' => '&#xf078', 'fa-retweet' => '&#xf079', 'fa-shopping-cart' => '&#xf07a', 'fa-folder' => '&#xf07b', 'fa-folder-open' => '&#xf07c', 'fa-arrows-v' => '&#xf07d', 'fa-arrows-h' => '&#xf07e', 'fa-bar-chart-o' => '&#xf080', 'fa-twitter-square' => '&#xf081', 'fa-facebook-square' => '&#xf082', 'fa-camera-retro' => '&#xf083', 'fa-key' => '&#xf084', 'fa-cogs' => '&#xf085', 'fa-comments' => '&#xf086', 'fa-thumbs-o-up' => '&#xf087', 'fa-thumbs-o-down' => '&#xf088', 'fa-star-half' => '&#xf089', 'fa-heart-o' => '&#xf08a', 'fa-sign-out' => '&#xf08b', 'fa-linkedin-square' => '&#xf08c', 'fa-thumb-tack' => '&#xf08d', 'fa-external-link' => '&#xf08e', 'fa-sign-in' => '&#xf090', 'fa-trophy' => '&#xf091', 'fa-github-square' => '&#xf092', 'fa-upload' => '&#xf093', 'fa-lemon-o' => '&#xf094', 'fa-phone' => '&#xf095', 'fa-square-o' => '&#xf096', 'fa-bookmark-o' => '&#xf097', 'fa-phone-square' => '&#xf098', 'fa-twitter' => '&#xf099', 'fa-facebook' => '&#xf09a', 'fa-github' => '&#xf09b', 'fa-unlock' => '&#xf09c', 'fa-credit-card' => '&#xf09d', 'fa-rss' => '&#xf09e', 'fa-hdd-o' => '&#xf0a0', 'fa-bullhorn' => '&#xf0a1', 'fa-bell' => '&#xf0f3', 'fa-certificate' => '&#xf0a3', 'fa-hand-o-right' => '&#xf0a4', 'fa-hand-o-left' => '&#xf0a5', 'fa-hand-o-up' => '&#xf0a6', 'fa-hand-o-down' => '&#xf0a7', 'fa-arrow-circle-left' => '&#xf0a8', 'fa-arrow-circle-right' => '&#xf0a9', 'fa-arrow-circle-up' => '&#xf0aa', 'fa-arrow-circle-down' => '&#xf0ab', 'fa-globe' => '&#xf0ac', 'fa-wrench' => '&#xf0ad', 'fa-tasks' => '&#xf0ae', 'fa-filter' => '&#xf0b0', 'fa-briefcase' => '&#xf0b1', 'fa-arrows-alt' => '&#xf0b2', 'fa-users' => '&#xf0c0', 'fa-link' => '&#xf0c1', 'fa-cloud' => '&#xf0c2', 'fa-flask' => '&#xf0c3', 'fa-scissors' => '&#xf0c4', 'fa-files-o' => '&#xf0c5', 'fa-paperclip' => '&#xf0c6', 'fa-floppy-o' => '&#xf0c7', 'fa-square' => '&#xf0c8', 'fa-bars' => '&#xf0c9', 'fa-list-ul' => '&#xf0ca', 'fa-list-ol' => '&#xf0cb', 'fa-strikethrough' => '&#xf0cc', 'fa-underline' => '&#xf0cd', 'fa-table' => '&#xf0ce', 'fa-magic' => '&#xf0d0', 'fa-truck' => '&#xf0d1', 'fa-pinterest' => '&#xf0d2', 'fa-pinterest-square' => '&#xf0d3', 'fa-google-plus-square' => '&#xf0d4', 'fa-google-plus' => '&#xf0d5', 'fa-money' => '&#xf0d6', 'fa-caret-down' => '&#xf0d7', 'fa-caret-up' => '&#xf0d8', 'fa-caret-left' => '&#xf0d9', 'fa-caret-right' => '&#xf0da', 'fa-columns' => '&#xf0db', 'fa-sort' => '&#xf0dc', 'fa-sort-desc' => '&#xf0dd', 'fa-sort-asc' => '&#xf0de', 'fa-envelope' => '&#xf0e0', 'fa-linkedin' => '&#xf0e1', 'fa-undo' => '&#xf0e2', 'fa-gavel' => '&#xf0e3', 'fa-tachometer' => '&#xf0e4', 'fa-comment-o' => '&#xf0e5', 'fa-comments-o' => '&#xf0e6', 'fa-bolt' => '&#xf0e7', 'fa-sitemap' => '&#xf0e8', 'fa-umbrella' => '&#xf0e9', 'fa-clipboard' => '&#xf0ea', 'fa-lightbulb-o' => '&#xf0eb', 'fa-exchange' => '&#xf0ec', 'fa-cloud-download' => '&#xf0ed', 'fa-cloud-upload' => '&#xf0ee', 'fa-user-md' => '&#xf0f0', 'fa-stethoscope' => '&#xf0f1', 'fa-suitcase' => '&#xf0f2', 'fa-bell-o' => '&#xf0a2', 'fa-coffee' => '&#xf0f4', 'fa-cutlery' => '&#xf0f5', 'fa-file-text-o' => '&#xf0f6', 'fa-building-o' => '&#xf0f7', 'fa-hospital-o' => '&#xf0f8', 'fa-ambulance' => '&#xf0f9', 'fa-medkit' => '&#xf0fa', 'fa-fighter-jet' => '&#xf0fb', 'fa-beer' => '&#xf0fc', 'fa-h-square' => '&#xf0fd', 'fa-plus-square' => '&#xf0fe', 'fa-angle-double-left' => '&#xf100', 'fa-angle-double-right' => '&#xf101', 'fa-angle-double-up' => '&#xf102', 'fa-angle-double-down' => '&#xf103', 'fa-angle-left' => '&#xf104', 'fa-angle-right' => '&#xf105', 'fa-angle-up' => '&#xf106', 'fa-angle-down' => '&#xf107', 'fa-desktop' => '&#xf108', 'fa-laptop' => '&#xf109', 'fa-tablet' => '&#xf10a', 'fa-mobile' => '&#xf10b', 'fa-circle-o' => '&#xf10c', 'fa-quote-left' => '&#xf10d', 'fa-quote-right' => '&#xf10e', 'fa-spinner' => '&#xf110', 'fa-circle' => '&#xf111', 'fa-reply' => '&#xf112', 'fa-github-alt' => '&#xf113', 'fa-folder-o' => '&#xf114', 'fa-folder-open-o' => '&#xf115', 'fa-smile-o' => '&#xf118', 'fa-frown-o' => '&#xf119', 'fa-meh-o' => '&#xf11a', 'fa-gamepad' => '&#xf11b', 'fa-keyboard-o' => '&#xf11c', 'fa-flag-o' => '&#xf11d', 'fa-flag-checkered' => '&#xf11e', 'fa-terminal' => '&#xf120', 'fa-code' => '&#xf121', 'fa-reply-all' => '&#xf122', 'fa-star-half-o' => '&#xf123', 'fa-location-arrow' => '&#xf124', 'fa-crop' => '&#xf125', 'fa-code-fork' => '&#xf126', 'fa-chain-broken' => '&#xf127', 'fa-question' => '&#xf128', 'fa-info' => '&#xf129', 'fa-exclamation' => '&#xf12a', 'fa-superscript' => '&#xf12b', 'fa-subscript' => '&#xf12c', 'fa-eraser' => '&#xf12d', 'fa-puzzle-piece' => '&#xf12e', 'fa-microphone' => '&#xf130', 'fa-microphone-slash' => '&#xf131', 'fa-shield' => '&#xf132', 'fa-calendar-o' => '&#xf133', 'fa-fire-extinguisher' => '&#xf134', 'fa-rocket' => '&#xf135', 'fa-maxcdn' => '&#xf136', 'fa-chevron-circle-left' => '&#xf137', 'fa-chevron-circle-right' => '&#xf138', 'fa-chevron-circle-up' => '&#xf139', 'fa-chevron-circle-down' => '&#xf13a', 'fa-html5' => '&#xf13b', 'fa-css3' => '&#xf13c', 'fa-anchor' => '&#xf13d', 'fa-unlock-alt' => '&#xf13e', 'fa-bullseye' => '&#xf140', 'fa-ellipsis-h' => '&#xf141', 'fa-ellipsis-v' => '&#xf142', 'fa-rss-square' => '&#xf143', 'fa-play-circle' => '&#xf144', 'fa-ticket' => '&#xf145', 'fa-minus-square' => '&#xf146', 'fa-minus-square-o' => '&#xf147', 'fa-level-up' => '&#xf148', 'fa-level-down' => '&#xf149', 'fa-check-square' => '&#xf14a', 'fa-pencil-square' => '&#xf14b', 'fa-external-link-square' => '&#xf14c', 'fa-share-square' => '&#xf14d', 'fa-compass' => '&#xf14e', 'fa-caret-square-o-down' => '&#xf150', 'fa-caret-square-o-up' => '&#xf151', 'fa-caret-square-o-right' => '&#xf152', 'fa-eur' => '&#xf153', 'fa-gbp' => '&#xf154', 'fa-usd' => '&#xf155', 'fa-inr' => '&#xf156', 'fa-jpy' => '&#xf157', 'fa-rub' => '&#xf158', 'fa-krw' => '&#xf159', 'fa-btc' => '&#xf15a', 'fa-file' => '&#xf15b', 'fa-file-text' => '&#xf15c', 'fa-sort-alpha-asc' => '&#xf15d', 'fa-sort-alpha-desc' => '&#xf15e', 'fa-sort-amount-asc' => '&#xf160', 'fa-sort-amount-desc' => '&#xf161', 'fa-sort-numeric-asc' => '&#xf162', 'fa-sort-numeric-desc' => '&#xf163', 'fa-thumbs-up' => '&#xf164', 'fa-thumbs-down' => '&#xf165', 'fa-youtube-square' => '&#xf166', 'fa-youtube' => '&#xf167', 'fa-xing' => '&#xf168', 'fa-xing-square' => '&#xf169', 'fa-youtube-play' => '&#xf16a', 'fa-dropbox' => '&#xf16b', 'fa-stack-overflow' => '&#xf16c', 'fa-instagram' => '&#xf16d', 'fa-flickr' => '&#xf16e', 'fa-adn' => '&#xf170', 'fa-bitbucket' => '&#xf171', 'fa-bitbucket-square' => '&#xf172', 'fa-tumblr' => '&#xf173', 'fa-tumblr-square' => '&#xf174', 'fa-long-arrow-down' => '&#xf175', 'fa-long-arrow-up' => '&#xf176', 'fa-long-arrow-left' => '&#xf177', 'fa-long-arrow-right' => '&#xf178', 'fa-apple' => '&#xf179', 'fa-windows' => '&#xf17a', 'fa-android' => '&#xf17b', 'fa-linux' => '&#xf17c', 'fa-dribbble' => '&#xf17d', 'fa-skype' => '&#xf17e', 'fa-foursquare' => '&#xf180', 'fa-trello' => '&#xf181', 'fa-female' => '&#xf182', 'fa-male' => '&#xf183', 'fa-gittip' => '&#xf184', 'fa-sun-o' => '&#xf185', 'fa-moon-o' => '&#xf186', 'fa-archive' => '&#xf187', 'fa-bug' => '&#xf188', 'fa-vk' => '&#xf189', 'fa-weibo' => '&#xf18a', 'fa-renren' => '&#xf18b', 'fa-pagelines' => '&#xf18c', 'fa-stack-exchange' => '&#xf18d', 'fa-arrow-circle-o-right' => '&#xf18e', 'fa-arrow-circle-o-left' => '&#xf190', 'fa-caret-square-o-left' => '&#xf191', 'fa-dot-circle-o' => '&#xf192', 'fa-wheelchair' => '&#xf193', 'fa-vimeo-square' => '&#xf194', 'fa-try' => '&#xf195', 'fa-plus-square-o' => '&#xf196', 'fa-space-shuttle' => '&#xf197', 'fa-slack' => '&#xf198', 'fa-envelope-square' => '&#xf199', 'fa-wordpress' => '&#xf19a', 'fa-openid' => '&#xf19b', 'fa-university' => '&#xf19c', 'fa-graduation-cap' => '&#xf19d', 'fa-yahoo' => '&#xf19e', 'fa-google' => '&#xf1a0', 'fa-reddit' => '&#xf1a1', 'fa-reddit-square' => '&#xf1a2', 'fa-stumbleupon-circle' => '&#xf1a3', 'fa-stumbleupon' => '&#xf1a4', 'fa-delicious' => '&#xf1a5', 'fa-digg' => '&#xf1a6', 'fa-pied-piper' => '&#xf1a7', 'fa-pied-piper-alt' => '&#xf1a8', 'fa-drupal' => '&#xf1a9', 'fa-joomla' => '&#xf1aa', 'fa-language' => '&#xf1ab', 'fa-fax' => '&#xf1ac', 'fa-building' => '&#xf1ad', 'fa-child' => '&#xf1ae', 'fa-paw' => '&#xf1b0', 'fa-spoon' => '&#xf1b1', 'fa-cube' => '&#xf1b2', 'fa-cubes' => '&#xf1b3', 'fa-behance' => '&#xf1b4', 'fa-behance-square' => '&#xf1b5', 'fa-steam' => '&#xf1b6', 'fa-steam-square' => '&#xf1b7', 'fa-recycle' => '&#xf1b8', 'fa-car' => '&#xf1b9', 'fa-taxi' => '&#xf1ba', 'fa-tree' => '&#xf1bb', 'fa-spotify' => '&#xf1bc', 'fa-deviantart' => '&#xf1bd', 'fa-soundcloud' => '&#xf1be', 'fa-database' => '&#xf1c0', 'fa-file-pdf-o' => '&#xf1c1', 'fa-file-word-o' => '&#xf1c2', 'fa-file-excel-o' => '&#xf1c3', 'fa-file-powerpoint-o' => '&#xf1c4', 'fa-file-image-o' => '&#xf1c5', 'fa-file-archive-o' => '&#xf1c6', 'fa-file-audio-o' => '&#xf1c7', 'fa-file-video-o' => '&#xf1c8', 'fa-file-code-o' => '&#xf1c9', 'fa-vine' => '&#xf1ca', 'fa-codepen' => '&#xf1cb', 'fa-jsfiddle' => '&#xf1cc', 'fa-life-ring' => '&#xf1cd', 'fa-circle-o-notch' => '&#xf1ce', 'fa-rebel' => '&#xf1d0', 'fa-empire' => '&#xf1d1', 'fa-git-square' => '&#xf1d2', 'fa-git' => '&#xf1d3', 'fa-hacker-news' => '&#xf1d4', 'fa-tencent-weibo' => '&#xf1d5', 'fa-qq' => '&#xf1d6', 'fa-weixin' => '&#xf1d7', 'fa-paper-plane' => '&#xf1d8', 'fa-paper-plane-o' => '&#xf1d9', 'fa-history' => '&#xf1da', 'fa-circle-thin' => '&#xf1db', 'fa-header' => '&#xf1dc', 'fa-paragraph' => '&#xf1dd', 'fa-sliders' => '&#xf1de', 'fa-share-alt' => '&#xf1e0', 'fa-share-alt-square' => '&#xf1e1', 'fa-bomb' => '&#xf1e2' );
		$data['awesome_icon'] = array_keys($data['font_awesome_icon']);
		
		
		
		if (isset($this->request->get['store_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			
			$this->load->model('setting/setting');

			$store_info = $this->model_setting_setting->getSetting('categoryaccordionmenu', $this->request->get['store_id']);
			
		}
		
		if (isset($this->request->post['categoryaccordionmenu_status'])) {
			$data['categoryaccordionmenu_status'] = $this->request->post['categoryaccordionmenu_status'];
		} elseif (isset($store_info['categoryaccordionmenu_status'])) {
			$data['categoryaccordionmenu_status'] = $store_info['categoryaccordionmenu_status'];
		} else {
			$data['categoryaccordionmenu_status'] = $this->config->get('categoryaccordionmenu_status');
		}
		
		/* Main Category Settings START */ 
		if (isset($this->request->post['categoryaccordionmenu_fm_main_bg_color'])) {
			$data['categoryaccordionmenu_fm_main_bg_color'] = $this->request->post['categoryaccordionmenu_fm_main_bg_color'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_bg_color'])) {
			$data['categoryaccordionmenu_fm_main_bg_color'] = $store_info['categoryaccordionmenu_fm_main_bg_color'];
		} else {
			$data['categoryaccordionmenu_fm_main_bg_color'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_hover_color'])) {
			$data['categoryaccordionmenu_fm_main_hover_color'] = $this->request->post['categoryaccordionmenu_fm_main_hover_color'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_hover_color'])) {
			$data['categoryaccordionmenu_fm_main_hover_color'] = $store_info['categoryaccordionmenu_fm_main_hover_color'];
		} else {
			$data['categoryaccordionmenu_fm_main_hover_color'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_txt_color'])) {
			$data['categoryaccordionmenu_fm_main_txt_color'] = $this->request->post['categoryaccordionmenu_fm_main_txt_color'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_txt_color'])) {
			$data['categoryaccordionmenu_fm_main_txt_color'] = $store_info['categoryaccordionmenu_fm_main_txt_color'];
		} else {
			$data['categoryaccordionmenu_fm_main_txt_color'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_txt_size'])) {
			$data['categoryaccordionmenu_fm_main_txt_size'] = $this->request->post['categoryaccordionmenu_fm_main_txt_size'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_txt_size'])) {
			$data['categoryaccordionmenu_fm_main_txt_size'] = $store_info['categoryaccordionmenu_fm_main_txt_size'];
		} else {
			$data['categoryaccordionmenu_fm_main_txt_size'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_icon_display'])) {
			$data['categoryaccordionmenu_fm_main_icon_display'] = $this->request->post['categoryaccordionmenu_fm_main_icon_display'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_icon_display'])) {
			$data['categoryaccordionmenu_fm_main_icon_display'] = $store_info['categoryaccordionmenu_fm_main_icon_display'];
		} else {
			$data['categoryaccordionmenu_fm_main_icon_display'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_icon'])) {
			$data['categoryaccordionmenu_fm_main_icon'] = $this->request->post['categoryaccordionmenu_fm_main_icon'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_icon'])) {
			$data['categoryaccordionmenu_fm_main_icon'] = $store_info['categoryaccordionmenu_fm_main_icon'];
		} else {
			$data['categoryaccordionmenu_fm_main_icon'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_icon_color'])) {
			$data['categoryaccordionmenu_fm_main_icon_color'] = $this->request->post['categoryaccordionmenu_fm_main_icon_color'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_icon_color'])) {
			$data['categoryaccordionmenu_fm_main_icon_color'] = $store_info['categoryaccordionmenu_fm_main_icon_color'];
		} else {
			$data['categoryaccordionmenu_fm_main_icon_color'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_icon_size'])) {
			$data['categoryaccordionmenu_fm_main_icon_size'] = $this->request->post['categoryaccordionmenu_fm_main_icon_size'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_icon_size'])) {
			$data['categoryaccordionmenu_fm_main_icon_size'] = $store_info['categoryaccordionmenu_fm_main_icon_size'];
		} else {
			$data['categoryaccordionmenu_fm_main_icon_size'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_padding_top'])) {
			$data['categoryaccordionmenu_fm_main_padding_top'] = $this->request->post['categoryaccordionmenu_fm_main_padding_top'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_padding_top'])) {
			$data['categoryaccordionmenu_fm_main_padding_top'] = $store_info['categoryaccordionmenu_fm_main_padding_top'];
		} else {
			$data['categoryaccordionmenu_fm_main_padding_top'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_padding_right'])) {
			$data['categoryaccordionmenu_fm_main_padding_right'] = $this->request->post['categoryaccordionmenu_fm_main_padding_right'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_padding_right'])) {
			$data['categoryaccordionmenu_fm_main_padding_right'] = $store_info['categoryaccordionmenu_fm_main_padding_right'];
		} else {
			$data['categoryaccordionmenu_fm_main_padding_right'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_padding_bottom'])) {
			$data['categoryaccordionmenu_fm_main_padding_bottom'] = $this->request->post['categoryaccordionmenu_fm_main_padding_bottom'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_padding_bottom'])) {
			$data['categoryaccordionmenu_fm_main_padding_bottom'] = $store_info['categoryaccordionmenu_fm_main_padding_bottom'];
		} else {
			$data['categoryaccordionmenu_fm_main_padding_bottom'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_main_padding_left'])) {
			$data['categoryaccordionmenu_fm_main_padding_left'] = $this->request->post['categoryaccordionmenu_fm_main_padding_left'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_main_padding_left'])) {
			$data['categoryaccordionmenu_fm_main_padding_left'] = $store_info['categoryaccordionmenu_fm_main_padding_left'];
		} else {
			$data['categoryaccordionmenu_fm_main_padding_left'] = '';
		}
		/* Main Category Settings END */
		
		/* Child Category Settings START */
		if (isset($this->request->post['categoryaccordionmenu_fm_child_bg_color'])) {
			$data['categoryaccordionmenu_fm_child_bg_color'] = $this->request->post['categoryaccordionmenu_fm_child_bg_color'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_bg_color'])) {
			$data['categoryaccordionmenu_fm_child_bg_color'] = $store_info['categoryaccordionmenu_fm_child_bg_color'];
		} else {
			$data['categoryaccordionmenu_fm_child_bg_color'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_hover_color'])) {
			$data['categoryaccordionmenu_fm_child_hover_color'] = $this->request->post['categoryaccordionmenu_fm_child_hover_color'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_hover_color'])) {
			$data['categoryaccordionmenu_fm_child_hover_color'] = $store_info['categoryaccordionmenu_fm_child_hover_color'];
		} else {
			$data['categoryaccordionmenu_fm_child_hover_color'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_txt_color'])) {
			$data['categoryaccordionmenu_fm_child_txt_color'] = $this->request->post['categoryaccordionmenu_fm_child_txt_color'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_txt_color'])) {
			$data['categoryaccordionmenu_fm_child_txt_color'] = $store_info['categoryaccordionmenu_fm_child_txt_color'];
		} else {
			$data['categoryaccordionmenu_fm_child_txt_color'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_txt_size'])) {
			$data['categoryaccordionmenu_fm_child_txt_size'] = $this->request->post['categoryaccordionmenu_fm_child_txt_size'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_txt_size'])) {
			$data['categoryaccordionmenu_fm_child_txt_size'] = $store_info['categoryaccordionmenu_fm_child_txt_size'];
		} else {
			$data['categoryaccordionmenu_fm_child_txt_size'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_icon_display'])) {
			$data['categoryaccordionmenu_fm_child_icon_display'] = $this->request->post['categoryaccordionmenu_fm_child_icon_display'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_icon_display'])) {
			$data['categoryaccordionmenu_fm_child_icon_display'] = $store_info['categoryaccordionmenu_fm_child_icon_display'];
		} else {
			$data['categoryaccordionmenu_fm_child_icon_display'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_icon'])) {
			$data['categoryaccordionmenu_fm_child_icon'] = $this->request->post['categoryaccordionmenu_fm_child_icon'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_icon'])) {
			$data['categoryaccordionmenu_fm_child_icon'] = $store_info['categoryaccordionmenu_fm_child_icon'];
		} else {
			$data['categoryaccordionmenu_fm_child_icon'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_icon_color'])) {
			$data['categoryaccordionmenu_fm_child_icon_color'] = $this->request->post['categoryaccordionmenu_fm_child_icon_color'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_icon_color'])) {
			$data['categoryaccordionmenu_fm_child_icon_color'] = $store_info['categoryaccordionmenu_fm_child_icon_color'];
		} else {
			$data['categoryaccordionmenu_fm_child_icon_color'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_icon_size'])) {
			$data['categoryaccordionmenu_fm_child_icon_size'] = $this->request->post['categoryaccordionmenu_fm_child_icon_size'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_icon_size'])) {
			$data['categoryaccordionmenu_fm_child_icon_size'] = $store_info['categoryaccordionmenu_fm_child_icon_size'];
		} else {
			$data['categoryaccordionmenu_fm_child_icon_size'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_padding_top'])) {
			$data['categoryaccordionmenu_fm_child_padding_top'] = $this->request->post['categoryaccordionmenu_fm_child_padding_top'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_padding_top'])) {
			$data['categoryaccordionmenu_fm_child_padding_top'] = $store_info['categoryaccordionmenu_fm_child_padding_top'];
		} else {
			$data['categoryaccordionmenu_fm_child_padding_top'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_padding_right'])) {
			$data['categoryaccordionmenu_fm_child_padding_right'] = $this->request->post['categoryaccordionmenu_fm_child_padding_right'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_padding_right'])) {
			$data['categoryaccordionmenu_fm_child_padding_right'] = $store_info['categoryaccordionmenu_fm_child_padding_right'];
		} else {
			$data['categoryaccordionmenu_fm_child_padding_right'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_padding_bottom'])) {
			$data['categoryaccordionmenu_fm_child_padding_bottom'] = $this->request->post['categoryaccordionmenu_fm_child_padding_bottom'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_padding_bottom'])) {
			$data['categoryaccordionmenu_fm_child_padding_bottom'] = $store_info['categoryaccordionmenu_fm_child_padding_bottom'];
		} else {
			$data['categoryaccordionmenu_fm_child_padding_bottom'] = '';
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_child_padding_left'])) {
			$data['categoryaccordionmenu_fm_child_padding_left'] = $this->request->post['categoryaccordionmenu_fm_child_padding_left'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_child_padding_left'])) {
			$data['categoryaccordionmenu_fm_child_padding_left'] = $store_info['categoryaccordionmenu_fm_child_padding_left'];
		} else {
			$data['categoryaccordionmenu_fm_child_padding_left'] = '';
		}
		/* Child Category Settings END */
		
		/* Collaps/Expand Settings START */
		if (isset($this->request->post['categoryaccordionmenu_fm_cebtn_icon_color'])) {
			$data['categoryaccordionmenu_fm_cebtn_icon_color'] = $this->request->post['categoryaccordionmenu_fm_cebtn_icon_color'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_cebtn_icon_color'])) {
			$data['categoryaccordionmenu_fm_cebtn_icon_color'] = $store_info['categoryaccordionmenu_fm_cebtn_icon_color'];
		} else {
			$data['categoryaccordionmenu_fm_cebtn_icon_color'] = $this->config->get('categoryaccordionmenu_fm_cebtn_icon_color');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_cbtn_icon'])) {
			$data['categoryaccordionmenu_fm_cbtn_icon'] = $this->request->post['categoryaccordionmenu_fm_cbtn_icon'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_cbtn_icon'])) {
			$data['categoryaccordionmenu_fm_cbtn_icon'] = $store_info['categoryaccordionmenu_fm_cbtn_icon'];
		} else {
			$data['categoryaccordionmenu_fm_cbtn_icon'] = $this->config->get('categoryaccordionmenu_fm_cbtn_icon');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_ebtn_icon'])) {
			$data['categoryaccordionmenu_fm_ebtn_icon'] = $this->request->post['categoryaccordionmenu_fm_ebtn_icon'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_ebtn_icon'])) {
			$data['categoryaccordionmenu_fm_ebtn_icon'] = $store_info['categoryaccordionmenu_fm_ebtn_icon'];
		} else {
			$data['categoryaccordionmenu_fm_ebtn_icon'] = $this->config->get('categoryaccordionmenu_fm_ebtn_icon');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_fm_cebtn_icon_size'])) {
			$data['categoryaccordionmenu_fm_cebtn_icon_size'] = $this->request->post['categoryaccordionmenu_fm_cebtn_icon_size'];
		} elseif (isset($store_info['categoryaccordionmenu_fm_cebtn_icon_size'])) {
			$data['categoryaccordionmenu_fm_cebtn_icon_size'] = $store_info['categoryaccordionmenu_fm_cebtn_icon_size'];
		} else {
			$data['categoryaccordionmenu_fm_cebtn_icon_size'] = $this->config->get('categoryaccordionmenu_fm_cebtn_icon_size');
		}
		/* Collaps/Expand Settings END */
		
		
		/* Custom/Extra Class Settings START */
		if (isset($this->request->post['categoryaccordionmenu_custom_cls_parent'])) {
			$data['categoryaccordionmenu_custom_cls_parent'] = $this->request->post['categoryaccordionmenu_custom_cls_parent'];
		} elseif (isset($store_info['categoryaccordionmenu_custom_cls_parent'])) {
			$data['categoryaccordionmenu_custom_cls_parent'] = $store_info['categoryaccordionmenu_custom_cls_parent'];
		} else {
			$data['categoryaccordionmenu_custom_cls_parent'] = $this->config->get('categoryaccordionmenu_custom_cls_parent');
		}
		
		if (isset($this->request->post['categoryaccordionmenu_custom_cls_child'])) {
			$data['categoryaccordionmenu_custom_cls_child'] = $this->request->post['categoryaccordionmenu_custom_cls_child'];
		} elseif (isset($store_info['categoryaccordionmenu_custom_cls_child'])) {
			$data['categoryaccordionmenu_custom_cls_child'] = $store_info['categoryaccordionmenu_custom_cls_child'];
		} else {
			$data['categoryaccordionmenu_custom_cls_child'] = $this->config->get('categoryaccordionmenu_custom_cls_child');
		}
		/* Custom/Extra Class Settings END */
		
		/* RTL Language Settings Settings START */
		if (isset($this->request->post['categoryaccordionmenu_rtl'])) {
			$data['categoryaccordionmenu_rtl'] = $this->request->post['categoryaccordionmenu_rtl'];
		} elseif (isset($store_info['categoryaccordionmenu_rtl'])) {
			$data['categoryaccordionmenu_rtl'] = $store_info['categoryaccordionmenu_rtl'];
		} else {
			$data['categoryaccordionmenu_rtl'] = $this->config->get('categoryaccordionmenu_rtl');
		}
		/* RTL Language Settings Settings END */
		
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/module/categoryaccordionmenu_setting_store', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/module/categoryaccordionmenu')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
}