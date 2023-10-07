<?php
namespace Utils;

class Database
{
  public string $host;
  public string $user;
  public string $password;
  public string $databaseName;
  public int $port;

  public static $database;
  public \mysqli $connection;

  public function __construct()
  {
    $this->host = 'localhost';
    $this->user = 'root';
    $this->password = '';
    $this->databaseName = 'arquitectura';
    $this->port = 3306;

    $this->connection = $this->createConnection();
  }

  public function createConnection()
  {
    $mysqli = new \mysqli(
      $this->host,
      $this->user,
      $this->password,
      $this->databaseName,
      $this->port
    );

    if ($mysqli->connect_errno)
      return null;

    $mysqli->options(\MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    return $mysqli;
  }

  public static function getInstance()
  {
    if (!self::$database instanceof self) {
      self::$database = new self();
    }

    return self::$database;
  }

  public function getConnection()
  {
    return $this->connection;
  }

  public static function find(string $sql, int $resulttype = \MYSQLI_NUM): array
  {
    $mysqli = self::getInstance()->getConnection();
    if (is_null($mysqli))
      return array();

    $result = $mysqli->query($sql);
    return $result->fetch_all($resulttype);
  }

  public static function findOne(string $sql, int $resulttype = \MYSQLI_ASSOC): array
  {
    $rows = self::find($sql, $resulttype);
    return !$rows ? array() : $rows[0];
  }

  public static function prepareExecute(string $sql, array $row): bool
  {
    $mysqli = self::getInstance()->getConnection();
    if (is_null($mysqli))
      return false;

    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia)
      return false;

    $sentencia->bind_param(self::bindParam($row), ...$row);

    if (!$sentencia->execute())
      return false;

    $rows = $mysqli->affected_rows;
    $sentencia->close();

	// $this->connection
	// $clave_primaria = $conexion->insert_id;
    return $rows != 0;
  }

  private static function paramType($value): string
  {
    if (is_float($value)) {
      return 'd';
    } else {
      return !is_int($value) ? 's' : 'i';
    }
  }

  private static function prepareFind(string $sql, array $row, int $resulttype = \MYSQLI_NUM): array
  {
    $mysqli = Database::getInstance()->getConnection();
    if (is_null($mysqli))
      return array();

    $sentencia = $mysqli->prepare($sql);
    if (!$sentencia)
      return array();

    $sentencia->bind_param(self::bindParam($row), ...$row);


    if (!$sentencia->execute())
      return array();

    $resultado = $sentencia->get_result();
    if (!$resultado)
      return array();

    $rows = $resultado->fetch_all($resulttype);
    $sentencia->close();
    return $rows;
  }

  private static function prepareFindOne(string $sql, array $row, int $resulttype = \MYSQLI_NUM): array
  {
    $rows = self::prepareFind($sql, $row);
    return !$rows ? array() : $rows[0];
  }

  private static function bindParam(array $row)
  {
    $typeValues = '';
    foreach ($row as $value) {
      $typeValues .= self::paramType($value);
    }
    return $typeValues;
  }
}
