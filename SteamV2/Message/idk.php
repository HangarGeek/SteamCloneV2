<?php

include "message.php";


$post = new message();

$post->PostMessage( );
header("Location: ../Index.php");