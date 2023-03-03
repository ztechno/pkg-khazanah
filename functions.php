<?php

$parent_path = '../';
if (in_array(php_sapi_name(),["cli","cgi-fcgi"])) {
    $parent_path = '';
}

if(file_exists($parent_path . 'vendor/autoload.php'))
{
    require $parent_path . 'vendor/autoload.php';
}

require $parent_path . 'libs/JwtAuth.php';
require $parent_path . 'libs/Form.php';
require $parent_path . 'libs/ArrayHelper.php';
require $parent_path . 'libs/Session.php';
require $parent_path . 'libs/Database.php';
require $parent_path . 'libs/Page.php';
require $parent_path . 'libs/Validation.php';

$config = require $parent_path . 'config/main.php';

function app($key = false)
{
    $conn  = conn();
    $db    = new Database($conn);
    $app   = $db->single('application');

    if(!$key)
        return $app;
    return $app->{$key};
}

function get_role($user_id)
{
    $conn  = conn();
    $db    = new Database($conn);

    $query = "SELECT user_roles.*, roles.name FROM `user_roles` JOIN roles ON roles.id = user_roles.role_id WHERE user_id=$user_id";
    $db->query = $query;
    return $db->exec('single');
}

function get_roles($user_id)
{
    $conn  = conn();
    $db    = new Database($conn);

    $query = "SELECT user_roles.*, roles.name FROM `user_roles` JOIN roles ON roles.id = user_roles.role_id WHERE user_id=$user_id";
    $db->query = $query;
    return $db->exec('all');
}

function get_allowed_routes($user_id)
{
    $conn  = conn();
    $db    = new Database($conn);

    $query = "SELECT role_routes.route_path FROM `user_roles` JOIN roles ON roles.id = user_roles.role_id JOIN role_routes ON role_routes.role_id = user_roles.role_id WHERE user_id=$user_id";
    $db->query = $query;
    return $db->exec('all');
}

