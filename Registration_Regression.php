<?php
require_once 'vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

class Registration_Regression extends PHPUnit_Extensions_Selenium2TestCase{
	
	var $zis_yml_array;
	var $global_array;
	var $line;
	
    public function setUp()
    {
    	
    	$this->zis_yml_array = Yaml::parse(file_get_contents('settings/ZIS.yml'));
		$this->global_array = Yaml::parse(file_get_contents('settings/Global.yml'));
		
		/*$readline = new Hoa\Console\Readline\Readline();
		$line     = $readline->readLine(''); // “> ” is the prefix of the line.*/
		
		$processus = new Hoa\Console\Processus();
		$processus->writeAll('foobar');
		exit();				
 
		

			
        // Define Selenium Server
        $this->setHost($this->global_array['global']['host']);

        // Define Selenium Port
        $this->setPort($this->global_array['global']['port']);

        // Define URL on which test need to perform DEMO
        $this->setBrowserUrl($this->zis_yml_array[$input['']]['url']);

        // Define browser
        $this->setBrowser($this->global_array['global']['browser']);

        //Set Timeout value for selenium
		$this->setSeleniumServerRequestsTimeout($this->global_array['global']['timeout']);
    }


    public function testIssuerRegisterRegression()
    {
	    //Go to Home Page
	    $this->url('/');

	    //Click on Creste New Account       
	    //$this->byXPath('//li[@id=\'menu-item-4640\']/a')->click();

		//Go to Log In or Register Page
        $this->url('/login-register');

	    //Click on Register as Issuer
	    $this->byXPath('//div[@id=\'block-block-44\']/p[5]/a')->click();
	    
	     
	    // Select Type of Issuer
	    $this->byXPath('//input[@id=\'edit-submit\']')->submit();


	    $this->byXPath('//input[@id=\'edit-issuer-type-4\']')->click();
	    $this->select($this->byId('edit-field-reg-a-offering'))->selectOptionByValue('_none');
	    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

	    $this->byXPath('//input[@id=\'edit-issuer-type-4\']')->click();
	    $this->select($this->byId('edit-field-reg-a-offering'))->selectOptionByValue('1');
	    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
	    

	    $this->byXPath('//input[@id=\'edit-issuer-type-5\']')->click();
	    $this->select($this->byId('edit-field-which-state-is-your-offeri'))->selectOptionByValue('_none');
	    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

	    $this->byXPath('//input[@id=\'edit-issuer-type-5\']')->click();
	    $this->select($this->byId('edit-field-which-state-is-your-offeri'))->selectOptionByValue('IL');
	    $this->byXPath('//input[@id=\'edit-submit\']')->submit();	


	    $this->byXPath('//input[@id=\'edit-issuer-type-3\']')->click();
	    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
	    
	    //Get User Input from Console	
	    $handle = fopen ("php://stdin","r");
	    $line = fgets($handle);
		
	    if($line !="") //Give User Chance To Enter Captcha in web page, and then add any line in console to continue test case
        { 	
		
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            
            // Put value at First Name at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-fname\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();	
		    
		    $this->byXPath('//input[@id=\'edit-fname\']')->clear();
		    $this->byXPath('//input[@id=\'edit-fname\']')->value("John");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Last Name at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-lname\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();	
			    
		    $this->byXPath('//input[@id=\'edit-lname\']')->clear();
		    $this->byXPath('//input[@id=\'edit-lname\']')->value("Doe");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at E-mail Address at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-email\']')->value("a@a");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
			    
		    $this->byXPath('//input[@id=\'edit-email\']')->clear();
		    $this->byXPath('//input[@id=\'edit-email\']')->value("a@@");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
				    
		    $this->byXPath('//input[@id=\'edit-email\']')->clear();
		    $this->byXPath('//input[@id=\'edit-email\']')->value("a@a.c@.com");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-email\']')->clear();
		    $this->byXPath('//input[@id=\'edit-email\']')->value("a@a.c@com");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();	
		    
		    $this->byXPath('//input[@id=\'edit-email\']')->clear();
		    $this->byXPath('//input[@id=\'edit-email\']')->value("drupaldev@zacks.com");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

		    $this->byXPath('//input[@id=\'edit-email\']')->clear();
		    $this->byXPath('//input[@id=\'edit-email\']')->value("zacksibtestin@gmail.com");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Phone at Issuer Registration
		    $this->byXPath('//input[@id=\'issuer-phone\']')->value("1");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
				    
