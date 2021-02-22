<?php
		#MySQL Database name:
	define('DB_NAME', 'land_management_judiciary');

	#MySQL Database User Name:
	define('DB_USER', 'root');

	#MySQL Database Password:
	define('DB_PASSWORD', '');

#MySQL Hostname:
define('DB_HOST', 'localhost');

#Table Prefix:
define('PREFIX','aa_');

#Session Timeout Time:
define('SESSION_TIMEOUT',360000);

#Major version:
define('VERSION','1.0');

#Directory of Uploaded images
define('IMAGE_DIR', 'assets/uploaded_images/');


?>
<?php
#Base Path :
#Please Do not change this absolute path.
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

?>