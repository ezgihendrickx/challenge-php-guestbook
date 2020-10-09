<?php

// require_once 'database.php';
function openConnection(): PDO
{
    // Try to figure out what these should be for you
    $dbhost    = "localhost";
    $dbuser    = "becode";
    $dbpass    = "becode";
    $db        = "guestbookEzgi";

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
function getMessages()
{
    $rows = [];
    try {
        $pdo = openConnection();
        $sql = "SELECT ID, name, title, message, postdate FROM postEzgi order by postdate desc ";
        $handle = $pdo->prepare($sql);
        $handle->execute();
        $rows = $handle->fetchAll();
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }

    return $rows;
}
function saveMessages($name, $title, $message, $postdate): void
{
    try {
        $pdo = openConnection();
        $sql = "INSERT INTO postEzgi (name, title, message, postdate) VALUES (:name, :title, :message, :date_post)";
        $handle = $pdo->prepare($sql);

        $handle->bindValue(':name', $name);
        $handle->bindValue(':title', $title);
        $handle->bindValue(':message', $message);
        $handle->bindValue(':date_post', $postdate);
        $handle->execute();
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}

if (isset($_POST['add'])) {
    $currentDate = new DateTime("now", new DateTimeZone('Europe/Brussels'));


    $title = $_POST['title'];
    $name = $_POST['name'];
    $message = $_POST['message'];
    saveMessages($name, $title, $message, $currentDate->format('Y-m-d H:i:s'));
}

$listMessages = getMessages();


?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />

    <title>Guest Book</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">



</head>

<body>


    <form action="#" method="POST">
        <code>
            <h2>Guest Book</h2>
        </code>
        <div id="date">
            <?php

            date_default_timezone_set("Europe/Brussels");
            date("d-m-Y H:i:s", time());
            $currentDate = date("d-m-Y H:i:s", time());
            echo $currentDate;
            "<br>";
            ?>

        </div>

        Content: <input type="text" name="message" placeholder="Your comments here" /><br>
        Title: <input type="text" name="title" placeholder="Title please" /> <br>
        Author name: <input type="text" name="name" placeholder="Name please" /> <br>

        <input type="submit" name="add" id="add" value="SUBMIT">


    </form>
    <hr>
    <?php foreach ($listMessages as $message) { ?>
        <p>title: <?php echo $message['title']; ?></p>
        <p>name: <?php echo $message['name']; ?></p>
        <p>message: <?php echo $message['message']; ?></p>
        <p>postdate: <?php echo $message['postdate']; ?></p>
        <br>
        <br>
    <?php } ?>

    <?php
    if (isset($_POST["submit"])) {
        // echo 'File';

        // $currentDate->format('d-m-Y H:i');
        // $myfile = fopen("comments.php", "a") or die("there is an error");
        $writeInFile = "<b>content:</b>" . $_POST['content'] . "<br>" . "<b>name:</b>" . $_POST['name'] . "<br>" . $currentDate . "<br>" . "<hr>";
        //$writeInFile1 = "<b>name:</b>" . $_POST['name'] . "<br>";
        // fwrite($myfile, $writeInFile);
        // fwrite($myfile, $writeInFile1);
        // fclose($myfile);
        // $writeInFile .= file_get_contents('comments.php');
        // file_put_contents('comments.php', $writeInFile);
        // echo 'File';

        //include("comments.html");
        // include("comments.php");
        // echo ('comments.php');
    }


    // var_dump($writeInFile);

    ?>
    <?php
    require_once 'footer.php';
    // require_once 'comments.php';

    ?>
</body>

</html>