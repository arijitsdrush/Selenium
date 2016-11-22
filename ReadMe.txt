Installation & Execution
=============================
1.)Install JDK using following command
sudo apt-get install openjdk-7-jre-headless -y

2.)Install firefox using following command
sudo apt-get install firefox -y

3.)Install headless GUI for firefox
sudo apt-get install xvfb -y

4.)Install subversion
sudo apt-get install subversion

5.)Download latest selenium jar from (Selenium Standalone Server) 
http://www.seleniumhq.org/download/ 

6.)Start Selenium Server using following command
java -jar selenium-server-standalone-<version>.jar -port 4444

7.)Check if selenium is running at
http://localhost:4444/wd/hub

8.)Chekout test folder from svn 

9.)Install local version of phpunit using following command
wget https://phar.phpunit.de/phpunit.phar

10)Install php 5.6 with some necessary extensions in server using following commands

a.)apt-get -y update
b.)add-apt-repository ppa:ondrej/php5-5.6
c.)apt-get -y update
d.)apt-get -y install php5 php5-mhash php5-mcrypt php5-curl php5-cli php5-mysql php5-gd php5-intl php5-xsl

11.)Run phpuint using following command
php phpunit.phar <filename>.php

12.) For any documentation of Selenium2Testcase look at url:
https://github.com/giorgiosironi/phpunit-selenium/blob/master/Tests/Selenium2TestCaseTest.php


How it works?
====================
1.) Yml files are written within "settings" folder.

a.) Global.yml - Represents selenioum 
b.) ZIS.yml    - Represents ZacksInvest site
c.) DEMO.yml   - Represents Demo Zacksws site

2.) engine.php file is written within "Engine" folder

To run engine.php file, need to call Drupal\Engine\engine::run_rule($this->settings_array['']); from individual process file. We have to pass the rule through "$this->settings_array['']", which we need to run. 

Example- we write our issuer registration process within issuer_register.php file & we pass 'issuer_register_rule' through "$this->settings_array['issuer_register_rule']". 


Explanation of Yml file (Representer of a site, example - ZIS.yml)
=======================================================================

1.) In first 3 lines; dev, stage & production server site urls are defined.

2.) Then rules are defined.

3.) The numeric number defines the order of sequence to process and also it gives us unique key.

4.) _url defines $this->url()

5.) _xpath_click defines $this->byXPath() with click() event

6.) (s-q) define single quote

7) _xpath_submit defines $this->byXPath() with submit() action

8.) _select_id_option defines $this->select($this->byId())

9.) (sep) define to saparate value

10.) _captcha define to Give User Chance To Enter Captcha in web page

11.) _xpath_clear defines $this->byXPath() with clear() event
























 

