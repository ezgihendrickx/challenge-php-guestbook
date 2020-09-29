<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Guest Book</title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
    <link rel="stylesheet" href="style.css">

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
            echo date("d-m-Y H:i:s", time());
            "<br>";
            ?>

        </div>

        Content: <input type="text" name="content" value="comments here" /><br>
        Author name: <input type="text" name="name" value="name please" /> <br>
        <input type="submit" value="SUBMIT">


    </form>
    <hr>

    <?php
    require_once 'footer.html';


    if (isset($_POST["content"]) || isset($_POST["name"])) {
        $myfile = fopen("comments.html", "a") or die("there is an error");
        $writeInFile = "<b>content:</b>" . $_POST['content'] . "<br>";
        $writeInFile1 = "<b>name:</b>" . $_POST['name'] . "<br>";
        fwrite($myfile, $writeInFile);
        fwrite($myfile, $writeInFile1);
        fclose($myfile);


        include("comments.html");
    } else {
        include("comments.html");
    }


    ?>
</body>

</html>