<?php 

$conn = mysqli_init();

mysqli_ssl_set($conn,NULL,NULL, "/var/www/html/BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);

mysqli_real_connect($conn, "themetrolipa.mysql.database.azure.com", "themlmc@themetrolipa", "AdminMlmc1", "metro_lipa_db", 3306, MYSQLI_CLIENT_SSL, MYSQLI_CLIENT_SSL_DONT_VERIFY_SERVER_CERT);

if (mysqli_connect_errno($conn)) {
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

?>