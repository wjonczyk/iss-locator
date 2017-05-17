# iss-locator
Sample application to show International Space Station's geolocation

To run this application there are some requirements:
1. You need some kind of webserver. I used Apache 2.4 and configured vhost with DocumentRoot
pointing to root directory so my vhost configuration looked like this:
<VirtualHost *:80>
    ServerAdmin mail@gmail.com
    DocumentRoot "c:/Apache24/htdocs/iss-locator"
    ServerName iss-locator
	ServerAlias iss-locator
    ErrorLog "logs/iss_locator-error.log"
    CustomLog "logs/iss_locator-access.log" common
</VirtualHost>

Also in file "etc/hosts" I added following line to be able to retrieve my local server by name:
127.0.0.1		iss-locator
2. PHP 5.6 (php_curl extension needs to be loaded)
3. I had some problems with SSL certificate verification, so what helped in my case
was 
    a) dwnload the latest cacert.pem from https://curl.haxx.se/ca/cacert.pem
    b) set line curl.cainfo=/path/to/downloaded/cacert.pem in my php.ini file
4. To load this application simply run in webbrowser:
http://iss-locator/index.php?action=show

Be sure to restart Apache (or other webserver) after making changes in config files