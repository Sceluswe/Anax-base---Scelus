This is my version of anax. A structure for websites originally created by Mikael Roos.


My additions to the framework:

Functions folder
Used to include functions into the project that you want to access
from your classes and anywhere else in the code as easily as possible. Without the
need for a singleton or other design pattern.

Font folder
A folder specifically used to include fonts for all your styles. 

CDatabase class
A class that allows you to connect to a database based on the login information that
you have provided. This login information is declared in config.php. The use of
DB_USER and DB_PASSWORD will hide them from others when the code is displayed on
your site cudos to Mikael Roos.