function generated_menu($user_id)
{
    if($user_id == 'guest')
    {
        $menu = config('guest_menu')['menu'];
        $icon = config('guest_menu')['icon'];
    }
    else
    {
        $menu = config('menu')['menu'];
        $icon = config('menu')['icon'];
    }

    $generated = "";
    $r = get_route();

    foreach($menu as $key => $route)
    {
        if(is_array($route))
        {
            $dropdown = '';
            $allowed = false;
            $active = false;

            foreach($route as $label => $submenu)
            {
                if(is_array($submenu))
                {
                    $_dropdown = '';
                    $_active = false;
                    foreach($submenu as $label_submenu => $sub_submenu)
                    {
                        if($user_id != 'guest' && !is_allowed($sub_submenu,$user_id)) continue;
                        $allowed = true;
                        $start_route = $sub_submenu; // str_replace('/index','',$submenu);
                        if(!$active)
                        {
                            $active = startWith($r, $start_route)||(isset($_GET['table'])&&$_GET['table']==$key);
                            $_active = $active;
                        }
                        $_dropdown .= '<li class="'.(startWith($r, $start_route)?'active':'').'">
                            <a href="'.routeTo().$sub_submenu.'">
                                <span class="sub-item">'.ucwords($label_submenu).'</span>
                            </a>
                        </li>';
                    }

                    $dropdown .= '<li class="'.($active && $_active?'submenu':'').'">
                                    <a data-toggle="collapse" href="#'.str_replace(' ','_',$key).array_search($submenu, array_values($route)).'" aria-expanded="'.($active && $_active?'true':'').'">
                                        <span class="sub-item">'.ucwords($label).'</span>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse '.($active && $_active?'show':'').'" id="'.str_replace(' ','_',$key).array_search($submenu, array_values($route)).'">
                                        <ul class="nav nav-collapse subnav">
                                        '.$_dropdown.'
                                        </ul>
                                    </div>
                                </li>';

                }
                else
                {
                    if($user_id != 'guest' && !is_allowed($submenu,$user_id)) continue;
                    $allowed = true;
                    $start_route = $submenu; // str_replace('/index','',$submenu);
                    
                    $base_route  = explode('?',$submenu);
                    $start_route = str_replace('/index','',$base_route[0]);
                    $url = routeTo('') . $submenu;
                    $url = parse_url($url);
                    $table = '';
                    if(isset($url['query']))
                    {
                        parse_str($url['query'], $params); 
                        $table = isset($params['table']) ? $params['table'] : '';
                    }

                    if(!$active)
                    {
                        $active = ($start_route != 'crud' ? startWith($r, $submenu) : (isset($_GET['table'])&&($_GET['table']==$key||$_GET['table']==$table)));
                    }
                    
                    $submenu_active = ($start_route != 'crud' ? startWith($r, $submenu) : (isset($_GET['table'])&&($_GET['table']==$key||$_GET['table']==$table)));
                    $dropdown .= '<li class="'.($submenu_active?'active':'').'">
                                    <a href="'.routeTo().$submenu.'">
                                        <span class="sub-item">'.($label == 'Cakupan Realisasi dan Masalah Kesehatan' ? $label : ucwords($label)).'</span>
                                    </a>
                                </li>';
                }
            }

            $dropdown = '<li class="nav-item '.($active?'active submenu':'').'">
                            <a data-toggle="collapse" href="#'.$key.'" aria-expanded="'.($active?'true':'').'">
                                <i class="'.$icon[$key].'"></i>
                                <p>'.ucwords(__($key)).'</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse '.($active?'show':'').'" id="'.$key.'">
                                <ul class="nav nav-collapse">
                                '.$dropdown.'
                                </ul>
                            </div>
                        </li>';
            if(!$allowed) continue;
            $generated .= $dropdown;
        }
        else
        {
            if($user_id != 'guest' && !is_allowed($route,$user_id)) continue;
            $base_route  = explode('?',$route);
            $start_route = str_replace('/index','',$base_route[0]);
            $url = routeTo('') . $route;
            $url = parse_url($url);
            $table = '';
            if(isset($url['query']))
            {
                parse_str($url['query'], $params); 
                $table = isset($params['table']) ? $params['table'] : '';
            }

            $active = ($start_route != 'crud' ? startWith($r, $start_route) : (isset($_GET['table'])&&($_GET['table']==$key||$_GET['table']==$table)));

            
            $generated .= '<li class="nav-item '.($active?'active':'').'">
                                <a href="'.routeTo().$route.'">
                                    <i class="'.$icon[$key].'"></i>
                                    <p>'.ucwords($key).'</p>
                                </a>
                            </li>';
        }
    }

    return $generated;
}

function is_allowed($path, $user_id)
{
    $ret = false;
    $allowed_routes = get_allowed_routes($user_id);
    foreach($allowed_routes as $route)
    {
        $route_path = $route->route_path;
        if(endsWith($route_path, '*'))
        {
            $route_path = str_replace('*','',$route_path);
            if(startWith($path, $route_path))
            {
                $ret = true;
                break;
            }
        }
        elseif($path == $route_path)
        {
            $ret = true;
            break;
        }
        elseif(startWith($path,'crud/') && isset($_GET['table']))
        {
            $pretty = config('pretty_url');
            $fullpath = $path . ($pretty ? '?' : '&') . 'table=' . $_GET['table'];
            if($fullpath == $route_path)
            {
                $ret = true;
                break;
            }
        }
    }
    return $ret;
}

function in_route($route, $collections)
{
    $ret = false;
    foreach($collections as $collection)
    {
        if(endsWith($collection, '*'))
        {
            $route_path = str_replace('*','',$collection);
            if(startWith($route, $route_path))
            {
                $ret = true;
                break;
            }
        }
        elseif($route == $collection)
        {
            $ret = true;
            break;
        }
    }

    return $ret;
}

function config($key = false)
{
    global $config;
    if($key) return $config[$key] ?? false;
    return $config;
}

function conn(){
    $database = config('database');
    $type = $database['driver'];
    if($type=='PDO')
    {
        // Connect using UNIX sockets
        if($database['socket'])
        {
            $dsn = sprintf(
                'mysql:dbname=%s;unix_socket=%s',
                $database['dbname'],
                $database['socket']
            );
        }
        else
        {
            $dsn = sprintf(
                'mysql:dbname=%s;host=%s',
                $database['dbname'],
                $database['host']
            );
        }

        // Connect to the database.
        $conn = new PDO($dsn, $database['username'], $database['password']);

        return $conn;
    }
    else
    {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
            return new mysqli(
                $database['host'],
                $database['username'],
                $database['password'],
                $database['dbname'],
                $database['port'],
                $database['socket']
            );
        } catch (\mysqli_sql_exception $e) {
            echo $e->getMessage();
            die();
        }
    }

}

