<?php

include "message.php";


$post = new message();

$post->PostComment();
header("Location: ../Index.php");
