<?php
	// AjaxCallDump
	// (c) Patrick Prémartin 2022

	// Get last update and add a start to this projet on GitHub :
	// https://github.com/DeveloppeurPascal/PHP-API-Dump
	
	// Don't remember to remove this file after your tests.
	//	
	// Don't put it on a public web server. It could be a security 
	// breach for your datas depending on how and where you store them !!!

	// Specify what arrays you want to dump and get back:
	// - enable a dump by using "true" as the defined value
	// - disable a dump by using "false" as the defined value
	define('Dump_POST',true);
	define('Dump_GET',true);
	define('Dump_FILES',true);
	define('Dump_SERVER',true);
	define('Dump_REQUEST',true);
	define('Dump_COOKIE',true);
	define('Dump_SESSION',true);
	define('Dump_ENV',true);

	// Specify if you want a dump file and where
	// (every call to this program will replace the dump file, do a backup before using it if you have any doubt)
	define('DumpAsFile', true); // "true" to generate a dump file, "false" to not
	define('DumpFilePath', 'dump.txt'); // use a relative file path to the dump file
	
	// Specify if you want an answer with the result as JSON or HTML
	// (if JSON is true, it will be sent as JSON, if not and HTML is true, it will be sent as HTML)
	define('DumpAsJSONAnswer', true); // "true" to replay with a JSON serialized object, "false" if not
	define('DumpAsHTMLAnswer', true); // "true" to replay with a HTML page, "false" if not

	$result = new stdClass();

	if (Dump_POST) {
		$result->POST = $_POST;
	}

	if (Dump_GET) {
		$result->GET = $_GET;
	}

	if (Dump_FILES) {
		$result->FILES = $_FILES;
	}

	if (Dump_SERVER) {
		$result->SERVER = $_SERVER;
	}

	if (Dump_REQUEST) {
		$result->REQUEST = $_REQUEST;
	}

	if (Dump_COOKIE) {
		$result->COOKIE = $_COOKIE;
	}

	if (Dump_SESSION) {
		session_start();
		$result->SESSION = $_SESSION;
	}

	if (Dump_ENV) {
		$result->ENV = $_ENV;
	}

	if (DumpAsFile) {
		file_put_contents(__DIR__."/".DumpFilePath, var_export($result,true));
	}
	
	if (DumpAsJSONAnswer) {
		header("Access-Control-Allow-Origin: *"); // CORS : AJAX JS calls accepted from all domains
		header('Content-Type: application/json; charset=utf8');
		http_response_code(200);	
		print(json_encode($result));
	} else if (DumpAsHTMLAnswer) {
		header("Access-Control-Allow-Origin: *"); // CORS : AJAX JS calls accepted from all domains
		header('Content-Type: text/html; charset=utf8');
		http_response_code(200);	
		print(nl2br(var_export($result, true)));
	}