function load_page($page)
{

    $action = load_action($page);
    $data = !is_array($action) ? [] : $action;
    load_templates($page,$data);
    return;
}

function load_action($action)
{
    if(file_exists('../actions/'.$action.'.php'))
        return require '../actions/'.$action.'.php';
    return [];
}

function load_templates($template, $data = [], $flush = false)
{    
    if(file_exists('../templates/'.$template.'.php'))
    {
        extract($data);
        if($flush)
            ob_start();

        require '../templates/'.$template.'.php';
        
        if($flush)
            return ob_get_clean();
    }
    else
        require '../templates/errors/404.php';
}

function startWith($str, $compare)
{
    return substr($str, 0, strlen($compare)) === $compare;
}

function routeTo($path = false, $param = [], $force_pretty = false)
{
    $pretty = $force_pretty == true ? $force_pretty : config('pretty_url');
    $base_url = base_url();
    if($param)
    {
        $param = http_build_query($param);
        $param = $pretty ? '?'.$param : '&'.$param;
    }
    else
    {
        $param = '';
    }
    if($pretty)
    {
        return $base_url.'/'.$path.$param;
    }
    return $base_url.'/index.php?r='.$path.$param;
}

function base_url()
{
    return url(); // config('base_url');
}

function url(){
    $server_name = $_SERVER['SERVER_NAME'];

    if (!in_array($_SERVER['SERVER_PORT'], [80, 443])) {
        $port = ":$_SERVER[SERVER_PORT]";
    } else {
        $port = '';
    }

    if (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS']) == 'on' || $_SERVER['HTTPS'] == '1')) {
        $scheme = 'https';
    } else {
        $scheme = 'http';
    }

    $base_path = config('base_path');
    return $scheme.'://'.$server_name.$port.$base_path;
}

function auth()
{
    // mode jwt
    if(config('auth') == 'jwt')
        return JwtAuth::get();
    if(config('auth') == 'session')
        return Session::get();
}

function stringContains($string,$val){
    if (strpos($string, $val) !== false) {
        return true;
    }

    return false;
}

function arrStringContains($string,$arr){

    $result = [];

    for($i = 0; $i < count($arr);$i++){
       $result[] = stringContains($string,$arr[$i]);
    }

    return in_array(true,$result);
}

function request($method = false)
{
    if(!$method)
        return $_SERVER['REQUEST_METHOD'];

    if(strtolower($method) == 'post')
        return $_POST;

    return $_GET;
}

function get_route()
{
    $route = false;
    if(isset($_GET['r']))
        $route = $_GET['r'];
    else
    {
        $base_path = config('base_path');
    
        $uri = rtrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
        
        if(startWith($uri, $base_path)) $uri = substr($uri, strlen($base_path));
        
        $request_uri = strtok($uri, '?');
        
        $route = $request_uri != '/' ? trim($request_uri,'/') : false;
    }
    return !$route?config('default_page'):$route;
}

function startsWith( $haystack, $needle ) {
    $length = strlen( $needle );
    return substr( $haystack, 0, $length ) === $needle;
}

function endsWith( $haystack, $needle ) {
   $length = strlen( $needle );
   if( !$length ) {
       return true;
   }
   return substr( $haystack, -$length ) === $needle;
}

function set_flash_msg($data)
{
    $_SESSION['flash'] = $data;
}

function get_flash_msg($key)
{
    if(isset($_SESSION['flash'][$key]))
    {
        $message = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $message;
    }

    return false;
}

/**
 * Wrapper for easy cURLing
 *
 * @author Viliam Kopecký
 *
 * @param string HTTP method (GET|POST|PUT|DELETE)
 * @param string URI
 * @param mixed content for POST and PUT methods
 * @param array headers
 * @param array curl options
 * @return array of 'headers', 'content', 'error'
 */
