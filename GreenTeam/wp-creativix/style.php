<?php
header('Content-type: text/css');
header("Cache-Control: must-revalidate");

$pattern    =   '/^[^a-z0-9]{6}$/';
if (preg_replace('/[^a-z0-9]/i', '', $_GET['style']) && isset($_GET['style'])) {
$color = $_GET["style"];
} else {
$color = "f0623c";
}
?>
/*  
Theme Name: WP-Creativix
Theme URI: http://www.wp-themix.org/themes/wp-creativix-free-premium-portfolio-wordpress-theme/
Description: WP-Creativix is a beautifull business & portfolio Wordpress Theme. It has unlimited variations due to the possibility to define a custom color code as highlight color.
It comes with a Portfolio Template already included which may display your latest work with nice Lightbox support. On the Frontpage it has a nice working Javascript Slideshow.
This Theme comes with a Javascript 3-Level Dropdown Menu. Of course there are many more features such as Custom Logo Uploader and a Big Options set! Have fun while discovering. (Please use my theme DEMO to see how the Theme looks).
Version: 1.5.5
Author: Dennis Nissle
Author URI: http://www.wp-themix.org/
Tags: white, silver, purple, light, three-columns, two-columns, fixed-width, right-sidebar, left-sidebar, theme-options, purple, front-page-post-form, photoblogging, custom-colors, custom-header, sticky-post, microformats
*/

/* General Styles */


html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, font, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
margin: 0;
padding: 0;
border: 0;
outline: 0;
font-size: 100%;
vertical-align: baseline;
background: transparent;
}

* {
margin: 0;
padding: 0;
}

body {
line-height: 1;
margin: 0;
padding: 0;
}

ol, ul {
list-style: none;
}
blockquote, q {
quotes: none;
}

blockquote:before, blockquote:after,
q:before, q:after {
content: '';
content: none;
}

:focus {
outline: 0;
}

ins {
text-decoration: none;
}

del {
text-decoration: line-through;
}

table {
border-collapse: collapse;
border-spacing: 0;
}

a {
color: #<?php echo $color;?>;
text-decoration: none;
}

a:hover {
color: #<?php echo $color;?>;
text-decoration: underline;
}

a:visited {
color: #<?php echo $color;?>;
text-decoration: none;
}

body {
font-size: 12px;
font-family: Tahoma, Geneva, sans-serif;
line-height:18px;
background-color: #CCC;
background-image: url(images/bg2.png);
}

blockquote {
color: #CCC;
font-size: 11px;
font-style: italic;
}

h1, h2, h3 {
/* old color: #f2bc2e; */
color: #a6ae6a;
}

address, caption, cite, code, dfn, em, strong, th, var {
font-style: normal;
font-weight: normal;
}

table {
border-collapse: collapse;
border-spacing: 0;
}
fieldset, img {
border: 0;
}
caption, th {
text-align: left;
}
q:before, q:after {
content: '';
}
abbr {
border:0;
}

#wrapper {
width:930px;
height: auto;
margin-left: auto;
margin-right: auto;
position: relative;
}
		
#topmenu {
margin-top: 5px;
float: right;
clear: both;
}

#header {
float: left;
width: 925px;
height: 100px;
}

#logo {
float: left;
width: 230px;
}

#logo a {
font-family: Juni;
font-size: 46px;
text-transform: uppercase;
padding-bottom: 18px;
}

#logo a, img {
border: none;
}

#logoname {
float: left;
width: 250px;
margin-top: 60px;
}

#logoname a {
font-family: Juni;
font-size: 46px;
text-transform: uppercase;
padding-bottom: 18px;
}

#logoname a, img {
border: none;
}


/* Navigation Styles */

.navigation {
background: url(images/navbar.png) no-repeat;
padding-right:18px;
font-size:12px;
position: relative;
z-index: 6;
width: 672px;
height: 48px;
margin-left: 258px;
margin-top: 52px;
}

#search {
margin-top: 10px;
width: 190px;
float: right;
height: 28px;
}

#search form {
width: 200px;
height: 28px;
}

