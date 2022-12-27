<?php
require("database.php"); // Please configure the database in this file first

// Receive the json data from the front-end
$json = file_get_contents('php://input');
$ReqObj = json_decode($json);
// var_dump($data);die;

switch ($ReqObj->action) {
        // Ajax implementation, return data with echo
    case 'create':
        $delMessage = new Output;
        $delMessage->setId($ReqObj->id);
        $message = $delMessage->get();
        echo $message;
        break;
    case 'update':
        // Adding new data will also select this branch
        $addMessage = new Output;
        $message = $addMessage->add($ReqObj);
        echo $message;
        break;
    case 'delete':
        $delMessage = new Output;
        $delMessage->setId($ReqObj->id);
        $message = $delMessage->del();
        echo $message;
        break;
    default:
        $output = new Output;
        $message = $output->get();
        echo $message;
}

/**
 * --------------------------------------------
 * @Description Simple output management class
 * @DateTime 2022-12-19
 * --------------------------------------------
 */
class Output
{
    protected $id;
    public function setId($id)
    {
        $this->id = $id;
    }
    public function link()
    {
        return new Curl(HOST, USER, PASS, DBNAME, CHARSET);
    }
    public function get()
    {
        $jsonData = array();
        $jsonData = array('code' => 200,  'info' => 'success', 'data' => $this->link()->get($this->id));
        return json_encode($jsonData);
    }
    public function add($addObj)
    {
        $jsonData = array();
        $dbData = $this->link();
        $res = $dbData->upadd($addObj);
        if ($res) {
            $jsonData = array('code' => 200,  'info' => 'success', 'data' => $dbData->get());
        } else {
            $jsonData = $this->resFails();
        }
        return json_encode($jsonData);
    }
    public function del()
    {
        $jsonData = array();
        $dbData = $this->link();
        $res = $dbData->del($this->id);
        if ($res) {
            $jsonData = array('code' => 200,  'info' => 'success', 'data' => $dbData->get());
        } else {
            $jsonData = $this->resFails();
        }
        return json_encode($jsonData);
    }
    public function resFails()
    {
        return array('code' => 300,  'info' => 'fails', 'data' => 'sorry');
    }
}

/**
 * --------------------------------------------
 * @Description Database related classes
 * @DateTime 2022-12-19
 * --------------------------------------------
 */
class Curl
{
    private $host;
    private $user;
    private $password;
    private $database;
    private $charset;

    public function __construct($host, $user, $password, $database, $charset)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;
    }

    protected function dsn()
    {
        return sprintf("mysql:host=%s;dbname=%s;chartset=%s", $this->host, $this->database, $this->charset);
    }

    protected function pdo()
    {
        try {
            $pdo = new PDO($this->dsn(), $this->user, $this->password);
            // get only associative array
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            return "Exception:" . $e->getMessage();
        }
    }

    public function get($id = null)
    {
        $sql = "SELECT id,manuactor,typ,ps FROM vehicle ORDER BY id";
        if ($id) {
            $sql = "SELECT id,manuactor,typ,ps FROM vehicle WHERE id = $id ORDER BY id";
        }
        $query = $this->pdo()->query($sql);
        $data = $query->fetchAll();
        return $data;
    }

    public function upadd($addObj)
    {
        if (isset($addObj->id)) {
            // edit
            $id = $addObj->id;
            $manuactor = $addObj->manuactor;
            $typ = $addObj->typ;
            $ps = $addObj->ps;
            $sql = "UPDATE vehicle SET manuactor=?, typ=?, ps=? WHERE id=?";
            $query = $this->pdo()->prepare($sql)->execute([$manuactor, $typ, $ps, $id]);
            return $query;
        } else {
            // add
            $manuactor = $addObj->manuactor;
            $typ = $addObj->typ;
            $ps = $addObj->ps;
            $sql = "INSERT INTO vehicle(manuactor,typ,ps) VALUES (?,?,?)";
            $query = $this->pdo()->prepare($sql)->execute([$manuactor, $typ, $ps]);
            return $query;
            // var_dump($query);die;
        }
    }

    public function del($id)
    {
        $sql = "DELETE FROM vehicle WHERE id=?";
        $query = $this->pdo()->prepare($sql)->execute([$id]);
        return $query;
    }
}
