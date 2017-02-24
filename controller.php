<?php
/**
 * 
 * @author Krios Mane - FABteam
 * @version 0.10.0
 * @license https://opensource.org/licenses/GPL-3.0
 * 
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Plugin_fab_system_logs extends FAB_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->input->is_cli_request()){ //avoid this form command line
			//check if there's a running task
			//load libraries, models, helpers
			$this->load->model('Tasks', 'tasks');
			$this->runningTask = $this->tasks->getRunning();
		}
	}

	public function index()
	{
		$this->load->library('smart');
		$this->load->helper('form');
		$this->load->helper('fabtotum_helper');
		$this->load->helper('plugin_helper');
		
		$data = array();
		
		$widgetOptions = array(
			'sortable'     => false, 'fullscreenbutton' => true,  'refreshbutton' => false, 'togglebutton' => false,
			'deletebutton' => false, 'editbutton'       => false, 'colorbutton'   => false, 'collapsed'    => false
		);
		
		$widgeFooterButtons = '';

		$widget         = $this->smart->create_widget($widgetOptions);
		$widget->id     = 'main-widget-head-installation';
		$widget->header = array('icon' => 'fa-files-o', "title" => "<h2>System logs</h2>");
		$widget->body   = array('content' => $this->load->view(plugin_url('main_widget'), $data, true ), 'class'=>'');

		$this->addJsInLine($this->load->view(plugin_url('js'), $data, true));
		$this->content = $widget->print_html(true);
		$this->view();
	}
	
	/**
	 * 
	 */
	public function download()
	{
		$this->load->helper('plugin_helper');
		$this->load->helper('download');
		$this->load->config('fabtotum');
		
		$archive = $this->config->item('temp_path').'archive.tar.gz';
		startPluginBashScript('compress_log_files.sh', $archive, false, true);
		
		force_download($archive, null);
	}

 }
 
?>