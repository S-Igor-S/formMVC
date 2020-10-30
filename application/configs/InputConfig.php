<?php 
return array (
    'login' => '/^[A-Z][a-z0-9_]+$/',
    'password' => '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z_]+$/',
    'email' => '/^[A-Za-z0-9_@.]+$/',
    'tel' => '/^[+]?[0-9]?[0-9]?[0-9]?[0-9]?[0-9]{10}$/',
    'age' => '/^[0-9]?[0-9]?[0-9]$/',
);
?>