var s3=s3||{};s3.printMe=function(){function t(e,n){var s,o,l,r,i=[];if(e=e||"printMe",!(s=document.getElementById(e)))return!1;if((n=n||{}).doctype=n.doctype||t.doctype,n.stylesheet=n.stylesheet||t.stylesheet,n.window=t.extend(n.window,t.window),n.styles=t.extend(n.styles,t.styles),i.push(t.doctypes[n.doctype]),n.stylesheet)for(t.isArray(n.stylesheet)||(n.stylesheet=[n.stylesheet]),l=0,r=n.stylesheet.length;l<r;l++)i.push('<link rel="stylesheet" href="'+n.stylesheet[l]+'" />');else i.push("<style>"),i.push(t.join(n.styles,"\n","{","}")),i.push("</style>");i.push('<body onload="print()">'),i.push(s.innerHTML),i.push("</body>"),i.push("</html>"),(o=window.open("","printMe",t.join(n.window,",","="))).document.write(i.join("\n")),o.document.close(),o.focus()}return t.doctypes={"html:5":'<!doctype html>\n<html lang="en">',"html:xt":'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\n<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">'},t.doctype="html:5",t.styles={"body, td":"font-size:12px; font-family: verdana;","table.table1":"font-size:8pt; border-collapse: collapse; font-family: verdana;","table.table1 td":"padding: 4px; border: 1px solid #333333;","table.table0":"font-size:8pt; border-collapse: collapse; font-family: verdana;"},t.window={width:700,height:600,toolbar:0,directories:0,menubar:0,status:0,resizable:1,location:0,scrollbars:"yes",copyhistory:0,top:10,left:10},t.extend=function(t,e){var n;for(n in t=t||{},e)t.hasOwnProperty(n)||(t[n]=e[n]);return t},t.join=function(t,e,n,s){var o,l=[];for(o in e=e||"\n",n=n||"",s=s||"",t)l.push(o+n+t[o]+s);return l.join(e)},t.isArray=function(t){return"[object Array]"==Object.prototype.toString.call(t)},t}();var printMe=printMe||s3.printMe;