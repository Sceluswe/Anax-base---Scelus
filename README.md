# Anax-base---Scelus
This is my version of anax, a webbtemplate originally created by Mikael Roos all credits go to him. 
Link to the original: https://github.com/mosbth/Anax-base

My additions to the webbtemplate:

Functions folder (2015-05-20) 
Used to include functions into the project that you want to access from your classes and anywhere 
else in the code as easily as possible. Without the need for a singleton or other design pattern.

Font folder (2015-03-01) 
A folder specifically used to include fonts for all your styles.

CDatabase class (2015-03-01) 
A class that allows you to connect to a database based on the login information that you have provided. 
This login information is declared in config.php. The use of DB_USER and DB_PASSWORD will hide them 
from others when the code is displayed on your site. This feature was implemented by the original author 
(Mikael Roos) and the class itself was developed with the guidance of the author himself while taking one of his courses.

CImage class (2015-04-01) A class allowing the programmer to edit images without the need for an external program. 
This was developed during another course with the guidance of Mikael Roos and is mainly based on his (the original authors) code.

CUpload class (2015-10-17) A class that allows the user to upload png and jpg images. (Will extend this to include .gifs in a separate projekt.)

# Special mention
function get_substr($string, $first, $last) Since I could not find a PHP equivalent of this function I implemented my own. It returns a substring of the parameter string based on whatever it finds inbetween the first and last parameter values. Mentioning that here in case someone can make use of it, improve it, etc. Or perhaps completely destroy it's purpose by pointing me to an already built-in function.

CTextFilter A class provided in afore mentioned course allowing formating of text into various formats.

# License
This software is free software and carries a MIT license owned by Mikael Roos (see below).

# Use of external libraries
The following external modules are included and subject to its own license.

# Markdown Lib
PHP Markdown Lib
Copyright (c) 2004-2015 Michel Fortin
https://michelf.ca/
All rights reserved.
Based on Markdown

Copyright (c) 2003-2006 John Gruber
http://daringfireball.net/
All rights reserved. Path: included in scelus\src\CTextFilter\php-markdown\

# CSource class
The MIT License (MIT) Copyright (c) 2013 Mikael Roos (me@mikaelroos.se) Path: included in scelus\src\CSource\

# History
v1.0 (2015-06-07) Uploaded the entire webbtemplate with my own additions.
