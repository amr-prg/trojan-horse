<?php

$db = mysqli_connect("localhost","root","","book_store");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>