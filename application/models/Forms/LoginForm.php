<?php
/**
 * @package Versus_Forms
 */
/**
 * The Login form , with username and password and related validators
 */ 
class Application_Model_Forms_LoginForm extends Application_Model_Forms_SimpleForm{
	
	protected function _init(){
	
        $username = new Application_Model_Forms_Elements_Input( "text", "username or email address", array(
				"name"=>"username",
				"id"=>"username" ));
				
			
		$username->setValidator( new Ui_Forms_Validators_Switch( 
			array (
				"validators" => array(
					new Application_Model_Forms_Validators_EmailValidator() ,
					new Ui_Forms_Validators_Pattern( array( 
						"minLength" => 2,
						"pattern"	=> Ui_Forms_Validators_Pattern::$USERNAME,
						"patternDescription" => "should contain only a-z characters"
					))
				)
			)
		));
		
		$password = new Application_Model_Forms_Elements_Input( "password", "password", array(
			"name"=>"password",
			"id"=>"password"
		));
		
		$password->setValidator( new Application_Model_Forms_Validators_PasswordValidator( array( 
			"minLength" => 4
		)));
		
		$submit = new Application_Model_Forms_Elements_Input( "submit", $this->title, array(
			"name"  => "send_login",
			"id"    => "send_login",
			"value" => $this->title
		));

		$this->content = "";
		
		/** add created element */
		$this->addElement( $username );
		$this->addElement( $password );
		$this->addElement( $submit );
		
    }
	
	public function __toString(){
		$this->content = '
		<div class="grid_24 alpha omega">
			<div class="grid_1 alpha">
				&nbsp; <input type="hidden" name="form-action" value="'.$this->id.'"/>
			</div>
			<div class="grid_4" style="text-align: right;padding-top:6px"><p>'.$this->username->label.'</p></div>
			<div class="grid_5">
				<p>'.$this->username.'</p>
			</div>
			<div class="grid_4" style="text-align: right;padding-top:6px"><p>'.$this->password->label.'</p></div>
			<div class="grid_5">
				<p>'.$this->password.'</p>
			</div>
			<div class="grid_1 suffix_1 omega">
				<p>'.$this->send_login.'</p>
			</div>
			
		</div>
		';
		return parent::__toString();
	}
	
	
}
