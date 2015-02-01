<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 *
 * Ajax error codes are right here.
 * https://dev.twitter.com/docs/error-codes-responses
 */
App::uses('CakeEmail', 'Network/Email');

class EmailsController extends AppController {
    
    var $components = array("RequestHandler");
    
    public function index(){
    	$emails = $this->Email->find("all");
    	
    	$this->set(compact("emails"));
    }
    
    public function subscribe(){

        $this->layout = 'ajax';
        
        $data['Email']['email'] = $this->request->data['email'];
        $data['Email']['active'] = true;

        if ($this->request->is('post')) {
            if ($this->Email->save($data)) {
                return new CakeResponse(array(
                    'body'=> json_encode(
                        array(
                            'message'=> 'Votre adresse a été inscrite avec succès'
                    )),
                    'status'=>200
                ));
            }
        }
        
        return new CakeResponse(array(
            'body'=> json_encode(
                array(
                    'email'=> $data['Email']['email']
            )),
            'status'=>200
        ));
    }
    
    public function admin_mail($to = array()){
    	if($to){
    		$emails = $this->Email->find("all", array('conditions' => array('id' => $to)));
    	} else {
    		$emails = $this->Email->find("all");
    	}
    	
    	$email_list = '';
    	//extract emails
    	if($emails)
    		$email_list = Hash::extract($emails, "{n}.Email.email");
    	
    	if ($this->request->is('post')) {
    		App::uses('CakeEmail', 'Network/Email');
    		$email = new CakeEmail();
    		 
    		$email->emailFormat('html');
    		 
    		$email->from(Configure::read('Gtw.admin_mail'));
    		$email->bcc($email_list);
    		$email->subject($this->request->data['Email']['subject']);
    		$response = $email->send($this->request->data['Email']['body']);
    		$this->Session->setFlash(__('Email sent successfully'), 'alert', array(
    				'plugin' => 'BoostCake',
    				'class' => 'alert-success'
    		));
    		return $this->redirect(array('action' => 'index'));
    	}
    	
    	
    	
    	$this->set(compact("emails", "email_list"));
    }
    
}
