<?php
    date_default_timezone_set('US/Eastern');
    include ('dbh.inc.php');
    include ('comments.inc.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="comment-style.css">
<title> Title of the document</title>
</head>

<body>


<?php
$Cid = $_POST['Cid'];
$uid = $_POST['uid'];
$date = $_POST['date'];
$message = $_POST['message'];

echo"<form method='POST' action='".editComments($conn)."'>
    <input type='hidden' name='Cid' value='".$Cid."'>
    <input type='hidden' name='uid' value='".$uid."'>
    <input type='hidden' name='date' value='".$date."'>
    <textarea name='message'>".$message."</textarea><br>
    <button type='submit' name='commentSubmit'>Edit</button>
</form>";

?>
</body>
</html>