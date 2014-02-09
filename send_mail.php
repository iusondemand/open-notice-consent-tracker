<?php

#a demo of send email

$oggi	=date ("Ymd");
$ora	=date ("Hi");

$dbg=0;

$subject		=  ($_REQUEST["subject"]);
$email		    =  ($_REQUEST["email"]);
$ccemail		=  ($_REQUEST["ccemail"]);
$text			=  ($_REQUEST["text"]);
 

 
$verified	= 0;

$body= <<<BDY

In not a demo version will be sent an email:<p>

<dir>
from: $email<br>
to: $email<br>
cc: $ccemail<br>
subject: $subject<br>
text:<br>
 $text<hr>

BDY;


include ("../header.php");
echo $body;
include ("../footer.php");

 
 
