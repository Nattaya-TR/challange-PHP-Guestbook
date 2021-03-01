<?php
declare(strict_types=1);

require_once("class/Post.php");
require_once("class/PostLoader.php");

session_start();

$title = $content = $name = "";

$postLoader = new PostLoader();
$messages = $postLoader->readFromFile();

//validation text field
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["title"]) && !empty($_POST["data"]) && !empty($_POST["content"]) && !empty($_POST["name"])) {

        $title = htmlspecialchars($_POST["title"]);
        $content = htmlspecialchars($_POST["content"]);
        $name = htmlspecialchars($_POST["name"]);
    }
}


// check if the text field if it's not empty
if ($title != "" && $content != "" && $name != "" ) {
    $post = new Post($title, $content, $name);
    $postLoader->writeToFile($post);
    header('Location:http://becode.local/challange-PHP-Guestbook');
    exit;
}

$counter = 0;
$messages = array_reverse($messages);

foreach ($messages as $message) {
    echo $message->getTitle();
    echo $message->getDate();
    echo $message->getContent();
    echo $message->getAuthorName();

    $counter++;
    if ($counter == 5) {
        break;
    }
}



?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8" lang="en">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Guest Book</title>
</head>
<body>
<div align="center">
<h1>Give us a feedback</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div>
    <label for="title">Title</label>
    <input type="text" class="textField" name="title" value="">
    </div>

    <div>
    <label for="date">Date</label>
    <input type="text" class="textField" name="date" value="<?php echo date("Y-m-d"); ?>">
    </div>

    <div>
    <label for="content">Your message</label>
        <textarea cols="35" rows="5" type="text" class="textField" name="content" value=""></textarea>
    </div>

    <div>
    <label for="name">Name</label>
    <input type="text" class="textField" name="name" value="">
    </div>

    <button type="submit" class="btn" name="send" value="confirm">Send</button>

</form>
    <! to show the latest 20 posts-->
    <!--<span><?php echo htmlspecialchars(PostLoader::writeToFile); ?></span>-->
</div>
</body>
</html>