function simple_curl($uri, $method='GET', $data=null, $curl_headers=array(), $curl_options=array()) {
	// defaults
	$default_curl_options = array(
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_HEADER => true,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 3,
	);
	$default_headers = array();

	// validate input
	$method = strtoupper(trim($method));
	$allowed_methods = array('GET', 'POST', 'PUT', 'DELETE');

	if(!in_array($method, $allowed_methods))
		throw new \Exception("'$method' is not valid cURL HTTP method.");

	// init
	$curl = curl_init($uri);

	// apply default options
	curl_setopt_array($curl, $default_curl_options);

	// apply method specific options
	switch($method) {
		case 'GET':
			break;
		case 'POST':
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;
		case 'PUT':
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			break;
		case 'DELETE':
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
			break;
	}

	// apply user options
	curl_setopt_array($curl, $curl_options);

	// add headers
	curl_setopt($curl, CURLOPT_HTTPHEADER, array_merge($default_headers, $curl_headers));

	// parse result
	$raw = rtrim(curl_exec($curl));
	$lines = explode("\r\n", $raw);
	$headers = array();
	$content = '';
	$write_content = false;
	if(count($lines) > 3) {
		foreach($lines as $h) {
			if($h == '')
				$write_content = true;
			else {
				if($write_content)
					$content .= $h."\n";
				else
					$headers[] = $h;
			}
		}
	}
	$error = curl_error($curl);

	curl_close($curl);

	// return
	return array(
		'raw' => $raw,
		'headers' => $headers,
		'content' => $content,
		'error' => $error
	);
}

function count_total($items)
{
    $total = 0;
    foreach($items as $item)
        $total += $item['subtotal'];

    return $total;
}

function _ucwords($str)
{
    $str = str_replace('_',' ',$str);
    $str = str_replace('-',' ',$str);

    return ucwords($str);
}

function is_route($route)
{
    return get_route() == $route;
}

function get_title()
{
    $title = Page::get_title() ?? app('name');
    return $title;
}

function redirectBack($message = [])
{
    if($message)
    {
        set_flash_msg($message);
        $url = $_SERVER['HTTP_REFERER']??base_url();
        header('location:'.$url);
        die();
    }
}

function __($key)
{
    $lang = config('lang');
    return $lang[$key] ?? $key;
}

function asset($file)
{
    return url() . '/' .$file;
}

function get_route_path($path, $params)
{
    $pretty = config('pretty_url');
    $fullpath = $path . ($pretty ? '?' : '&') . http_build_query($params);
    return $fullpath;
}

function do_upload($file, $folder, $field = false, $multiple = false)
{
    if(!is_dir($folder))
    {
        mkdir($folder);
    }
    $filename = $file['name'];
    $tmp      = $file['tmp_name'];
    if($field)
    {
        $filename = $filename[$field];
        $tmp      = $tmp[$field];
    }

    if($multiple)
    {
        $files = [];
        foreach($filename as $index => $f)
        {
            $ext  = pathinfo($f, PATHINFO_EXTENSION);
            $name = strtotime('now').'.'.$ext;
            $file_ = $folder.'/'.$name;
            copy($tmp[$index],$file_);
            $files[] = $file_;
        }

        return $files;
    }
    else
    {
        $ext  = pathinfo($filename, PATHINFO_EXTENSION);
        $name = strtotime('now').'.'.$ext;
        $file = $folder.'/'.$name;
        copy($tmp,$file);
        return $file;
    }

    return false;

}


/** 
 * Get header Authorization
 * */
function getAuthorizationHeader(){
    $headers = null;
    if (isset($_SERVER['Authorization'])) {
        $headers = trim($_SERVER["Authorization"]);
    }
    else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
        $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
    } elseif (function_exists('apache_request_headers')) {
        $requestHeaders = apache_request_headers();
        // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
        $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
        //print_r($requestHeaders);
        if (isset($requestHeaders['Authorization'])) {
            $headers = trim($requestHeaders['Authorization']);
        }
    }
    return $headers;
}

/**
 * get access token from header
 * */
function getBearerToken() {
    $headers = getAuthorizationHeader();
    // HEADER: Get the access token from the header
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }
    return null;
}