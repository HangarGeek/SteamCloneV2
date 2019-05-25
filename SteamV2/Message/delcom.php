<?php

include "message.php";

session_start();
$post = new message();

$post->DelCommentFromUri();
header("Location: ../Index.php");