#searchbox {
background: url(images/search.gif) no-repeat top;
width: 144px;
height: 28px;
border: none;
position: relative;
float: left;

color: #6e6e6e;
}

#searchbutton {
background: url(images/search_btn.gif) no-repeat;
width: 27px;
height: 28px;
border: none;
position: relative;
float: right;
margin-right: 10px;
margin-top: 5px;
cursor: pointer;
}

#header #navbar {
float:left;
height:50px;
line-height:50px;
padding-left:13px;
}

#navbar, #navbar ul {
margin:0;
padding:0;
list-style-type:none;
position:relative;
line-height:50px; 
z-index:5;
}

#header #navbar a {
height:48px;
display:block;
padding:0 21px;
text-decoration:none;
text-align:center;
line-height:28px; 
outline:none;
float: left;
z-index:35;
position:relative;
color: #6e6e6e;
}

#header #navbar a:hover {
color: #<?php echo $color;?>;
}

#header #navbar ul a {
line-height: 35px; 
}

#header #navbar li {
float:left;
position:relative;
z-index:20;
margin-top:10px;
}

#header #navbar li li {
border-left:none;
margin-top:0;
}

#header #navbar ul {
position:absolute;
display:none;
width:172px;
top:36px;
left:-1px;
background: #f5f5f5;
}

#header #navbar li ul a {
width:130px;
height:auto;
float:left;
text-align:left;
padding:0 21px;
}

#header #navbar ul ul {
top:auto;
}	

#header #navbar li ul ul {
left:172px;
top: 0px;
}

#header #navbar li ul ul a {
border-left:none;
}

#header #navbar a{
color:#fff;
}

#header #navbar ul {
border:1px solid #c0c0c0;
border-top:none;
}

#header #navbar li ul a {
border-bottom:1px solid #fff;
border-top:1px solid #c0c0c0;
}

#header #navbar ul a, #header #navbar ul li {
background-color:#f5f5f5;
}

#header #navbar ul a:hover, #header #navbar ul a:focus {
color: #<?php echo $color;?>;
}

#header #navbar .current_page_item a {
}

#header #navbar li:hover ul ul, #header #navbar li:hover ul ul ul,#header  #navbar li:hover ul ul ul ul {
display:none;	
}
#header #navbar li:hover ul, #header #navbar li li:hover ul, #header #navbar li li li:hover ul, #header #navbar li li li li:hover ul {
display:block;
}

/* Slideshow Styles */

#slide-wrapper {
background: url(images/container3.png) no-repeat;
background-position: top center;
width: 930px;
height: 248px;
margin-top: 20px;
margin-left: 3px;
clear: both;
float: left;
margin-bottom: 5px;
}

#idea {
position: relative;
float: left;
width: 293px;
height: auto;
margin-right: 18px;
margin-left: 3px;
margin-top: 30px;
background-color: #999;
background: url(images/ideacontent.png) no-repeat;
background-position: top center;
-moz-box-shadow: 2px 2px 2px #666;
border: 1px solid #ccc;
}

#idea2 {
position: relative;
float: left;
width: 400px;
height: 300px;
margin-right: 18px;
margin-top: 30px;
background-color: #999;
background: url(images/ideacontent.png) no-repeat;
background-position: top center;
-moz-box-shadow: 2px 2px 2px #666;
border: 1px solid #ccc;
}

#idea3 {
position: relative;
float: left;
width: 293px;
height: 380px;
margin-top: 30px;
background-color: #999;
background: url(images/ideacontent.png) no-repeat;
background-position: top center;
-moz-box-shadow: 2px 2px 2px #666;
border: 1px solid #ccc;
}

#member {
width: 60px;
height: 60px;
position: relative;
float: left;
margin-top: 10px;
margin-left: 10px;
background-color: #fff;
}
#member2 {
width: 60px;
height: 60px;
position: relative;
float: left;
margin-top: 10px;
margin-left: 10px;
background-color: #fff;
margin-bottom: 10px;
}

#profilepicture1 {
width: 71px;
height: 100px;
background-color: #000;
position: relative;
float: left;
background: url(images/LarreeLetter.jpg) no-repeat;
margin-left: 10px;
margin-top: 15px;
}

