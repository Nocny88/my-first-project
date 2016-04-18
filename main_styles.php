<style type="text/css">
* {
    padding: 0;
    margin: 0;
    font-family: 'Roboto',sans-serif;
    font-size: 14px;
    color: #2a2a2a;
    letter-spacing: .2px;
}

html {
    width: 100%;
    height: 70%;
    background-image: url(/img/pat_2.jpg);
}

body {
    height: 100%;
}

h6 {
    font-size: 11px;
    font-weight: 400;
}

h5 {
    font-size: 15px;
    font-weight: 600;
}

h4 {
    font-size: 17px;
    font-weight: 600;
}

a {
    text-decoration: none;
    color: #000;
}

#container {
    width: 90%;
    max-width: 1050px;
    margin: 0 auto;
    height: 100%;
    position: relative;
}

#header-cont {
    position: fixed;
    top: 0;
    height: auto;
    width: 90%;
    max-width: 1050px;
    margin: 0 auto;
}

#header {
    height: 75px;
    background-color: #fff;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

#header-equal {
    height: 40px;
    top: 0;
}

#header-left {
    width: 60%;
    height: 40px;
    float: left;
    text-align: left;
}

#header-right {
    width: 40%;
    height: 40px;
    float: left;
    text-align: right;
}

#menu {
    width: 100%;
    height: 51px;
    background-color: rgba(255,255,255,0.8);
}

#left-menu {
    width: 90%;
    height: 51px;
    float: left;
}

#right-menu {
    width: 10%;
    height: 50px;
    float: right;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 15px;
    text-align: center;
    white-space: nowrap;
    list-style-type: none;
}

#right-menu li {
    background-color: #F34C3D;
    line-height: 51px;
}

#right-menu li a {
    color: #fff;
    display: block;
}

#right-menu li ul {
    position: absolute;
    visibility: hidden;
    transform: scaleY(0);
    transition: 250ms;
    transform-origin: 50% 0;
    z-index: 1;
    list-style-type: none;
    width: 10%;
}

#right-menu li:hover ul {
    visibility: visible;
    transform: scaleY(1);
}

#right-menu li ul li {
    text-align: center;
    border-top: 1px solid #fff;
    border-left: 1px solid #fff;
}

#header-img {
    margin-top: 76px;
    height: 200px;
}

#header-img img {
    width: 100%;
    height: 200px;
}

#content {
    width: 100%;
    overflow: hidden;
    min-height: 100%;
    height: auto;
    background-color: #fff;
    margin-bottom: -100px;
    padding-bottom: 100px;
}

#footer {
    width: 100%;
    height: 180px;
    clear: both;
    background-color: #2F2F2F;
    bottom: 0;
}

#left-footer {
    width: 50%;
    float: left;
    overflow: hidden;
      justify-content: center;
  flex-direction: column;
  height: 166px;
}

#right-footer {
    width: 50%;
    float: left;
    text-align: center;
    overflow: hidden;
  display: flex;
  justify-content: center;
  flex-direction: column;
  height: 166px;

}

#right-footer p {

    color: #dddddd;
    font-size: 13px;

}

#bottom-footer {
    width: 100%;
    height: 40px;
    float: left;
    background-color: #252525;
    text-align: center;
}

#bottom-footer a:first-child img {
float: left;
margin-top: 5px;
margin-left: 5px;
height: 31px;
}

#bottom-footer a:last-child img {
float: right;
margin-top: 5px;
}

#bottom-footer span {
line-height: 40px;
font-size: 12px;
}

#bread-crumb {
    height: 40px;
    line-height: 36px;
    border-top: 1px solid #E2E2E2;
    border-bottom: 1px solid #E2E2E2;
    background-color: #fff;
    white-space: nowrap;
    text-transform: uppercase;
    padding-left: 5px;
}

#bread-crumb span {
    font-size: 11px;
}

#bread-crumb span b {
    font-size: 11px;
    font-weight: 700;
}

#main-menu {
    line-height: 51px;
    height: 100%;
    width: 100%;
    list-style-type: none;
    font-size: 15px;
    text-transform: uppercase;
    font-weight: 500;
}

#main-menu li {
    display: table-cell;
    width: 13%;
    white-space: nowrap;
}

#main-menu li:nth-child(2) {
    border: none;
}

#main-menu li a {
    display: block;
    text-decoration: none;
    padding-left: 10px;
    padding-right: 10px;
}

#main-menu li ul li a {
    border-bottom: 1px solid rgba(0,0,0,.05);
}

#main-menu li a:hover {
    color: #F34C3D;
}

