<?php  
	# Файл содержит основные функции
	# Данные для подключения к БД
	$dbhost = 'db';
	$dbname = 'ctftool';
	$dbuser = 'root';
	$dbpass = 'root';

	# Подключение к БД
	$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($connection->connect_error) die("Fatal Error 2, problem whith connection");

	# Создание таблицы
	function createTable($name, $query){
		queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
		echo "Таблица '$name' создана или уже существовала<br>";
	}

	# Запрос к БД
	function queryMysql($query){
		global $connection;
		$result = $connection->query($query);
		if (!$result) die("Fatal Error 1, problem whith query");
		return $result;
	}

	# Уничтожение данных текущей сессии
	function destroySession(){
		$_SESSION = array();
		if (session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(), '', time()-2592000, '/');
		session_destroy();
	}

	# Проверка входных данных
	function sanitizeString($var){
		global $connection;
		$var = strip_tags($var);
		$var = htmlentities($var);
		$var = stripslashes($var);
		return $connection->real_escape_string($var);
	}

	# Удаление директории с файлами и поддиректориями
	function removeDirectory($dir) {
		if ($objs = glob($dir."/*")) {
		   foreach($objs as $obj) {
			 is_dir($obj) ? removeDirectory($obj) : unlink($obj);
		   }
		}
		rmdir($dir);
	  }


?>