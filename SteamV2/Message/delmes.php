<?php

include "message.php";
session_start();

$post = new message();

$post->DelPostFromUri( );
header("Location: ../Index.php");