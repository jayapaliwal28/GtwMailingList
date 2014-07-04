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
    
    public function index(){}
    
    public function subscribe(){

        $this->layout = 'ajax';
        
        $data['Email']['email'] = $this->request->data['email'];
        $data['Email']['active'] = true;

        if ($this->request->is('post')) {
            if ($this->Email->save($data)) {
                return new CakeResponse(array(
                    'body'=> json_encode(
                        array(
                            'message'=> 'Votre adresse a �t� inscrite avec succ�s'
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
