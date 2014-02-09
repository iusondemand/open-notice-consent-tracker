<?php
#A simple page to install the bookmarklet

include ("header.php");
?>
The following is a bookmarklet, not a usual link.<p>
<p>Move the above link over the favorities bar of your browser.<p>
Then click it when you're going to click Ok on every agreement online.<p>
<dir>
<a style="" href='javascript:( 
function() { 
var INSTAPAPER=true,w=window,d=document;
var pageSelectedTxt=w.getSelection?w.getSelection():(d.getSelection)?d.getSelection().htmlText:(d.selection?d.selection.createRange().htmlText:0);
    var html = "";
    if (typeof window.getSelection != "undefined") {
        var sel = window.getSelection();
        if (sel.rangeCount) {
            var container = document.createElement("div");
            for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                container.appendChild(sel.getRangeAt(i).cloneContents());
            }
            html = container.innerHTML;
        }
    } else if (typeof document.selection != "undefined") {
        if (document.selection.type == "Text") {
            html = document.selection.createRange().htmlText;
        }
    }
var pageSelectedTxt=html;
var pageTitle=d.title,pageUri=w.location.href,tmplt="";
var to="http://www.legalstxt.org/hackathon/savelet.php";
var p={murl:""+pageUri, mtitle:""+pageTitle, mtext:""+pageSelectedTxt};
var myForm = document.createElement("form");
myForm.method="post";
myForm.enctype="multipart/form-data";
myForm.target="saveconsent";
myForm.action=to;
for (var k in p) {
var myInput=document.createElement("input") ;
myInput.setAttribute("name",k);
myInput.setAttribute("value",p[k]);
myForm.appendChild(myInput);
}
document.body.appendChild(myForm);
myForm.submit();
document.body.removeChild(myForm);
})
();'>Save your consent</a>
</dir>

<?php
include ("footer.php");
?>
