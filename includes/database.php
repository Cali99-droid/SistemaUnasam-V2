<?php

$db = mysqli_connect('localhost', 'root', '998696334', 'app_unasam');
if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}

/**
 * $db = mysqli_connect('127.0.0.1', 'jymsystemsoft_jymsoft', 'sdkj384SK34sn', 'jymsystemsoft_app_unasam');
 * $db->set_charset("utf8");
 * 
 * 
 */
