<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
}

function rest_get($request, $data) 
{
    // $veza = new PDO("mysql:dbname=starwarsdb;host=localhost;charset=utf8", "swuser", "swpass");
    // $veza = new PDO('mysql:host=' . getenv('MYSQL_SERVICE_HOST') . ';port=3306;dbname=starwarsdb', 'swuser', 'swpass');
    $veza = new PDO("mysql:dbname=starwarsdb;host=mysql-57-centos7", "swuser", "swpassword");
    $id = $data['id'];
    if($id != "")
    {
        $query = $veza->prepare("SELECT * FROM Poslovnica WHERE id=?"); 
        $query->bindValue(1, htmlspecialchars($data['id'], ENT_QUOTES, "UTF-8"), PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);            
    }
    else
    {
        $query = $veza->prepare("SELECT * FROM Poslovnica");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);   
    }

}

function rest_post($request, $data) { }
function rest_delete($request) { }
function rest_put($request, $data) { }
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>