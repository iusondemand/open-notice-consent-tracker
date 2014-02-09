<?php
#simply get the datas. More techniques available
 
$oggi	=date ("Ymd");
$ora	=date ("Hi");

$dbg=0;

$url		=  ($_REQUEST["murl"]);
$text		=  ($_REQUEST["mtext"]);
$title		=  ($_REQUEST["mtitle"]);
$mip 		=  ($_SERVER['REMOTE_ADDR'],-3,3);
$lang		=  ($_SERVER['HTTP_ACCEPT_LANGUAGE']);
$charset	=  ($_SERVER['HTTP_ACCEPT_CHARSET']);
 

 
$verified	= 0;

$template_report=<<<BDY

Privacy infos:<ul>
<li>--orgname--</li>
<li>--orgurl--</li>
<li>--orgemail--</li>
<li>--orgcountries--</li>
</ul>
BDY;

$template_page=<<<BDY
<i>The code in this demo is a draft for time reasons.</i>
<br><br><br>

<div style="border-radius:5px;padding:10px;background:rgba(250,250,250,0.9);margin:0 auto; width:500px;" >
--template_report--
</div>
<br>
<br>
<br>

<div style="border-radius:5px;padding:10px;background:rgba(250,250,250,0.9);margin:0 auto; width:600px;" >
<table><tr valign=top> 
</td><td align=left>

<i>Send a request to --orgname--:</i><br>
<form method=post action=send_mail.php>
<input type=email placeholder="your email" style="width:100%" name=email value=""><p>
<input type=hidden name=ccemail value="--orgemail--">
<input type=hidden  name=subject value="Request for more infos from --orgname--">
<textarea  name=text style="height:300px;width:100%;">
Dear --orgname--,

The obscure and complex language in your privacy policy/terms of service makes them difficult for me to read and thereby understand my position. As a consumer, “closed” policies prevent me properly understanding what data you gather from me and why.

So I can genuinely give my fully informed consent (and in accordance with the laws listed below [footnote]) please send me the information requested below via this “Open Notice” form.

FORM

Basic Fields:

What is the purpose for seeking my consent?  

What are the contact details and address of the entity responsible (such as the privacy/ data protection officer at --orgname--)?

Additional fields [based on jurisdiction]:

--orgcountries-- How do you respond to Do Not Track preferences? 

References to laws in your jurisdiction which require these fields: X,Y,Z [from the consent legal map].

</textarea><p>
<input type=checkbox name=add_user> Sign up and save my consent receipts</input><p> 
<input type=submit name=submit value="Save and send a request to --orgname--"><br>
<textarea style="display:none;" name=report ></textarea>
</form>
</td></Tr></table>
</div>
BDY;

$data['orgname']="Google";
$data['orgurl']="http://www.google.it";
$data['orgemail']="privacy@google.com";
$data['orgcountries']="California";
$data['title']=$title;
$data['freetext']="text free";

$campivarcount=0;
$campivar[$campivarcount++]="template_report";
$campivar[$campivarcount++]="template_page";
$campivar[$campivarcount++]="orgname";
$campivar[$campivarcount++]="orgurl";
$campivar[$campivarcount++]="orgemail";
$campivar[$campivarcount++]="orgcountries";
$campivar[$campivarcount++]="title";
$campivar[$campivarcount++]="freetext";

list($orgname, $orgurl, $orgemail, $orgcountries,$orgcountries)=explode(",",$db);

		$bdy_report=$template_report;
		$c=0;
		foreach ($campivar as $fld) {
			$tmpval=$data[$fld];
			if ($tmpval=="-") {$tmpval="";}
			if ($c==7) {$tmpval=$title;}
			$bdy_report=str_replace("--".$fld."--",$tmpval,$bdy_report);
			$c++;
		}
		$data['template_report']=$bdy_report;

		$bdy_page=$template_page;
		$c=0;
		foreach ($campivar as $fld) {
			$tmpval=$data[$fld];
			if ($c==7) {$tmpval=$title;}
			if ($tmpval=="-") {$tmpval="";}
			$bdy_page=str_replace("--".$fld."--",$tmpval,$bdy_page);
			$c++;
		}

$body.=$bdy_page;

include ("../header.php");
echo $body;
include ("../footer.php");

 
 