#profilepicture2 {
width: 71px;
height: 100px;
background-color: #000;
position: relative;
float: left;
background: url(images/LetterFromChair.jpg) no-repeat;
margin-left: 10px;
margin-top: 15px;
}

#wngpicture {
margin-left: 20px;
margin-top: 20px;
width: 297px;
height: 198px;
position: relative;
float: left:
background: #000;
background-color:#dddddd;
background: url(images/) no-repeat;
}

#wngmission2 {
margin-top: 20px;
width: 450px;
height: 210px;
position: relative;
float: left;
}

#wngpicture2 {
width: 420px;
height: 205px;
position: relative;
float: left;
margin-left: 50px;
margin-top: 40px;
}

#videoexchange {
width: 420px;
height: 50px;
position: relative;
float: left;
background: #000;
background-color:#dddddd;
background: url(images/videoexchange.png) no-repeat;
}
.wngpicture2 {
margin-top: 10px;
position: relative;
float: left;
font-size: 15px;
line-height: 25px;
}

.wngmission2 {
width: 410px;
position: relative;
float: left;
font-size: 15px;
line-height: 25px;
margin-left: 10px;
}

#wngmission{
margin-top: 20px;
width: 520px;
height: 198px;
position: relative;
float: right;
margin-right: 45px;
}

.thetitle {
font-size: 30px;
position: relative;
float: left;
clear: left;
margin-bottom: 20px;
margin-top: 15px;
margin-left: 10px;
}

.thetitle2 {
width: 200px;
font-size: 16px;
position: relative;
float: right;
margin-bottom: 10px;
margin-top: 10px;
margin-left: 15px;
}

.thetitle3 {
font-size: 30px;
position: relative;
float: left;
clear: left;
margin-bottom: 20px;
margin-top: 15px;
color: #fff;
}

#title4 {
width: 398px;
height: 38px;
position: relative;
float: left;
background: url(images/contentbox.png) no-repeat center top;
}

.title4 {
margin-top: 10px;
margin-left: 15px;
font-size: 16px;
position: relative;
float: left;
color: #fff;
font-style: bold;
}

#para1 {
position: relative;
width: 500x;
height: 100px;
float: left;
margin-left: 10px;
margin-top: 15px;
}

.para1 {
font-size: 16px;
position: relative;
float: left;
line-height: 20px;
color: #fff;
}

.para2 {
font-size: 13px;
position: relative;
float: left;
margin-top: 30px;
margin-left: 10px;
margin-bottom: 20px;
padding-right: 25px;
color: #fff;
}

.para3 {
width: 450px;
font-size: 13px;
position: relative;
float: left;
margin-top: 20px;
margin-left: 20px;
}

.wngmission{
position: relative;
float: left;
clear: left;
font-size: 18px;
line-height: 25px;
color: #333;
}

.featurebox {
width: 921px;
height: 365px;
clear:both;
margin:auto;
}

#image-wrapper {
margin:0 auto;
display:none;
padding:0;
width: 921px;
}

#image-wrapper * {
margin:0;
padding:0;
}
	
#full-image {
position:relative;
padding:0;
width: 860px;
}

.frontslide {
display: none;
}

#text {
float:right;
position:absolute;
top:10px;
width:400px;
height:0;
color:#6e6e6e;
overflow:hidden;
z-index:4;
padding:0px;
left: 490px;
}

#text h3 a {
padding:3px 0 10px 3px;
color: #<?php echo $color;?>;
font-size: 18px;
font-weight:bold;
letter-spacing:-1px;
text-decoration: none;
}

#text h3 a:hover {
text-decoration: underline;
}

#text p {
padding:0 0 5px 3px;
color:#6e6e6e;
float:left;
font-size:12px;
text-align: justify;
margin: 0px;
}

#text p a {
color:#993399;
}

.date {
color:#9d9c9c;
font-size: 10px;
font-style: italic;
}


#image {
width:440px;
height:250px;
}

#image img {
position:absolute;
z-index:2;
width:440px;
height:200px;
left:20px;
top:10px;
border:2px solid #bfbfbf;
}

