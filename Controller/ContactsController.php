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

class ContactsController extends AppController {
    
    var $components = array("RequestHandler");
    
    public function beforeFilter(){
        $this->loadModel('Email');
        $this->loadModel('Message');
    }
    
    public function message(){
        
        $this->layout = 'ajax';
        
        $data['Email']['email'] = $this->request->data['email'];
        
        $data['Message']['content'] = $this->request->data['content'];
        $data['Message']['email'] = $this->request->data['email'];
        $data['Message']['name'] = $this->request->data['name'];


        if ($this->request->is('post')) {
            if ($this->Message->save($data)) {
                if ($this->Email->save($data)) {
                    $email = new CakeEmail();
                    $email->from($data['Message']['email']);
                    $email->to('phil.laf@gmail.com');
                    $email->subject('gintonic - ' . $data['Message']['name']);
                    $email->send(
                        $data['Message']['content'] . '<br/><br/>' . $data['Message']['name']
                    );
                }
            }
        }
        
        return new CakeResponse(array(
            'body'=> json_encode(
                array(
                    'message'=>'Votre message a été envoyé avec succès'
            )),
            'status'=>200
        ));
    }
    
    public function add_to_newsletter(){
        $this->layout = 'ajax';
        
        $data['Email']['email'] = $this->request->data['email'];

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
    
}