#main-menu li ul {
    font-weight: 400;
    font-size: 14px;
    border-top: 2px solid #F34C3D;
    background-color: rgba(255,255,255,0.8);
    position: absolute;
    visibility: hidden;
    transform: scaleY(0);
    transition: 250ms;
    transform-origin: 50% 0;
    z-index: 1;
    list-style-type: none;
    box-shadow: 5px 5px 5px rgba(0,0,0,0.176);
    white-space: nowrap;
}

#main-menu li ul li {
    float: none;
    width: auto;
    display: block;
}

#main-menu li ul li:hover {
    border: none;
}

#main-menu li:hover ul {
    visibility: visible;
    transform: scaleY(1);
}

#page-nav {
    font-size: 13px;
}

#page-nav ul {
    list-style-type: none;
    float: left;
    position: relative;
    left: 50%;
}

#page-nav ul li {
    float: left;
    margin: 0 5px;
    position: relative;
    right: 50%;
    margin-bottom: 5px;
}

.article-full-box {
    position: relative;
    background-color: #FFF;
    padding: 5px;
    height: auto;
}

.article-full-header {
    border-top: 1px solid #E2E2E2;
    border-left: 1px solid #E2E2E2;
    border-right: 1px solid #E2E2E2;
    height: 40px;
    line-height: 40px;
    padding-left: 5px;
    padding-right: 5px;
    background-color: rgba(240,240,240,0.2);
}

.article-full-header input {
    line-height: 40px;
    font-size: 17px;
    font-weight: 600;
    width: 100%;
    border: none;
    float: left;
    background-color: #FCFCFC;
}

.article-full-header input:active {
    border: none;
}

.article-full-img {
    position: relative;
    padding-left: 5px;
    padding-right: 5px;
    height: 40px;
    line-height: 39px;
    border-left: 1px solid #E2E2E2;
    border-right: 1px solid #E2E2E2;
}

.article-full-content {
    padding: 10px;
    position: relative;
    min-height: 780px;
    text-align: justify;
    border: 1px solid #E2E2E2;
}

.article-full-footer {
    background-color: rgba(240,240,240,0.2);
    position: relative;
    height: 40px;
    text-align: center;
    line-height: 40px;
    border-left: 1px solid #E2E2E2;
    border-right: 1px solid #E2E2E2;
    border-bottom: 1px solid #E2E2E2;
}

.article-full-footer a img {
    line-height: none;
    margin-top: 7px;
    margin-left: 5px;
    margin-right: 5px;
    position: absolute;
}

.article-in-box {
    margin: 5px;
    border: 1px solid #E2E2E2;
    background-color: rgba(240,240,240,0.2);
    overflow: hidden;
}

.article-img {
    width: 210px;
    height: 210px;
    float: left;
    display: flex;
    justify-content: center;
    flex-direction: column;
}

.article-img img {
    margin: 5px;
    border: 1px solid #E2E2E2;
    overflow: hidden;
}

.article-header {
    line-height: 40px;
    height: 40px;
    padding-left: 210px;
}

.article-header h4 {
    white-space: nowrap;
    overflow: hidden;
    padding-left: 5px;
    margin-right: 5px;
}

.article-content {
    height: 147px;
    overflow: auto;
    background-color: #fff;
    border: 1px solid #E2E2E2;
    border-right: none;
    margin-left: 210px;
    font-size: 13px;
    font-family: 'Verdana',sans-serif;
}

.article-content p {
    padding: 10px;
    text-align: justify;
    text-justify: inter-word;
    font-size: 13px;
    font-family: 'Verdana',sans-serif;
}

.article-footer-left {
    line-height: 21px;
    height: 21px;
    padding-left: 210px;
}

.article-footer-left a {
    float: right;
    margin-right: 5px;
    font-size: 11px;
}

.mytable {
    width: 100%;
    border: 1px solid #E3E3E3;
    border-collapse: collapse;
}

.mytable td {
    padding: 15px;
    border: 1px solid #bfbfbf;
}

.mytable tr:nth-child(2n+1) {
    background: #f2f2f2;
}

.mytable td a {
    transition-duration: .1s;
    transition-timing-function: linear;
}

.mytable td a:hover {
    font-weight: 700;
}

.in-box2 {
    margin: 5px;
    padding: 5px;
    border: 1px solid #E2E2E2;
    background-color: rgba(240,240,240,0.2);
    overflow: auto;
}

blockquote {
  margin-top: 15px;
  padding-bottom: 15px;
  font: 14px/20px italic Times, serif;
  padding: 8px;  
  margin: 15px;
  background-image: url(/img/openquote1.gif);
  background-position: top left;
  background-repeat: no-repeat;
  text-indent: 30px;
  background-size: 10px;
  }
  
blockquote span {
  color: #DDDDDD;
  display: block;
  background-image: url(/img/closequote1.gif);
  background-repeat: no-repeat;
  background-position: bottom right;
  background-size: 10px;
   }

</style>