.imgnav {
position:absolute;
width:25%;
height:180px;
cursor:pointer;
z-index:3;
}

#imgprev {left:0;background:none;}
#imgnext {right:0;background:none;}

#imglink {
position:absolute;
height:150px;
width:100%;
z-index:5;
opacity:.4;
filter:alpha(opacity=40);
}

.linkhover { }

#thumbnails {margin-top:20px;height:38px;}

#arrowleft {
float:left;
width:26px;
height:49px;
background:url(images/left.gif) top center no-repeat;
padding-left:40px;
margin-top: 30px;
z-index:6;
}

#slideleft:hover {}

#arrowright {
float:right;
width:26px;
height:49px;
background:url(images/right.gif) top center no-repeat;
padding-right:40px;
margin-top: 30px;
z-index:7;
}

#slideright:hover {	}

#frontarea {
float:left;
position:relative;
width:785px;
margin-left:3px;
height:100px;
overflow:hidden;
}

html* #frontarea {margin-left:0;}

#fronter {
position:absolute;
left:0;
height:100px;
top: 10px;
}

#fronter img {
cursor:pointer;
border:2px solid #<?php echo $color;?>;
}

/* Frontpage Column Styles */

#big-column {
height: auto;
width: 925px;
margin-left: auto;
margin-right: auto;
position: relative;
}

#column-content {
width: 925px;
float: left;
padding-bottom: 20px;
margin-top: 30px;
margin-left: 7px;
background-color: #fff;
}

/* Featured Posts & Articles on Frontpage */

.feat-post {
width: 580px;
float: left;
margin-top: 15px;
}

.feat-post h2 {
font-size: 16px;
text-decoration: none;
color: #6e6e6e;
}

.feat-post h2 a {
text-decoration: none;
color: #6e6e6e;
}

.feat-post h2 a:hover {
text-decoration: none;
color: #<?php echo $color;?>;
}

.desc h3 {
font-size: 10px;
font-style: italic;
color: #a6ae6a;
font-weight: normal;
clear:both;
border-bottom: 1px solid #b1b1b1;
}

.feat-post p {
text-align: justify;
color: #6e6e6e;
margin-top: 15px;
}

.feat-post img {
margin-top: 20px;
border: 1px solid #<?php echo $color;?>;
}

.latest-posts {
margin-top: 5px;
width: 220px;
padding: 10px 10px 10px 20px;
float: right;
}

.latest-posts h2 {
font-size: 16px;
text-decoration: none;
color: #6e6e6e;
}

.latest-posts h2 a {
text-decoration: none;
color: #6e6e6e;
}

.latest-posts ul {
color: #<?php echo $color;?>;
margin-top: 10px;
list-style-type: none;
}

.latest-posts ul li {
color: #<?php echo $color;?>;
padding-left: 10px;
margin-bottom: 5px;
}

.latest-posts ul li a {
text-decoration: none;
display: block;
line-height: 15px;
color: #<?php echo $color;?>;
}

.latest-posts ul li a:hover {
text-decoration: underline;
color: #<?php echo $color;?>;
}

.latest-posts p {
text-align: justify;
color: #6e6e6e;
margin-top: 10px;
}


/* Subpage Column Styles */

#sub-column {
width: 938px;
height: auto;
margin: 0px auto;
}

#sub-top {
background: url(images/sub-top.gif) no-repeat;
width: 938px;
height: 42px;
margin-left: 7px;
float: left;
margin-top: 10px;
}

#sub-content {
background-color: #f3f3f3;
width: 925px;
float: left;
margin-left: 7px;
background: url(images/sub-content.gif) repeat-y;
}

.featurednews {
font-size: 24px;
color: #a6ae6a;
margin-bottom: 10px;
}

/* Subpage Content Styles */


.content {
width: 620px;
float: left;
padding: 10px 15px 10px 15px;
}

.content h1 {
font-size: 24px;
color: #77893d;
margin: 20px 0px 20px 0px;
font-weight: normal;
}

.content p {
text-align: justify;
color: #111111;
}

.post ul {
border-top: 1px solid #CCC;
list-style-type: disc;
list-style-position:inside;
color: #6e6e6e;
margin: 20px 40px 10px 10px;
}

