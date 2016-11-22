<?php
require_once 'vendor/autoload.php'; // Auto load classes required to run selenium as defined by composer
use Symfony\Component\Yaml\Yaml;    // Symfony YAML parser 
require_once 'engine/engine.php';   // Main engine class which convert YAML Rules to functional instruction



class issuer_register  extends PHPUnit_Extensions_Selenium2TestCase{
	
	var $settings_array;
	var $global_array;
	
	public function setup(){
		//Drupal\Engine\setup::setup_selenium();
		$this->global_array = Yaml::parse(file_get_contents('settings/Global.yml'));
		
		// Define Selenium Server
        $this->setHost($this->global_array['global']['host']);

        // Define Selenium Port
        $this->setPort($this->global_array['global']['port']);
		
		
		$line = readline("Please Enter For which website you want to perform the test
		1.) ZIS.dev
		2.) ZIS.stage
		3.) ZIS.prod
		4.) DEMO.dev
		5.) DEMO.stage
		6.) DEMO.prod
		");
		
		$config_file=explode('.',$line);
		
		try{
		$this->settings_array = Yaml::parse(file_get_contents('settings/'.strtoupper($config_file[0]).'.yml'));
		}catch(Exception $e){
		print ("No settings file found, quiting  \n");	
		exit();
		}
		
		// Define URL on which test need to perform DEMO
        $this->setBrowserUrl($this->settings_array[$config_file[1]]['url']);
		
		// Define browser
        $this->setBrowser($this->global_array['global']['browser']);

        //Set Timeout value for selenium
		$this->setSeleniumServerRequestsTimeout($this->global_array['global']['timeout']);
		
		
	}
	
	public function test_issuer_register(){
				
		/**
		 * Run Rule using engine.
		 * @ $this->settings_array['issuer_register_rule'] = Provide which YAML rule array to parse 
		 */
		Drupal\Engine\engine::run_rule($this->settings_array['issuer_register_rule']);
		
	}
	
}

