/** @license Hyphenator 4.1.0 - client side hyphenation for webbrowsers
 *  Copyright (C) 2012  Mathias Nater, Zürich (mathias at mnn dot ch)
 *  Project and Source hosted on http://code.google.com/p/hyphenator/
 * 
 *  This JavaScript code is free software: you can redistribute
 *  it and/or modify it under the terms of the GNU Lesser
 *  General Public License (GNU LGPL) as published by the Free Software
 *  Foundation, either version 3 of the License, or (at your option)
 *  any later version.  The code is distributed WITHOUT ANY WARRANTY;
 *  without even the implied warranty of MERCHANTABILITY or FITNESS
 *  FOR A PARTICULAR PURPOSE.  See the GNU GPL for more details.
 *
 *  As additional permission under GNU GPL version 3 section 7, you
 *  may distribute non-source (e.g., minimized or compacted) forms of
 *  that code without the copy of the GNU GPL normally required by
 *  section 4, provided you include this license notice and a URL
 *  through which recipients can access the Corresponding Source.
 *
 * 
 *  Hyphenator.js contains code from Bram Steins hypher.js-Project:
 *  https://github.com/bramstein/Hypher
 *  
 *  Code from this project is marked in the source and belongs 
 *  to the following license:
 *  
 *  Copyright (c) 2011, Bram Stein
 *  All rights reserved.
 *  
 *  Redistribution and use in source and binary forms, with or without 
 *  modification, are permitted provided that the following conditions 
 *  are met:
 *   
 *   1. Redistributions of source code must retain the above copyright
 *      notice, this list of conditions and the following disclaimer. 
 *   2. Redistributions in binary form must reproduce the above copyright 
 *      notice, this list of conditions and the following disclaimer in the 
 *      documentation and/or other materials provided with the distribution. 
 *   3. The name of the author may not be used to endorse or promote products 
 *      derived from this software without specific prior written permission. 
 *  
 *  THIS SOFTWARE IS PROVIDED BY THE AUTHOR "AS IS" AND ANY EXPRESS OR IMPLIED 
 *  WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF 
 *  MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO 
 *  EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, 
 *  INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, 
 *  BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, 
 *  DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY 
 *  OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING 
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, 
 *  EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *  
 */