.post ul li {
color: #6e6e6e;
border-bottom: 1px solid #CCC;
padding: 5px;
}

.post ul li a {
color: #<?php echo $color;?>;
}

.post ol {
border-top: 1px solid #CCC;
list-style-type: disc;
list-style-position:inside;
color: #6e6e6e;
margin: 20px 40px 10px 10px;
}

.post ol li {
color: #6e6e6e;
border-bottom: 1px solid #CCC;
padding: 5px;
}

.post ol li a {
color: #<?php echo $color;?>;
}

/* Breadcrumb Navigation Styles */

.breadcrumb {
float: left;
padding: 13px 15px 10px 15px;
color: #77893d;
font-size: 12px;
}

.breadcrumb a {
color: #<?php echo $color;?>;
font-weight: normal;
text-decoration: none;
}

.breadcrumb a:hover {
text-decoration: underline;
}

/* Sidebar Styles */

.sidebar {
width: 220px;
float: left;
margin-left: 30px;
margin-top: 0px;
padding-bottom: 50px;
}

.widgettitle {
color: #77893d;
font-size: 18px;
font-weight: normal;
padding: 20px 0px 10px 0px; 
list-style-type: none;
}

#sidebar ul li {
list-style-type: none;
}

#sidebar ul ul li a {
padding-left: 30px;
}

#sidebar ul ul ul li a {
padding-left: 40px;
}

.textwidget {
margin: 10px 8px 20px 0px;
color: #6e6e6e;
}

.sidebar ul li a {
color: #<?php echo $color;?>;
text-decoration: none;
border-bottom: 1px solid #CCC;
display: block;
padding: 5px;
padding-left: 20px;
background: url(images/listenpunkt.gif) no-repeat left center;
}

.sidebar ul li a:hover {
color: #<?php echo $color;?>;
text-decoration: underline;
}

.posted {
color:#9d9c9c;
font-size: 10px;
font-style: italic;
display: block;
padding-left: 10px;
}

#wp-calendar {
border:1px solid #cccccc;
color:#6e6e6e;
width: 220px;
}

#wp-calendar caption {
color: #77893d;
font-size: 18px;
font-weight: normal;
padding: 0px 0px 10px 0px; 
list-style-type: none;
}

tbody .pad {
background-color:#dddddd;
}

#wp-calendar a {
font-weight:bold;
font-size:12px;
background: none;
padding: 0px;
margin: 0px;
border: none;
}

thead tr th {
width:20px;
height:20px;
text-align:center;
background-color: #<?php echo $color;?>;
color: #FFF;
border:1px solid #cccccc;
padding: 3px; 
}

tbody tr td {
width:20px;
height:20px;
text-align:center;
border:1px solid #cccccc;
}

tfoot #prev {
width:58px;
height:20px;
text-align:left;
background-color:#ffffff;
background: none;
padding-left: 10px;
}

tfoot #next {
width:58px;
height:20px;
text-align:right;
background-color:#ffffff;
background: none;
padding-right: 10px;
}

/* Comment Styles */

.alt {margin: 0;padding: 10px;}

#comment-wrap {
border: 0px;
color: #6e6e6e;
font-size: 11px;
}

#comment-wrap h6 {
font-size: 12px;
margin-bottom: 10px;
}

#comments ol {
list-style-type: none;
line-height: 18px;
border: 0px;
}

#comments ul li {
list-style-type: none;
list-style-image: none;
list-style-position: outside;
border: 0px;
}

.commentlist {
padding: 0;
text-align: justify;
border: none;
}

.comment-body {
margin-bottom: 20px;
}

.reply {
font-size:11px;
clear: both;
float: right;
margin-top: -20px;
}

.commentlist em {
font-size: 11px;
}

.commentlist li {
margin: 5px 0 0px 10px;
padding: 5px 5px 0px 5px;
list-style: none;
border: 0px;
}

.commentlist li ul li { 
margin-right: -5px;
margin-left: 30px;
margin-bottom: 0px;
list-style: none;
border: 0px;
}

