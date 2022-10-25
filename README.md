# PHP-API-Dump

Simple PHP program to check what you send from a JS script (or a form) to a server and how it receives it if it does.

Put the PHP program in a server (local or distant) and check it by  calling its URL. If it's ok it will display a JSON object with POST and GET properties as empty arrays.

(ex: http://localhost/PHP-Dump/src/ajaxcalldump.php as your endpoint or url of an AJAX call)

Use it to check your JS code and see if what you call with Ajax is well formatted for PHP use on the server side.

## How to dump your Ajax call (or HTML forms sent to a server)

The PHP program is in ./src folder and named "ajaxcalldump.php".

Personalize what you want to dump by putting to true or false the defined on the top of the program.

Personalize if you want a dump file and where you want it.

Finally choose if you want the program send something as an anwser : a JSON object with each record, a HTML page or nothing.

## Default configuration

By default the program will export as HTML what it receive and create a dump.txt file in its folder.

## Security

Use this program only on development server. Never use it in production or remove it after your tests !
