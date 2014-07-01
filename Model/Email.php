<?php
/**
 * Gintonic Web
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */
 
class Email extends AppModel {
    
    public $validate = array(
        'email' => array(
            'rule' => 'email'
        )
    );
}