.commentlist li li {
background:none;
border:none;
list-style:none;
margin:3px 0 3px 20px;
padding:3px 0;
border: 0px;
}

.commentlist li .avatar {
border:1px solid #ccc;
margin:5px 8px 6px 5px;
float: left;
padding:2px;
width:45px;
height:45px;
}

.commentlist cite, .commentlist cite a {
font-style: normal;
font-size: 11px;
margin-top: 2px;
}

.commentlist p {
font-weight: normal;
line-height: 1.5em;
text-transform: none; 
margin: 10px 5px 5px 65px;
font-size: 11px;
border: none;
}

#commentform p {
}

.commentmetadata {
font-weight: normal; 
margin: 0;
display: block; 
font-size: 10px;
font-style: italic;
}

.commentmetadata a, .commentmetadata a:visited {
color: #6e6e6e;
}

.commentmetadata a:hover{
}

.children { 
padding: 0;
border: none;
}

.thread-alt {
border: none;
}

.thread-even li {
}
.depth-1 {
border: none;
}

.even, .alt li {
margin-bottom: 20px;
}

#respond input {
margin-right: 10px;
font-size: 11px;
color: #8a8a8a;
display: block;
margin-bottom: 5px;
}

#respond h4 {
font-size: 12px;
margin-bottom: 5px;
}

#submit {
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF !important;
padding: 3px 5px 3px 5px;
margin-top: 10px;
text-decoration: none;
font-size: 12px;
cursor: pointer;
}

#submit:hover {
background-color: #FFF;
border: 1px solid #8a8a8a;
color: #8a8a8a !important;
padding: 3px 5px 3px 5px;
text-decoration: none;
}

/* Portfolio Styles */

#portfolio {
margin: 20px 10px 50px 30px;
float: left;
}

.port-pic {
width: 270px;
height: auto;
background-color: #FFF;
border: 1px solid #CCC;
float: left;
margin-bottom: 20px;
margin-right: 20px;
display: block;
}

.port-pic h3 {
font-size: 16px;
font-weight: normal;
color: #<?php echo $color;?>;
margin: 10px 10px 0px 12px;
}

.port-pic h3 a {
text-decoration: none;
color: #<?php echo $color;?>;
}

.port-pic h3 a:hover {
text-decoration: underline;
color: #<?php echo $color;?>;
}

.port-pic p {
text-align: justify;
color: #8a8a8a;
padding: 5px 10px 10px 10px;
font-style: italic;
font-size: 11px;
}

.port-pic img {
border: 2px solid #CCC;
margin: 10px 10px 0px 7px;
text-align: center;
}

/* Blog Styles */

.post {
padding-bottom: 20px;
margin-bottom: 30px;
border-bottom: 1px solid #CCC;
}

.post h1 a {
color: #<?php echo $color;?>;
text-decoration: none;
}

.post h1 a:hover {
color: #<?php echo $color;?>;
text-decoration: underline;
}

.post p {
margin-top: 20px;
}

.blogpic {
text-align: center;
}

.blogpic img {
margin-top: 20px;
border: 2px solid #CCC;
}

.category a {
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF;
padding: 3px 5px 3px 5px;
text-decoration: none;
font-size: 11px;
margin: 0px 5px;
line-height: 25px;
}

.category a:hover {
background-color: #d4d4d4;
border: 1px solid #8a8a8a;
color: #8a8a8a;
padding: 3px 5px 3px 5px;
text-decoration: none;
}


/* Footer Styles */

#footer {
width: 925px;
height: 45px;
margin-bottom: 5px;
clear: both;
padding: 12px 30px 0px 20px;
margin-left: 7px;
}

#footer .copyright {
color: #8a8a8a;
text-transform: uppercase;
}

#footer a {
color: #<?php echo $color;?>;
text-decoration: none;
padding: 0px 2px;
}

#footer p {
color: #6e6e6e;
text-transform: uppercase;
float: left;
}

#footer a img  {
margin: 0px;
padding: 0px;
display: inline;
}

#footer p.footer-right {
color: #6e6e6e;
float: right;
text-transform: none;
margin: 0px 30px 0px 0px;
}

