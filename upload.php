<?php
//Этот файл не используется
$uploaddir = '/images/';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir .
    $_FILES['userfile']['name'])) {
    print "File is valid, and was successfully uploaded.";
} else {
    print "There some errors!";
}
?>
