<?php
namespace App\Components;

class DB
{
    private $dbh;
    private $className = 'stdClass';
    private $params;

    public function __construct()
    {
        $this->params = include __DIR__ . '/../config/db_params.php';
        $this->dbh = new \PDO('mysql:dbname=' . $this->params['dbname'] . ';host=' . $this->params['host'], $this->params['user'], $this->params['password']);
        $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->dbh->exec('set names utf8');
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function getLastRecID()
    {
        return $this->dbh->lastInsertId();
    }
}