		    $this->byXPath('//input[@id=\'issuer-phone\']')->clear();
		    $this->byXPath('//input[@id=\'issuer-phone\']')->value("123456789");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'issuer-phone\']')->clear();
		    $this->byXPath('//input[@id=\'issuer-phone\']')->value("12345678912");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();	
			    
		    $this->byXPath('//input[@id=\'issuer-phone\']')->clear();
		    $this->byXPath('//input[@id=\'issuer-phone\']')->value("1234567890");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Country at Issuer Registration
		    $this->select($this->byId('country-change'))->selectOptionByValue('US');
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Address at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-address\']')->value("Chicago");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at City at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-city\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();	
				    
		    $this->byXPath('//input[@id=\'edit-city\']')->clear();
		    $this->byXPath('//input[@id=\'edit-city\']')->value("Chicago");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at State/Providence at Issuer Registration
		    $this->select($this->byId('state-change'))->selectOptionByValue('IL');
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Zip Code at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-zip\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
				    
		    $this->byXPath('//input[@id=\'edit-zip\']')->clear();
		    $this->byXPath('//input[@id=\'edit-zip\']')->value(1);
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
				    
		    $this->byXPath('//input[@id=\'edit-zip\']')->clear();
		    $this->byXPath('//input[@id=\'edit-zip\']')->value(1234);
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();	
				    
		    $this->byXPath('//input[@id=\'edit-zip\']')->clear();
		    $this->byXPath('//input[@id=\'edit-zip\']')->value(12345);
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Company Name at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-c-name\']')->value("Test Company");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Company/General Partner Website at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-general-website\']')->value("test.com");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Company Telephone at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-c-phone\']')->value("1");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
				    
		    $this->byXPath('//input[@id=\'edit-c-phone\']')->clear();
		    $this->byXPath('//input[@id=\'edit-c-phone\']')->value("123456789");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-c-phone\']')->clear();
		    $this->byXPath('//input[@id=\'edit-c-phone\']')->value("12345678912");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
			    
		    $this->byXPath('//input[@id=\'edit-c-phone\']')->clear();
		    $this->byXPath('//input[@id=\'edit-c-phone\']')->value("1234567890");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Are you working with an Investment Banker/ Broker on your Reg D offering now ? at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-ib-or-broker-0\']')->click();
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Username at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-username\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
				    
		    $this->byXPath('//input[@id=\'edit-username\']')->value("A");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
				    
		    $this->byXPath('//input[@id=\'edit-username\']')->clear();
		    $this->byXPath('//input[@id=\'edit-username\']')->value("zis_tester_issuer");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Password & Confirm Password at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
				    
		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("A");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
				    
		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->clear();
		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("A");
		    $this->byXPath('//input[@id=\'edit-pass-pass2\']')->value("A");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->clear();
		    $this->byXPath('//input[@id=\'edit-pass-pass2\']')->clear();
		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("ABC12");
		    $this->byXPath('//input[@id=\'edit-pass-pass2\']')->value("A");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->clear();
		    $this->byXPath('//input[@id=\'edit-pass-pass2\']')->clear();
		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("ABC12");
		    $this->byXPath('//input[@id=\'edit-pass-pass2\']')->value("ABC12");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();	

		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->clear();
		    $this->byXPath('//input[@id=\'edit-pass-pass2\']')->clear();
		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("ABC123");
		    $this->byXPath('//input[@id=\'edit-pass-pass2\']')->value("ABC123");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            // Put value at Do you agree with TERMS OF SERVICE at Issuer Registration
		    $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("ABC123");
		    $this->byXPath('//input[@id=\'edit-pass-pass2\']')->value("ABC123");
		    $this->byXPath('//input[@id=\'edit-agree-1\']')->click();
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

		    $this->timeouts()->implicitWait(400000);

	    }
    }


	public function testInvestorRegisterRegression()
    {
		
	    //Go to Home Page
	    $this->url('/');

		//Go to Log In or Register Page
        $this->url('/login-register');

	    //Click on Register as Issuer
	    $this->byXPath('//div[@id=\'block-block-44\']/p[3]/a')->click();
		
		
		$handle = fopen ("php://stdin","r");
		$line = fgets($handle);
		
		if($line !="") //Give User Chance To Enter Captcha in web page, and then add any line in console to continue test case
        { 

            // Put value at First Name at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-register-first-name-und-0-value\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    		    
		    $this->byXPath('//input[@id=\'edit-field-register-first-name-und-0-value\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-first-name-und-0-value\']')->value("John");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Last Name at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-register-last-name-und-0-value\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    		    
		    $this->byXPath('//input[@id=\'edit-field-register-last-name-und-0-value\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-last-name-und-0-value\']')->value("Doe");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Username at Investor Registration
		    $this->byXPath('//input[@id=\'edit-name\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-name\']')->value("A");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-name\']')->clear();
		    $this->byXPath('//input[@id=\'edit-name\']')->value("zis_tester_investor");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at E-mail Address at Investor Registration
		    $this->byXPath('//input[@id=\'edit-mail\']')->value("a@a");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-mail\']')->clear();
		    $this->byXPath('//input[@id=\'edit-mail\']')->value("a@@");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-mail\']')->clear();
		    $this->byXPath('//input[@id=\'edit-mail\']')->value("a@a.c@.com");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-mail\']')->clear();
		    $this->byXPath('//input[@id=\'edit-mail\']')->value("a@a.c@com");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();

            $this->byXPath('//input[@id=\'edit-mail\']')->clear();
            $this->byXPath('//input[@id=\'edit-mail\']')->value("drupaldev@zacks.com");
            $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-mail\']')->clear();
		    $this->byXPath('//input[@id=\'edit-mail\']')->value("zacksib.test.in@gmail.com");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Phone at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-register-phone-und-0-value\']')->value("1");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-field-register-phone-und-0-value\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-phone-und-0-value\']')->value("123456789");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-field-register-phone-und-0-value\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-phone-und-0-value\']')->value("12345678912");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-field-register-phone-und-0-value\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-phone-und-0-value\']')->value("1234567890");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Address 1 at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-thoroughfare\']')->value("Chicago");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at City at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-locality\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-locality\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-locality\']')->value("Alexander City");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at State at Investor Registration
		    $this->select($this->byId('edit-field-register-address-und-0-administrative-area'))->selectOptionByValue('IL');
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Zip Code at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-postal-code\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-postal-code\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-postal-code\']')->value(1);
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-postal-code\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-postal-code\']')->value(1234);
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-postal-code\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-address-und-0-postal-code\']')->value(12345);
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Type of Investor at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-type-of-investor-und-0-field-please-specify-what-type-o-und-3\']')->click();
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Please confirm each of the following statements at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-other-information-und-0-field-please-confirm-each-of-the-und-1\']')->click();
		    $this->byXPath('//input[@id=\'edit-field-other-information-und-0-field-please-confirm-each-of-the-und-2\']')->click();
		    $this->byXPath('//input[@id=\'edit-field-other-information-und-0-field-please-confirm-each-of-the-und-3\']')->click();
		    $this->byXPath('//input[@id=\'edit-field-other-information-und-0-field-please-confirm-each-of-the-und-4\']')->click();
		    $this->byXPath('//input[@id=\'edit-field-other-information-und-0-field-please-confirm-each-of-the-und-5\']')->click();
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Professional Occupation at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-professional-occupation-und-0-value\']')->value(" ");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->byXPath('//input[@id=\'edit-field-professional-occupation-und-0-value\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-professional-occupation-und-0-value\']')->value('Tester');
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
            // Put value at Signature at Investor Registration
		    $this->byXPath('//input[@id=\'edit-field-register-signature-und-0-value\']')->value("Len Zacks");
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $signature = $this->byXPath('//input[@id=\'edit-field-register-first-name-und-0-value\']')->value().' '.
		    $this->byXPath('//input[@id=\'edit-field-register-last-name-und-0-value\']')->value();
		    
		    $this->byXPath('//input[@id=\'edit-field-register-signature-und-0-value\']')->clear();
		    $this->byXPath('//input[@id=\'edit-field-register-signature-und-0-value\']')->value($signature);
		    $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		    
		    $this->timeouts()->implicitWait(400000);
		    
		}
    }


    public function testAccreditedInvesterRegisterRegression()    
    {
        //Go to Home Page
        $this->url('/');

        //Click on Intrastate Crowdfunding       
        $this->byXPath('//a[@id=\'quicktabs-tab-home_page_offering_tabs-4\']')->click();

		//Go to Intrastate Crowdfunding Registration Page
        $this->url('/intrastate-crowdfunding-registration');
                
        //Get User Input from Console    
        $handle = fopen ("php://stdin","r");
        $line = fgets($handle);
        
        if($line !="") //Give User Chance To Enter Captcha in web page, and then add any line in console to continue test case
        { 
            // Blank form submit
            $this->byXPath('//input[@id=\'edit-button\']')->submit();

            // Put value at First Name at State of Residence Verification
            $this->byXPath('//input[@id=\'edit-fname\']')->value(" ");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
                        
            $this->byXPath('//input[@id=\'edit-fname\']')->clear();
            $this->byXPath('//input[@id=\'edit-fname\']')->value("John");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            // Put value at Last Name at State of Residence Verification
            $this->byXPath('//input[@id=\'edit-lname\']')->value(" ");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
                        
            $this->byXPath('//input[@id=\'edit-lname\']')->clear();
            $this->byXPath('//input[@id=\'edit-lname\']')->value("Doe");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            // Put value at E-mail Address at State of Residence Verification
            $this->byXPath('//input[@id=\'edit-email\']')->value("a@a");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            $this->byXPath('//input[@id=\'edit-email\']')->clear();
            $this->byXPath('//input[@id=\'edit-email\']')->value("a@@");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            $this->byXPath('//input[@id=\'edit-email\']')->clear();
            $this->byXPath('//input[@id=\'edit-email\']')->value("a@a.c@.com");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            $this->byXPath('//input[@id=\'edit-email\']')->clear();
            $this->byXPath('//input[@id=\'edit-email\']')->value("a@a.c@com");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();

            $this->byXPath('//input[@id=\'edit-email\']')->clear();
            $this->byXPath('//input[@id=\'edit-email\']')->value("drupaldev@zacks.com");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            $this->byXPath('//input[@id=\'edit-email\']')->clear();
            $this->byXPath('//input[@id=\'edit-email\']')->value("zacks.ib.test.in@gmail.com");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();

            // Put value at Phone at State of Residence Verification
            $this->byXPath('//input[@id=\'issuer-phone\']')->value("1");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            $this->byXPath('//input[@id=\'issuer-phone\']')->clear();
            $this->byXPath('//input[@id=\'issuer-phone\']')->value("123456789");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            $this->byXPath('//input[@id=\'issuer-phone\']')->clear();
            $this->byXPath('//input[@id=\'issuer-phone\']')->value("12345678912");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            $this->byXPath('//input[@id=\'issuer-phone\']')->clear();
            $this->byXPath('//input[@id=\'issuer-phone\']')->value("1234567890");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            // Put value at Username at State of Residence Verification
            $this->byXPath('//input[@id=\'edit-username\']')->value(" ");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            $this->byXPath('//input[@id=\'edit-username\']')->value("A");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
            
            $this->byXPath('//input[@id=\'edit-username\']')->clear();
            $this->byXPath('//input[@id=\'edit-username\']')->value("zis_tester_accredited_investor");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();

            // Put value at Password & Confirm Password at State of Residence Verification
            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value(" ");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
                    
            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("A");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();
                    
            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->clear();
            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("A");
            $this->byXPath('//input[@id=\'edit-pass-pass2\']')->value("A");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();

            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->clear();
            $this->byXPath('//input[@id=\'edit-pass-pass2\']')->clear();
            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("ABC12");
            $this->byXPath('//input[@id=\'edit-pass-pass2\']')->value("A");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();

            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->clear();
            $this->byXPath('//input[@id=\'edit-pass-pass2\']')->clear();
            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("ABC12");
            $this->byXPath('//input[@id=\'edit-pass-pass2\']')->value("ABC12");
            $this->byXPath('//input[@id=\'edit-button\']')->submit();    

            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->clear();
            $this->byXPath('//input[@id=\'edit-pass-pass2\']')->clear();
            $this->byXPath('//input[@id=\'edit-pass-pass1\']')->value("ABC123");
            $this->byXPath('//input[@id=\'edit-pass-pass2\']')->value("ABC123");

            $this->byXPath('//input[@id=\'edit-button\']')->submit();  //Finally Hit Submit Button
            
            $this->timeouts()->implicitWait(400000);   //Wait for redirect to home page and see confirm message
            
        }        
    } 
    

	public function testFooterHomePage()
	{
		//Go to Home Page
		$this->url('/');
		
		// Get Page source
        $source = $this->source();
        
        // Reports an error if footer is not an element of the page.
        $this->assertContains('<div class="extreme_footer">', $source);
        
        // Reports an error if footer banner is not an element of the page.
        $this->assertContains('<div class="footer-banner">', $source);
		$this->assertContains('href="http://www.sec.gov/answers/accred.htm">', $source);
		$this->assertContains('href="bad-actor-resource-directory-0">', $source);
		$this->assertContains('href="event-created">', $source);
		
		// Reports an error if footer social menu is not an element of the page.
        $this->assertContains('<div class="footer-social-menu">', $source);
		$this->assertContains('<img alt="linkdin"', $source);
		$this->assertContains('<img alt="twitter"', $source);
		$this->assertContains('<img alt="facebook"', $source);
		
		// Reports an error if footer sitesil is not an element of the page.
		$this->assertContains('<div class="siteseal">', $source);
		
		// Reports an error if Brokercheck Logo is not an element of the page.
		$this->assertContains('<img alt="brokercheck"', $source);
		
		// Reports an error if Godaddy Logo is not an element of the page.
		$this->assertContains('<img alt="SSL site seal - click to verify"', $source);
		
		// Reports an error if footer menu is not an element of the page.
		$this->assertContains('<div class="footer-menu-wrapper">', $source);
		$this->assertContains('<a href="/privacy-policy">', $source);
		$this->assertContains('<a href="/terms-service">', $source);
		$this->assertContains('<a href="/fair-use-disclaimer">', $source);
		$this->assertContains('<a href="/contact-us">', $source);
		
		// Reports an error if Copyright is not an element of the page.
		$this->assertContains('<div class="copyright">', $source);
		
		// Reports an error if FINRA/SIPC is not an element of the page.
		$this->assertContains('<div class="disclaimer-wrap">', $source);
		$this->assertContains('href="http://www.finra.org/">', $source);
		$this->assertContains('href="http://www.sipc.org/">', $source);
		
	} 
    	
    
    public function testInvesterLogin()
    {
        //Go to Home Page
        $this->url('/');
 
  		//Go to Log In or Register Page
        $this->url('/login-register');

        //Click on Log In    
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
        
		//Put value at Username without Password
        $this->byXPath('//input[@id=\'edit-name\']')->value("zis_tester_investor");
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
        
		//Put value at Password without Username
        $this->byXPath('//input[@id=\'edit-name\']')->clear();
        $this->byXPath('//input[@id=\'edit-pass\']')->value("ABC123");
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
        
		//Put value at wrong Username & wrong Password
        $this->byXPath('//input[@id=\'edit-name\']')->clear();
        $this->byXPath('//input[@id=\'edit-pass\']')->clear(); 
        $this->byXPath('//input[@id=\'edit-name\']')->value("dipans");
        $this->byXPath('//input[@id=\'edit-pass\']')->value("dipano");
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		
		//Put value at Username & Password
        $this->byXPath('//input[@id=\'edit-name\']')->clear();
        $this->byXPath('//input[@id=\'edit-pass\']')->clear(); 
        $this->byXPath('//input[@id=\'edit-name\']')->value("zis_tester_investor");
        $this->byXPath('//input[@id=\'edit-pass\']')->value("ABC123");
		
        $this->byXPath('//input[@id=\'edit-submit\']')->submit(); //Finally Hit Log In Button

        //Go to Home Page
        $this->url('/');
        
        $this->timeouts()->implicitWait(400000);  //Wait for redirect to home page and see confirm message
    
    }  
    

    public function testIssuerLogin()
    {
        //Go to Home Page
        $this->url('/');
 
  		//Go to Log In or Register Page
        $this->url('/login-register');

        //Click on Log In       
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
        
        //Put value at Username without Password
        $this->byXPath('//input[@id=\'edit-name\']')->value("zis_tester_issuer");
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
        
		//Put value at Password without Username
        $this->byXPath('//input[@id=\'edit-name\']')->clear();
        $this->byXPath('//input[@id=\'edit-pass\']')->value("ABC123");
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
        
		//Put value at wrong Username & wrong Password
        $this->byXPath('//input[@id=\'edit-name\']')->clear();
        $this->byXPath('//input[@id=\'edit-pass\']')->clear(); 
        $this->byXPath('//input[@id=\'edit-name\']')->value("dipans");
        $this->byXPath('//input[@id=\'edit-pass\']')->value("dipano");
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		
		//Put value at Username & Password
        $this->byXPath('//input[@id=\'edit-name\']')->clear();
        $this->byXPath('//input[@id=\'edit-pass\']')->clear(); 
        $this->byXPath('//input[@id=\'edit-name\']')->value("zis_tester_issuer");
        $this->byXPath('//input[@id=\'edit-pass\']')->value("ABC123");
		
        $this->byXPath('//input[@id=\'edit-submit\']')->submit(); //Finally Hit Log In Button

        //Go to Home Page
        $this->url('/');
                
        $this->timeouts()->implicitWait(400000);  //Wait for redirect to home page and see confirm message
    
    }  


    public function testAccreditedInvesterLogin()
    {
        //Go to Home Page
        $this->url('/');
 
  		//Go to Log In or Register Page
        $this->url('/login-register');

        //Click on Log In       
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
        
		//Put value at Username without Password
        $this->byXPath('//input[@id=\'edit-name\']')->value("zis_tester_accredited_investor");
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
        
		//Put value at Password without Username
        $this->byXPath('//input[@id=\'edit-name\']')->clear();
        $this->byXPath('//input[@id=\'edit-pass\']')->value("ABC123");
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
        
		//Put value at wrong Username & wrong Password
        $this->byXPath('//input[@id=\'edit-name\']')->clear();
        $this->byXPath('//input[@id=\'edit-pass\']')->clear(); 
        $this->byXPath('//input[@id=\'edit-name\']')->value("dipans");
        $this->byXPath('//input[@id=\'edit-pass\']')->value("dipano");
        $this->byXPath('//input[@id=\'edit-submit\']')->submit();
		
		//Put value at Username & Password
        $this->byXPath('//input[@id=\'edit-name\']')->clear();
        $this->byXPath('//input[@id=\'edit-pass\']')->clear(); 
        $this->byXPath('//input[@id=\'edit-name\']')->value("zis_tester_accredited_investor");
        $this->byXPath('//input[@id=\'edit-pass\']')->value("ABC123");
		
        $this->byXPath('//input[@id=\'edit-submit\']')->submit(); //Finally Hit Log In Button

        //Go to Home Page
        $this->url('/');
                
        $this->timeouts()->implicitWait(400000);  //Wait for redirect to home page and see confirm message

    }  
        
    
    public function testLinkedinLogin()
    {
        
        //Go to Home Page
        $this->url('/');

  		//Go to Log In or Register Page
        $this->url('/login-register');

	    //Click on Register Using LinkedIn       
        $this->byXPath('//div[@id=\'block-block-44\']/p[2]/a')->click();
        
		//Put value at Email or Phone & Password
        $this->byXPath('//input[@id=\'session_key-oauthAuthorizeForm\']')->value("dipan.das1987@gmail.com");
        $this->byXPath('//input[@id=\'session_password-oauthAuthorizeForm\']')->value("5280724789");
        
        $this->byXPath('//div[@id=\'body\']/div/form/div[2]/ul/li[1]/input')->submit(); //Finally Hit Allow access Button
        
        $this->timeouts()->implicitWait(400000);  //Wait for redirect to home page and see confirm message
        
    } 
	
	
    public function testFacebookLogin()
    {
        
        //Go to Home Page
        $this->url('/');
        
  		//Go to Log In or Register Page
        $this->url('/login-register');

	    //Click on Register Using Facebook       
        $this->byXPath('//div[@id=\'block-block-44\']/p[1]/a')->click();
        
        
		//Put value at Email Address or Phone Number & Password
        $this->byXPath('//input[@id=\'email\']')->value("dipandas1988@gmail.com");
        $this->byXPath('//input[@id=\'pass\']')->value("5280724789");
        
        $this->byXPath('//button[@id=\'loginbutton\']')->submit(); //Finally Hit Log In Button
        
        $this->timeouts()->implicitWait(400000);  //Wait for redirect to home page and see confirm message
        
    }    

	
	public function tearDown()
	{
        echo "\n Execution Complete";
        $this->stop();
	}
	
}
