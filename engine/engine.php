<?php
namespace Drupal\Engine;

class engine {
	
	function run_rule($rule_array){
		
			foreach($rule_array as $key => $rule){
				
			$expression = null;
			$key_fragment = explode('_',$key);
			
			
			if($key_fragment[1] =='url'){
			 $this->url($rule);	
			}elseif($key_fragment[1] =='xpath'){
				
					if($key_fragment[2] =='click'){
					$expression = trim(str_replace('(s-q)','\'',$rule));
				  	$this->byXPath($expression)->click();
					}else if($key_fragment[2] =='submit'){
					$expression = trim(str_replace('(s-q)','\'',$rule));
				  	$this->byXPath($expression)->submit();
					}else if($key_fragment[2] =='value'){	
					$expression = trim(str_replace('(s-q)','\'',$rule));
					$separation = explode('(sep)',trim($expression));
				  	$this->byXPath($separation[0])->value($separation[1]);
					}else if($key_fragment[2] =='clear'){
					$expression = trim(str_replace('(s-q)','\'',$rule));
				  	$this->byXPath($expression)->clear();
					}
				
			}elseif($key_fragment[1] =='select'){
				
					if($key_fragment[2] =='id' && $key_fragment[3] =='option'){
					$separation = explode('(sep)',trim($rule));
					$this->select($this->byId($separation[0]))->selectOptionByValue($separation[1]);	
					}
			}elseif($key_fragment[1] =='captcha'){
					$line = readline("After enter captcha within browser,press 1 & then Enter : ");
					
					if($line ==1) 
     				continue;
			} 

			
		}
		
	}
	
}