#footer p.footer-right a {
color: #6e6e6e;
text-decoration: none;
clear: both;
padding: 0px 0px 0px 15px;
}

#footer p.footer-right a:hover {
text-decoration: underline;
}

#bottom {
    width: 100%;
    height: 190px;
    background-color: #999;
    position: relative;
    float: left;
    margin-top: 60px;
    background: url(images/footerbg.jpg);
}

#thegoods {
	position: relative;
	margin-left: auto;
	margin-right: auto;
	width: 920px;
	height: 170px;
	margin-top: 20px;
}
#nav {
	color: #fff;
	width: auto;
    height: auto;
    position: relative;
    float: left;
}
#nav2 {
	margin-top: 15px;
	color: #fff;
	width: auto;
    height: auto;
    position: relative;
    float: left;
    margin-right: 50px;
}
#nav3 {
	margin-top: 15px;
	color: #fff;
	width: auto;
    height: auto;
    position: relative;
    float: left;
    margin-right: 50px;
    clear: left;
}
.navtitle {
	font-size: 14px;
    text-decoration: underline;
}
.navtitle a {
color: #ffffff;
	font-size: 14px;
    text-decoration: underline;
}
.navlinks {
	display: inline;
	margin-left: 5px;
    position: relative;
    float: left;
    margin-top: 10px;
}
.navlinks2 {
	margin-left: 5px;
    position: relative;
    float: left;
    margin-top: 25px;
}
.navlinks li{
position: relative:
float: left;
display: inline;
margin-bottom:5px;
margin-right: 20px;
}
.navlinks a{
color: #FFF;
}
.navlinks2 a{
color: #FFF;
}
.navlinks2 li{
position: relative:
float: left;
display: inline;
margin-bottom:5px;
}


.wordpress-icon {
float: left;
margin-right: 10px;
margin-bottom: 12px;
}

.supported {
color: #CCC;
font-size: 10px;
text-align: center;
width: 925px;
}

.supported a {
color: #CCC;
font-size: 10px;
text-decoration: none;
}

/* Lightbox Images */

#grow {
background:#000 url(images/ajax-loader.gif) no-repeat center center;
border: none;
}

#nycloser {
background: url(images/closed.png) no-repeat center center;
border: none;
}

#next {
background: url(images/next.png) no-repeat center center;
border: none;
}

#next {
background: url(images/next.png) no-repeat center center;
border: none;
}

#prev {
background: url(images/prev.png) no-repeat center center;
border: none;
}

/* Pagenavi */

.wp-pagenavi a, .wp-pagenavi a:link {
padding: 2px 4px 2px 4px; 
margin: 2px;
text-decoration: none;
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF;	
}

.wp-pagenavi a:visited {
padding: 2px 4px 2px 4px; 
margin: 2px;
text-decoration: none;
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF;
}

.wp-pagenavi a:hover {	
background-color: #d4d4d4;
border: 1px solid #8a8a8a;
color: #8a8a8a;
}

.wp-pagenavi a:active {
padding: 2px 4px 2px 4px; 
margin: 2px;
text-decoration: none;
background-color: #d4d4d4;
border: 1px solid #8a8a8a;
color: #8a8a8a;	
}

.wp-pagenavi span.pages {
padding: 2px 4px 2px 4px; 
margin: 2px 2px 2px 2px;
background-color: #8a8a8a;
border: 1px solid #CCC;
color: #FFF;
}

.wp-pagenavi span.current {
padding: 2px 4px 2px 4px; 
margin: 2px;
font-weight: bold;
background-color: #d4d4d4;
border: 1px solid #8a8a8a;
color: #8a8a8a;
}

.wp-pagenavi span.extend {
padding: 2px 4px 2px 4px; 
margin: 2px;	
border: 1px solid #000000;
color: #000000;
background-color: #FFFFFF;
}


.Boldtext {
font-family: Verdana;
font-weight: bold;
}
<!-- Pat's additions -->

.quicklinks {
margin-top: 5px;
margin-bottom: 10px;
width: 220px;
height: 500px;
padding: 10px 10px 20px 20px;
float: right;
}