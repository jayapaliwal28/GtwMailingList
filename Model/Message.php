<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
 
class Message extends AppModel {
    
    public $validate = array(
        'email' => array(
            'rule' => 'email'
        )
    );
}