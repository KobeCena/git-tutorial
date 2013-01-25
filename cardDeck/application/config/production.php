<?php
/**
 * Production configuration values
 *
 * MicroMVC
 */
return array(
    'controller' => array(
        'debug' => array(
            'renderExceptions' => true
        )
    ),
    'resources' => array(
        'database', 'dao'
    ),
    'database' => array(
        'dsnParams' => array(
            'host' => 'localhost',
            'dbname' => 'carddeck'
        ),
        'username' => 'root',
        'password' => 'root'
    )
);