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

        Content: <input type="text" name="content" placeholder="Your comments here" /><br>
        Author name: <input type="text" name="name" placeholder="Name please" /> <br>
        <input type="submit" name="submit" id="submit" value="SUBMIT">
        <?php
        require_once 'footer.html';
        // require_once 'database.php';
        require_once 'comments.php';
        ?>


    </form>
    <hr>

    <?php
    if (isset($_POST["submit"])) {
        // echo 'File';

        // $currentDate->format('d-m-Y H:i');
        //$myfile = fopen("comments.html", "a") or die("there is an error");
        $writeInFile = "<b>content:</b>" . $_POST['content'] . "<br>" . "<b>name:</b>" . $_POST['name'] . "<br>" . $currentDate . "<br>" . "<hr>";
        //$writeInFile1 = "<b>name:</b>" . $_POST['name'] . "<br>";
        // fwrite($myfile, $writeInFile);
        // fwrite($myfile, $writeInFile1);
        // fclose($myfile);
        $writeInFile .= file_get_contents('comments.php');
        file_put_contents('comments.php', $writeInFile);
        // echo 'File';

        //include("comments.html");

    }
    // include("comments.html");

    // var_dump($writeInFile);

    ?>
</body>

</html>