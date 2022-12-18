<?php

$db = mysqli_connect(
    $_ENV["DB_HOST"],
    $_ENV["DB_USER"],
    $_ENV["DB_PASS"],
    $_ENV["DB_NAME"]
);

$db->set_charset("utf8");
if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}

// $password =  password_hash('123456', PASSWORD_BCRYPT);
// $query = "INSERT INTO `usuario` (`id`, `usuario`, `pass`, `estado`, `tipo_usuario_id`, `confirmado`, `token`) VALUES (NULL, 'admin','" . $password . "', 'activo', '1', '1', NULL);";
// $result = $db->query($query);
// debuguear($result);


/**
 * $db = mysqli_connect('127.0.0.1', 'jymsystemsoft_jymsoft', 'sdkj384SK34sn', 'jymsystemsoft_app_unasam');
 * 
 * 
 * 
 */