var Hyphenator=function(e){"use strict"
var t,n,a,o=e,r=function(){var e={},t=function(t,n,a,o){e[t]={file:n,script:a,prompt:o}}
return t("be","be.js",1,"Мова гэтага сайта не можа быць вызначаны аўтаматычна. Калі ласка пакажыце мову:"),t("ca","ca.js",0,""),t("cs","cs.js",0,"Jazyk této internetové stránky nebyl automaticky rozpoznán. Určete prosím její jazyk:"),t("da","da.js",0,"Denne websides sprog kunne ikke bestemmes. Angiv venligst sprog:"),t("bn","bn.js",4,""),t("de","de.js",0,"Die Sprache dieser Webseite konnte nicht automatisch bestimmt werden. Bitte Sprache angeben:"),t("el","el-monoton.js",6,""),t("el-monoton","el-monoton.js",6,""),t("el-polyton","el-polyton.js",6,""),t("en","en-us.js",0,"The language of this website could not be determined automatically. Please indicate the main language:"),t("en-gb","en-gb.js",0,"The language of this website could not be determined automatically. Please indicate the main language:"),t("en-us","en-us.js",0,"The language of this website could not be determined automatically. Please indicate the main language:"),t("eo","eo.js",0,"La lingvo de ĉi tiu retpaĝo ne rekoneblas aŭtomate. Bonvolu indiki ĝian ĉeflingvon:"),t("es","es.js",0,"El idioma del sitio no pudo determinarse autom%E1ticamente. Por favor, indique el idioma principal:"),t("et","et.js",0,"Veebilehe keele tuvastamine ebaõnnestus, palun valige kasutatud keel:"),t("fi","fi.js",0,"Sivun kielt%E4 ei tunnistettu automaattisesti. M%E4%E4rit%E4 sivun p%E4%E4kieli:"),t("fr","fr.js",0,"La langue de ce site n%u2019a pas pu %EAtre d%E9termin%E9e automatiquement. Veuillez indiquer une langue, s.v.p.%A0:"),t("grc","grc.js",6,""),t("gu","gu.js",7,""),t("hi","hi.js",5,""),t("hu","hu.js",0,"A weboldal nyelvét nem sikerült automatikusan megállapítani. Kérem adja meg a nyelvet:"),t("hy","hy.js",3,"Չհաջողվեց հայտնաբերել այս կայքի լեզուն։ Խնդրում ենք նշեք հիմնական լեզուն՝"),t("it","it.js",0,"Lingua del sito sconosciuta. Indicare una lingua, per favore:"),t("kn","kn.js",8,"ಜಾಲ ತಾಣದ ಭಾಷೆಯನ್ನು ನಿರ್ಧರಿಸಲು ಸಾಧ್ಯವಾಗುತ್ತಿಲ್ಲ. ದಯವಿಟ್ಟು ಮುಖ್ಯ ಭಾಷೆಯನ್ನು ಸೂಚಿಸಿ:"),t("la","la.js",0,""),t("lt","lt.js",0,"Nepavyko automatiškai nustatyti šios svetainės kalbos. Prašome įvesti kalbą:"),t("lv","lv.js",0,"Šīs lapas valodu nevarēja noteikt automātiski. Lūdzu norādiet pamata valodu:"),t("ml","ml.js",10,"ഈ വെ%u0D2C%u0D4D%u200Cസൈറ്റിന്റെ ഭാഷ കണ്ടുപിടിയ്ക്കാ%u0D28%u0D4D%u200D കഴിഞ്ഞില്ല. ഭാഷ ഏതാണെന്നു തിരഞ്ഞെടുക്കുക:"),t("nb","nb-no.js",0,"Nettstedets språk kunne ikke finnes automatisk. Vennligst oppgi språk:"),t("no","nb-no.js",0,"Nettstedets språk kunne ikke finnes automatisk. Vennligst oppgi språk:"),t("nb-no","nb-no.js",0,"Nettstedets språk kunne ikke finnes automatisk. Vennligst oppgi språk:"),t("nl","nl.js",0,"De taal van deze website kan niet automatisch worden bepaald. Geef de hoofdtaal op:"),t("or","or.js",11,""),t("pa","pa.js",13,""),t("pl","pl.js",0,"Języka tej strony nie można ustalić automatycznie. Proszę wskazać język:"),t("pt","pt.js",0,"A língua deste site não pôde ser determinada automaticamente. Por favor indique a língua principal:"),t("ru","ru.js",1,"Язык этого сайта не может быть определен автоматически. Пожалуйста укажите язык:"),t("sk","sk.js",0,""),t("sl","sl.js",0,"Jezika te spletne strani ni bilo mogoče samodejno določiti. Prosim navedite jezik:"),t("sr-latn","sr-latn.js",0,"Jezika te spletne strani ni bilo mogoče samodejno določiti. Prosim navedite jezik:"),t("sv","sv.js",0,"Spr%E5ket p%E5 den h%E4r webbplatsen kunde inte avg%F6ras automatiskt. V%E4nligen ange:"),t("ta","ta.js",14,""),t("te","te.js",15,""),t("tr","tr.js",0,"Bu web sitesinin dili otomatik olarak tespit edilememiştir. Lütfen dökümanın dilini seçiniz%A0:"),t("uk","uk.js",1,"Мова цього веб-сайту не може бути визначена автоматично. Будь ласка, вкажіть головну мову:"),e}(),i=function(){var e,t=""
for(e in r)r.hasOwnProperty(e)&&(t+=e+", ")
return t=t.substring(0,t.length-2)}(),s=function(){var e,t,n=o.document.getElementsByTagName("script"),a=0,r=n[a]
while(r){if(r.src&&(t=r.src,e=t.indexOf("Hyphenator.js"),e!==-1))return t.substring(0,e)
a+=1,r=n[a]}return"http://hyphenator.googlecode.com/svn/trunk/"}(),l=function(){var t=!1
return e.location.href.indexOf(s)!==-1&&(t=!0),t}(),u=!1,c=!1,p=!1,h={script:!0,code:!0,pre:!0,img:!0,br:!0,samp:!0,kbd:!0,"var":!0,abbr:!0,acronym:!0,sub:!0,sup:!0,button:!0,option:!0,label:!0,textarea:!0,input:!0,math:!0,svg:!0},d=!0,g="local",y=!1,m=!0,f=!1,b=function(t){e.alert("Hyphenator.js says:\n\nAn Error occurred:\n"+t.message)},v=function(t,n){n=n||o
var a
return e.document.createElementNS?a=n.document.createElementNS("http://www.w3.org/1999/xhtml",t):e.document.createElement&&(a=n.document.createElement(t)),a},k=!1,w=function(){var t,a=function(t){var n=["aabbccddeeffgghhiijjkkllmmnnooppqqrrssttuuvvwwxxyyzz","абвгдеёжзийклмнопрстуфхцчшщъыьэюя","أبتثجحخدذرزسشصضطظعغفقكلمنهوي","աբգդեզէըթժիլխծկհձղճմյնշոչպջռսվտրցւփքօֆ","ঁংঃঅআইঈউঊঋঌএঐওঔকখগঘঙচছজঝঞটঠডঢণতথদধনপফবভমযরলশষসহ়ঽািীুূৃৄেৈোৌ্ৎৗড়ঢ়য়ৠৡৢৣ","ँंःअआइईउऊऋऌएऐओऔकखगघङचछजझञटठडढणतथदधनपफबभमयरलळवशषसहऽािीुूृॄेैोौ्॒॑ॠॡॢॣ","αβγδεζηθικλμνξοπρσςτυφχψω","બહઅઆઇઈઉઊઋૠએઐઓઔાિીુૂૃૄૢૣેૈોૌકખગઘઙચછજઝઞટઠડઢણતથદધનપફસભમયરલળવશષ","ಂಃಅಆಇಈಉಊಋಌಎಏಐಒಓಔಕಖಗಘಙಚಛಜಝಞಟಠಡಢಣತಥದಧನಪಫಬಭಮಯರಱಲಳವಶಷಸಹಽಾಿೀುೂೃೄೆೇೈೊೋೌ್ೕೖೞೠೡ","ກຂຄງຈຊຍດຕຖທນບປຜຝພຟມຢຣລວສຫອຮະັາິີຶືຸູົຼເແໂໃໄ່້໊໋ໜໝ","ംഃഅആഇഈഉഊഋഌഎഏഐഒഓഔകഖഗഘങചഛജഝഞടഠഡഢണതഥദധനപഫബഭമയരറലളഴവശഷസഹാിീുൂൃെേൈൊോൌ്ൗൠൡൺൻർൽൾൿ","ଁଂଃଅଆଇଈଉଊଋଌଏଐଓଔକଖଗଘଙଚଛଜଝଞଟଠଡଢଣତଥଦଧନପଫବଭମଯରଲଳଵଶଷସହାିୀୁୂୃେୈୋୌ୍ୗୠୡ","أبتثجحخدذرزسشصضطظعغفقكلمنهوي","ਁਂਃਅਆਇਈਉਊਏਐਓਔਕਖਗਘਙਚਛਜਝਞਟਠਡਢਣਤਥਦਧਨਪਫਬਭਮਯਰਲਲ਼ਵਸ਼ਸਹਾਿੀੁੂੇੈੋੌ੍ੰੱ","ஃஅஆஇஈஉஊஎஏஐஒஓஔகஙசஜஞடணதநனபமயரறலளழவஷஸஹாிீுூெேைொோௌ்ௗ","ఁంఃఅఆఇఈఉఊఋఌఎఏఐఒఓఔకఖగఘఙచఛజఝఞటఠడఢణతథదధనపఫబభమయరఱలళవశషసహాిీుూృౄెేైొోౌ్ౕౖౠౡ"],a=function(a){var o,i,s=e.document.getElementsByTagName("body")[0]
return o=v("div",e),o.id="Hyphenator_LanguageChecker",o.style.width="5em",o.style[t]="auto",o.style.hyphens="auto",o.style.fontSize="12px",o.style.lineHeight="12px",o.style.visibility="hidden",r.hasOwnProperty(a)?(o.lang=a,o.style["-webkit-locale"]="'"+a+"'",o.innerHTML=n[r[a].script],s.appendChild(o),i=o.offsetHeight,s.removeChild(o),i>12?!0:!1):!1}
return a},i={support:!1,property:"",checkLangSupport:function(){}}
return e.getComputedStyle?(t=o.getComputedStyle(o.document.getElementsByTagName("body")[0],null),t["-webkit-hyphens"]!==void 0?(i.support=!0,i.property="-webkit-hyphens",i.checkLangSupport=a("-webkit-hyphens")):t.MozHyphens!==void 0?(i.support=!0,i.property="MozHyphens",i.checkLangSupport=a("MozHyphens")):t["-ms-hyphens"]!==void 0&&(i.support=!0,i.property="-ms-hyphens",i.checkLangSupport=a("-ms-hyphens")),n=i,void 0):(n=i,void 0)},E="hyphenate",x="donthyphenate",H=6,C=1,S=function(){var e,t,n=null,a=!1,r=o.document.getElementsByTagName("script")
for(e=0,t=r.length;t>e;e+=1)r[e].getAttribute("src")&&(n=r[e].getAttribute("src")),n&&n.indexOf("Hyphenator.js?bm=true")!==-1&&(a=!0)
return a}(),j=null,O="",P=function(){var e=function(e,t){this.element=e,this.hyphenated=!1,this.treated=!1,this.data=t},t=function(){this.count=0,this.hyCount=0,this.list={}}
return t.prototype={add:function(t,n,a){this.list.hasOwnProperty(n)||(this.list[n]=[]),this.list[n].push(new e(t,a)),this.count+=1},each:function(e){var t
for(t in this.list)this.list.hasOwnProperty(t)&&(e.length===2?e(t,this.list[t]):e(this.list[t]))}},new t}(),A={},N={},T=0,L="(\\w*://)?((\\w*:)?(\\w*)@)?((([\\d]{1,3}\\.){3}([\\d]{1,3}))|((www\\.|[a-zA-Z]\\.)?[a-zA-Z0-9\\-\\.]+\\.([a-z]{2,4})))(:\\d*)?(/[\\w#!:\\.?\\+=&%@!\\-]*)*",R="[\\w-\\.]+@[\\w\\.]+",B=RegExp("("+L+")|("+R+")","i"),z=function(){var t,n=e.navigator.userAgent.toLowerCase()
return t=String.fromCharCode(8203),n.indexOf("msie 6")!==-1&&(t=""),n.indexOf("opera")!==-1&&n.indexOf("version/10.00")!==-1&&(t=""),t}(),D=function(){},F=function(){var t,n,a,r=[]
if(e.document.getElementsByClassName)r=o.document.getElementsByClassName(E)
else if(e.document.querySelectorAll)r=o.document.querySelectorAll("."+E)
else for(t=o.document.getElementsByTagName("*"),a=t.length,n=0;a>n;n+=1)t[n].className.indexOf(E)!==-1&&t[n].className.indexOf(x)===-1&&r.push(t[n])
return r},I="hidden",M="wait",q=[],J=function(t){t=t||e
var n=t.document,a=n.styleSheets[n.styleSheets.length-1],o=[],r=function(t){var n,a,o,r,i,s=e.document.styleSheets
for(r=0;s.length>r;r+=1)if(n=s[r],n.cssRules?o=n.cssRules:n.rules&&(o=n.rules),o&&o.length)for(i=0;o.length>i;i+=1)if(a=o[i],a.selectorText===t)return{index:i,rule:a}
return!1},i=function(e,t){var n,o
return a.insertRule?(n=a.cssRules?a.cssRules.length:0,o=a.insertRule(e+"{"+t+"}",n)):a.addRule&&(n=a.rules?a.rules.length:0,a.addRule(e,t,n),o=n),o},s=function(e,t){e.deleteRule?e.deleteRule(t):e.removeRule(t)}
return{setRule:function(e,t){var n,s,l
s=r(e),s?(l=s.rule.cssText?s.rule.cssText:s.rule.style.cssText.toLowerCase(),l==="."+E+" { visibility: hidden; }"?o.push({sheet:s.rule.parentStyleSheet,index:s.index}):l.indexOf("visibility: hidden")!==-1&&(n=i(e,t),o.push({sheet:a,index:n}),s.rule.style.visibility="")):(n=i(e,t),o.push({sheet:a,index:n}))},clearChanges:function(){var e=o.pop()
while(e)s(e.sheet,e.index),e=o.pop()}}},_=String.fromCharCode(173),V=z,X=!0,U=function(t,n){var a,r={},i=e.document.addEventListener?"addEventListener":"attachEvent",s=e.document.addEventListener?"removeEventListener":"detachEvent",l=e.document.addEventListener?"":"on",c=function(t){o=t||e,r[o.location.href]||u&&!o.frameElement||(u=!0,n(),r[o.location.href]=!0)},h=function(){try{o.document.documentElement.doScroll("left")}catch(t){return e.setTimeout(h,1),void 0}c(e)},d=function(){var t,a,i=e.frames.length
if(p&&i>0){for(t=0;i>t;t+=1){a=void 0
try{a=e.frames[t].document+""}catch(s){a=void 0}a&&e.frames[t].location.href!=="about:blank"&&c(e.frames[t])}o=e,n(),r[e.location.href]=!0}else c(e)},g=function(t){(t.type!=="readystatechange"||o.document.readyState==="complete")&&(o.document[s](l+t.type,g,!1),p||e.frames.length!==0||c(e))}
if(u&&!r[t.location.href])return n(),r[t.location.href]=!0,void 0
if(o.document.readyState==="complete"||o.document.readyState==="interactive")e.setTimeout(d,1)
else{o.document[i](l+"DOMContentLoaded",g,!1),o.document[i](l+"readystatechange",g,!1),e[i](l+"load",d,!1),a=!1
try{a=!e.frameElement}catch(y){}o.document.documentElement.doScroll&&a&&h()}},W=function(e,t){if(e.getAttribute("lang"))return e.getAttribute("lang").toLowerCase()
try{if(e.getAttribute("xml:lang"))return e.getAttribute("xml:lang").toLowerCase()}catch(n){}return e.tagName.toLowerCase()!=="html"?W(e.parentNode,!0):t?j:null},Z=function(t){t=t||o
var n,a,s,l,u=t.document.getElementsByTagName("html")[0],c=t.document.getElementsByTagName("meta")
if(j=W(u,!1),!j)for(n=0;c.length>n;n+=1)c[n].getAttribute("http-equiv")&&c[n].getAttribute("http-equiv").toLowerCase()==="content-language"&&(j=c[n].getAttribute("content").toLowerCase()),c[n].getAttribute("name")&&c[n].getAttribute("name").toLowerCase()==="dc.language"&&(j=c[n].getAttribute("content").toLowerCase()),c[n].getAttribute("name")&&c[n].getAttribute("name").toLowerCase()==="language"&&(j=c[n].getAttribute("content").toLowerCase())
if(!j&&p&&o.frameElement&&Z(e.parent),j||O===""||(j=O),j||(a="",l=e.navigator.language||e.navigator.userLanguage,l=l.substring(0,2),a=r[l]&&r[l].prompt!==""?r[l].prompt:r.en.prompt,a+=" (ISO 639-1)\n\n"+i,j=e.prompt(e.unescape(a),l).toLowerCase()),!r.hasOwnProperty(j)){if(!r.hasOwnProperty(j.split("-")[0]))throw s=Error('The language "'+j+'" is not yet supported.')
j=j.split("-")[0]}},$=function(){var e,t,a=0,i=function(t,a){var o,s=0,l={}
a=t.lang&&typeof t.lang=="string"?t.lang.toLowerCase():a?a.toLowerCase():W(t,!0),k&&n.support&&n.checkLangSupport(a)?(t.style[n.property]="auto",t.style["-webkit-locale"]="'"+a+"'"):(I==="hidden"&&M==="progressive"&&(l.hasOwnStyle=t.getAttribute("style")?!0:!1,l.isHidden=!0,t.style.visibility="hidden"),r.hasOwnProperty(a)?N[a]=!0:r.hasOwnProperty(a.split("-")[0])?(a=a.split("-")[0],l.language=a,N[a]=!0):S||b(Error("Language "+a+" is not yet supported.")),P.add(t,a,l)),o=t.childNodes[s]
while(o)o.nodeType!==1||h[o.nodeName.toLowerCase()]||o.className.indexOf(x)!==-1||e[o]||i(o,a),s+=1,o=t.childNodes[s]}
if(k&&w(),S)e=o.document.getElementsByTagName("body")[0],i(e,j)
else{k||I!=="hidden"||M!=="wait"||(q.push(new J(o)),q[q.length-1].setRule("."+E,"visibility: hidden;")),e=F(),t=e[a]
while(t)i(t,""),a+=1,t=e[a]}P.count===0&&(T=3,D())},G=function(e){var t,n,a,o,r,i,s,l,u,c,p,h,d=0,g={tpoints:[]},y=Hyphenator.languages[e].patterns,m="in3se",f=function(){return h=m.split(/\D/).length===1?function(e){return e=e.replace(/\D/gi," "),e.split(" ")}:function(e){return e.split(/\D/)}}()
for(d in y)if(y.hasOwnProperty(d)){t=y[d].match(RegExp(".{1,"+ +d+"}","g")),a=0,n=t[a]
while(n){s=n.replace(/[\d]/g,"").split(""),l=f(n),u=g,o=0,i=s[o]
while(i)p=i.charCodeAt(0),u[p]||(u[p]={}),u=u[p],o+=1,i=s[o]
for(u.tpoints=[],r=0;l.length>r;r+=1)c=l[r],u.tpoints.push(c===""?0:c)
a+=1,n=t[a]}}Hyphenator.languages[e].patterns=g},K=function(e,t){var n,a=[],o=e.split("")
for(n=0;t.length>n;n+=1)t[n]!==0&&a.push(t[n]),o[n]&&a.push(o[n])
return a.join("")},Q=function(e){var t,n,a,o=e.split(", "),r={}
for(t=0,n=o.length;n>t;t+=1)a=o[t].replace(/-/g,""),r.hasOwnProperty(a)||(r[a]=o[t])
return r},Y=function(t){var n,a,o,i
if(r.hasOwnProperty(t)&&!Hyphenator.languages[t]){if(n=s+"patterns/"+r[t].file,l&&!S){a=null
try{a=new e.XMLHttpRequest}catch(u){try{a=new e.ActiveXObject("Microsoft.XMLHTTP")}catch(c){try{a=new e.ActiveXObject("Msxml2.XMLHTTP")}catch(p){a=null}}}a&&(a.open("HEAD",n,!0),a.setRequestHeader("Cache-Control","no-cache"),a.onreadystatechange=function(){return a.readyState===4&&a.status===404?(b(Error("Could not load\n"+n)),delete N[t],void 0):void 0},a.send(null))}v&&(o=e.document.getElementsByTagName("head").item(0),i=v("script",e),i.src=n,i.type="text/javascript",o.appendChild(i))}},et=function(n){var a,o=Hyphenator.languages[n]
if(o.prepared||(d&&(o.cache={}),y&&(o.redPatSet={}),o.hasOwnProperty("exceptions")&&(Hyphenator.addExceptions(n,o.exceptions),delete o.exceptions),A.hasOwnProperty("global")&&(A.hasOwnProperty(n)?A[n]+=", "+A.global:A[n]=A.global),A.hasOwnProperty(n)?(o.exceptions=Q(A[n]),delete A[n]):o.exceptions={},G(n),a="[\\w"+o.specialChars+"@"+String.fromCharCode(173)+String.fromCharCode(8204)+"-]{"+H+",}",o.genRegExp=RegExp("("+L+")|("+R+")|("+a+")","gi"),o.prepared=!0),t)try{t.setItem("Hyphenator_"+n,e.JSON.stringify(o))}catch(r){}},tt=function(n){var a,o,r,i
if(!m){for(a in Hyphenator.languages)Hyphenator.languages.hasOwnProperty(a)&&et(a)
return T=2,n("*"),void 0}T=1
for(a in N)if(N.hasOwnProperty(a))if(t&&t.getItem("Hyphenator_"+a)){if(Hyphenator.languages[a]=e.JSON.parse(t.getItem("Hyphenator_"+a)),A.hasOwnProperty("global")){r=Q(A.global)
for(i in r)r.hasOwnProperty(i)&&(Hyphenator.languages[a].exceptions[i]=r[i])}if(A.hasOwnProperty(a)){r=Q(A[a])
for(i in r)r.hasOwnProperty(i)&&(Hyphenator.languages[a].exceptions[i]=r[i])
delete A[a]}r="[\\w"+Hyphenator.languages[a].specialChars+"@"+String.fromCharCode(173)+String.fromCharCode(8204)+"-]{"+H+",}",Hyphenator.languages[a].genRegExp=RegExp("("+L+")|("+R+")|("+r+")","gi"),delete N[a],n(a)}else Y(a)
o=e.setInterval(function(){var t,a=!0
for(t in N)N.hasOwnProperty(t)&&(a=!1,Hyphenator.languages[t]&&(delete N[t],et(t),n(t)))
a&&(e.clearInterval(o),T=2)},100)},nt=function(){var e,t,n,a,r=Hyphenator.doHyphenation?"Hy-phen-a-tion":"Hyphenation",i=o.document.getElementById("HyphenatorToggleBox")
i?i.firstChild.data=r:(e=o.document.getElementsByTagName("body")[0],i=v("div",o),t=o.document.createAttribute("id"),t.nodeValue="HyphenatorToggleBox",a=o.document.createAttribute("class"),a.nodeValue=x,n=o.document.createTextNode(r),i.appendChild(n),i.setAttributeNode(t),i.setAttributeNode(a),i.onclick=Hyphenator.toggleHyphenation,i.style.position="absolute",i.style.top="0px",i.style.right="0px",i.style.margin="0",i.style.backgroundColor="#AAAAAA",i.style.color="#FFFFFF",i.style.font="6pt Arial",i.style.letterSpacing="0.2em",i.style.padding="3px",i.style.cursor="pointer",i.style.WebkitBorderBottomLeftRadius="4px",i.style.MozBorderRadiusBottomleft="4px",e.appendChild(i))},at=function(e,t){var n,a,o,r,i,s,l,u,c,p,h,g,m,f,b,v,k,w=Hyphenator.languages[e],E=[],x=[],H=Math.max,C=[""]
if(t==="")return""
if(t.indexOf(_)!==-1)return t
if(d&&w.cache.hasOwnProperty(t))return w.cache[t]
if(w.exceptions.hasOwnProperty(t))return w.exceptions[t].replace(/-/g,_)
if(t.indexOf("-")!==-1){for(n=t.split("-"),c=0,a=n.length;a>c;c+=1)n[c]=at(e,n[c])
return n.join("-")}if(s=t,r=t="_"+t+"_",w.charSubstitution)for(o in w.charSubstitution)w.charSubstitution.hasOwnProperty(o)&&(r=r.replace(RegExp(o,"g"),w.charSubstitution[o]))
for(s.indexOf("'")!==-1&&(r=r.replace("'","’")),i=r.toLowerCase().split(""),l=t.split(""),u=i.length,b=w.patterns,c=0;u>c;c+=1)E[c]=0,x[c]=i[c].charCodeAt(0)
for(c=0;u>c;c+=1)for(v="",g=b,p=c;u>p;p+=1){if(g=g[x[p]],!g)break
if(y&&(v+=String.fromCharCode(x[p])),m=g.tpoints)for(y&&(w.redPatSet||(w.redPatSet={}),w.redPatSet[v]=K(v,m)),h=0,f=m.length;f>h;h+=1)E[c+h]=H(E[c+h],m[h])}for(c=1;u-1>c;c+=1)c>w.leftmin&&u-w.rightmin>c&&E[c]%2?C.push(l[c]):C[C.length-1]+=l[c]
return k=C.join(_),d&&(w.cache[s]=k),k},ot=function(e){return e.replace(/([:\/\.\?#&_,;!@]+)/gi,"$&"+V)},rt=function(e){var t,n,a=0
switch(_){case"|":t="\\|"
break
case"+":t="\\+"
break
case"*":t="\\*"
break
default:t=_}n=e.childNodes[a]
while(n)n.nodeType===3?(n.data=n.data.replace(RegExp(t,"g"),""),n.data=n.data.replace(RegExp(z,"g"),"")):n.nodeType===1&&rt(n),a+=1,n=e.childNodes[a]},it=function(t){var n=t.ownerDocument.getElementsByTagName("body")[0]
n&&(t=t||n,e.removeEventListener?t.removeEventListener("copy",a,!0):t.detachEvent("oncopy",a))},st=function(t){var n,o,r,i,s,l=t.ownerDocument.getElementsByTagName("body")[0]
a=function(t){t=t||e.event
var a=t.target||t.srcElement,l=a.ownerDocument,u=l.getElementsByTagName("body")[0],c=l.defaultView||l.parentWindow
a.tagName&&h[a.tagName.toLowerCase()]||(n=l.createElement("div"),n.style.color=e.getComputedStyle?c.getComputedStyle(u,null).backgroundColor:"#FFFFFF",n.style.fontSize="0px",u.appendChild(n),e.getSelection?(t.stopPropagation(),o=c.getSelection(),r=o.getRangeAt(0),n.appendChild(r.cloneContents()),rt(n),o.selectAllChildren(n),s=function(){n.parentNode.removeChild(n),o.removeAllRanges(),o.addRange(r)}):(t.cancelBubble=!0,o=c.document.selection,r=o.createRange(),n.innerHTML=r.htmlText,rt(n),i=u.createTextRange(),i.moveToElementText(n),i.select(),s=function(){n.parentNode.removeChild(n),r.text!==""&&r.select()}),e.setTimeout(s,0))},l&&(t=t||l,e.addEventListener?t.addEventListener("copy",a,!0):t.attachEvent("oncopy",a))},lt=function(e){var t=e.element,n=e.data
t.style.visibility="visible",e.data.isHidden=!1,n.hasOwnStyle?t.style.removeProperty?t.style.removeProperty("visibility"):t.style.removeAttribute&&t.style.removeAttribute("visibility"):(t.setAttribute("style",""),t.removeAttribute("style"))},ut=function(){var e,t=!0
if(P.each(function(e){var n,a=e.length
for(n=0;a>n;n+=1)t=t&&e[n].hyphenated}),t){for(e=0;q.length>e;e+=1)q[e].clearChanges()
T=3,D()}},ct=function(e,t){var n,a,o,r,i=t.data,s=t.element,l=function(e){var t,n
switch(_){case"|":t="\\|"
break
case"+":t="\\+"
break
case"*":t="\\*"
break
default:t=_}return 2>C||(n=e.split(" "),n[1]=n[1].replace(RegExp(t,"g"),""),n[1]=n[1].replace(RegExp(z,"g"),""),n=n.join(" ")),C===3&&(n=n.replace(/[ ]+/g,String.fromCharCode(160))),n}
if(Hyphenator.languages.hasOwnProperty(e)){n=function(t){return r=Hyphenator.doHyphenation?B.test(t)?ot(t):at(e,t):t},X&&s.tagName.toLowerCase()!=="body"&&st(s),o=0,a=s.childNodes[o]
while(a)a.nodeType!==3||H>a.data.length||(a.data=a.data.replace(Hyphenator.languages[e].genRegExp,n),C!==1&&(a.data=a.data.replace(/[\S]+ [\S]+$/,l))),o+=1,a=s.childNodes[o]}i.isHidden&&I==="hidden"&&M==="progressive"&&lt(t),t.hyphenated=!0,P.hyCount+=1,P.count>P.hyCount||ut()},pt=function(t){function n(e,t,n){return function(){return e(t,n)}}var a,o
if(t==="*")P.each(function(t,a){var o,r=a.length
for(o=0;r>o;o+=1)e.setTimeout(n(ct,t,a[o]),0)})
else if(P.list.hasOwnProperty(t))for(o=P.list[t].length,a=0;o>a;a+=1)e.setTimeout(n(ct,t,P.list[t][a]),0)},ht=function(){P.each(function(e){var t,n=e.length
for(t=0;n>t;t+=1)rt(e[t].element),X&&it(e[t].element),e[t].hyphenated=!1}),T=4},dt=function(){try{if(g!=="none"&&e.localStorage!==void 0&&e.sessionStorage!==void 0&&e.JSON.stringify!==void 0&&e.JSON.parse!==void 0)switch(g){case"session":t=e.sessionStorage
break
case"local":t=e.localStorage
break
default:t=void 0}}catch(n){}},gt=function(){if(t){var n={STORED:!0,classname:E,donthyphenateclassname:x,minwordlength:H,hyphenchar:_,urlhyphenchar:V,togglebox:nt,displaytogglebox:f,remoteloading:m,enablecache:d,onhyphenationdonecallback:D,onerrorhandler:b,intermediatestate:I,selectorfunction:F,safecopy:X,doframes:p,storagetype:g,orphancontrol:C,dohyphenation:Hyphenator.doHyphenation,persistentconfig:c,defaultlanguage:O}
t.setItem("Hyphenator_config",e.JSON.stringify(n))}},yt=function(){var n
t.getItem("Hyphenator_config")&&(n=e.JSON.parse(t.getItem("Hyphenator_config")),Hyphenator.config(n))}
return{version:"4.1.0",doHyphenation:!0,languages:{},config:function(e){var n,a=function(t,n){var a,o
return o=typeof e[t],o===n?a=!0:(b(Error("Config onError: "+t+" must be of type "+n)),a=!1),a}
e.hasOwnProperty("storagetype")&&(a("storagetype","string")&&(g=e.storagetype),t||dt()),!e.hasOwnProperty("STORED")&&t&&e.hasOwnProperty("persistentconfig")&&e.persistentconfig===!0&&yt()
for(n in e)if(e.hasOwnProperty(n))switch(n){case"STORED":break
case"classname":a("classname","string")&&(E=e[n])
break
case"donthyphenateclassname":a("donthyphenateclassname","string")&&(x=e[n])
break
case"minwordlength":a("minwordlength","number")&&(H=e[n])
break
case"hyphenchar":a("hyphenchar","string")&&(e.hyphenchar==="&shy;"&&(e.hyphenchar=String.fromCharCode(173)),_=e[n])
break
case"urlhyphenchar":e.hasOwnProperty("urlhyphenchar")&&a("urlhyphenchar","string")&&(V=e[n])
break
case"togglebox":a("togglebox","function")&&(nt=e[n])
break
case"displaytogglebox":a("displaytogglebox","boolean")&&(f=e[n])
break
case"remoteloading":a("remoteloading","boolean")&&(m=e[n])
break
case"enablecache":a("enablecache","boolean")&&(d=e[n])
break
case"enablereducedpatternset":a("enablereducedpatternset","boolean")&&(y=e[n])
break
case"onhyphenationdonecallback":a("onhyphenationdonecallback","function")&&(D=e[n])
break
case"onerrorhandler":a("onerrorhandler","function")&&(b=e[n])
break
case"intermediatestate":a("intermediatestate","string")&&(I=e[n])
break
case"selectorfunction":a("selectorfunction","function")&&(F=e[n])
break
case"safecopy":a("safecopy","boolean")&&(X=e[n])
break
case"doframes":a("doframes","boolean")&&(p=e[n])
break
case"storagetype":a("storagetype","string")&&(g=e[n])
break
case"orphancontrol":a("orphancontrol","number")&&(C=e[n])
break
case"dohyphenation":a("dohyphenation","boolean")&&(Hyphenator.doHyphenation=e[n])
break
case"persistentconfig":a("persistentconfig","boolean")&&(c=e[n])
break
case"defaultlanguage":a("defaultlanguage","string")&&(O=e[n])
break
case"useCSS3hyphenation":a("useCSS3hyphenation","boolean")&&(k=e[n])
break
case"unhide":a("unhide","string")&&(M=e[n])
break
default:b(Error("Hyphenator.config: property "+n+" not known."))}t&&c&&gt()},run:function(){var n,a,r=function(){try{if(o.document.getElementsByTagName("frameset").length>0)return
Z(void 0),$(),tt(pt),f&&nt()}catch(e){b(e)}},i=e.frames.length
if(t||dt(),u||S||U(e,r),S||u){if(p&&i>0)for(n=0;i>n;n+=1){a=void 0
try{a=e.frames[n].document+""}catch(s){a=void 0}a&&(o=e.frames[n],r())}o=e,r()}},addExceptions:function(e,t){e===""&&(e="global"),A.hasOwnProperty(e)?A[e]+=", "+t:A[e]=t},hyphenate:function(e,t){var n,a,o
if(Hyphenator.languages.hasOwnProperty(t)){if(Hyphenator.languages[t].prepared||et(t),n=function(e){var n
return n=B.test(e)?ot(e):at(t,e)},typeof e=="object"&&typeof e!="string"&&e.constructor!==String){o=0,a=e.childNodes[o]
while(a)a.nodeType!==3||H>a.data.length?a.nodeType===1&&(a.lang!==""?Hyphenator.hyphenate(a,a.lang):Hyphenator.hyphenate(a,t)):a.data=a.data.replace(Hyphenator.languages[t].genRegExp,n),o+=1,a=e.childNodes[o]}else if(typeof e=="string"||e.constructor===String)return e.replace(Hyphenator.languages[t].genRegExp,n)}else b(Error('Language "'+t+'" is not loaded.'))},getRedPatternSet:function(e){return Hyphenator.languages[e].redPatSet},isBookmarklet:function(){return S},getConfigFromURI:function(){var e,t,n,a,r,i,s=null,l={},u=o.document.getElementsByTagName("script")
for(e=0,n=u.length;n>e;e+=1)if(u[e].getAttribute("src")&&(s=u[e].getAttribute("src")),s&&s.indexOf("Hyphenator.js?")!==-1){for(a=s.indexOf("Hyphenator.js?"),r=s.substring(a+14).split("&"),t=0;r.length>t;t+=1)i=r[t].split("="),i[0]!=="bm"&&(i[1]==="true"?i[1]=!0:i[1]==="false"?i[1]=!1:isFinite(i[1])&&(i[1]=parseInt(i[1],10)),i[0]==="onhyphenationdonecallback"&&(i[1]=Function("",i[1])),l[i[0]]=i[1])
break}return l},toggleHyphenation:function(){Hyphenator.doHyphenation?(ht(),Hyphenator.doHyphenation=!1,gt(),nt()):(pt("*"),Hyphenator.doHyphenation=!0,gt(),nt())}}}(window)
Hyphenator.isBookmarklet()&&(Hyphenator.config({displaytogglebox:!0,intermediatestate:"visible",doframes:!0,useCSS3hyphenation:!0}),Hyphenator.config(Hyphenator.getConfigFromURI()),Hyphenator.run())
