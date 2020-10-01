<?php
function openConnection(): PDO
{
    // Try to figure out what these should be for you
    $dbhost = "localhost"; // probably "localhost"
    $dbuser = "becode"; // probably "becode"
    $dbpass = "becode"; // the password you chose
    $db = "guestbook"; // You probably have to use a database manager to create a new database for this exercise

    $driverOptions = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    // Try to understand what happens here
    $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass, $driverOptions);

    // Why we do this here
    return $pdo;
}
// echo ('ezgi');
$pdo = openConnection(); // this is our function from above


$handle = $pdo->prepare('SELECT some_field FROM some_table where id = :id'); // notice the ":id" notation
$handle->bindValue(':id', 5);
$handle->execute();
$rows = $handle->fetchAll();
echo htmlspecialchars($rows[0]['some_field']);
