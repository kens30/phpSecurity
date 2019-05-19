<?php
class DBUtil
{
    protected $pdo = null;

    function __construct($host,$user,$pass,$db)
	{
    	$this->host = $host;
    	$this->user = $user;
    	$this->pass = $pass;
    	$this->db = $db;
        $this->dsn = "mysql:dbname=$db;host=$host;charset=utf8";
	}

    function getPdoResource()
    {
        if (!$this->pdo) {
            $this->pdo = new PDO($this->dsn, $this->user, $this->pass);
        }
        return $this->pdo;
    }

    function begin()
    {
        try{
            $pdo = $this->getPdoResource();
            $pdo->beginTransaction();
        } catch(PDOException $e) {
            echo 'Connection failed:'.$e->getMessage();
            exit();
        }
    }

    function commit()
    {
        try{
            $pdo = $this->getPdoResource();
            $pdo->commit();
        } catch(PDOException $e) {
            echo 'Connection failed:'.$e->getMessage();
            exit();
        }
    }

    function rollback()
    {
        try{
            $pdo = $this->getPdoResource();
            $pdo->rollBack();
        } catch(PDOException $e) {
            echo 'Connection failed:'.$e->getMessage();
            exit();
        }
    }

    function fetch($sql)
	{
    	try{
            $pdo = $this->getPdoResource();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch(PDOException $e) {
            echo 'Connection failed:'.$e->getMessage();
            exit();
        }
	}

    function insert($sql)
    {
        return $this->execute($sql);
    }

    function update($sql)
    {
        try{
            $pdo = $this->getPdoResource();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $affectedRows = $stmt->rowCount();
            return $affectedRows;

        } catch(PDOException $e) {
            echo 'Connection failed:'.$e->getMessage();
            exit();
        }
    }

    function execute ($sql)
    {
        try{
            $pdo = $this->getPdoResource();
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $data = $pdo->lastInsertId();
            return $data;
    	} catch(PDOException $e) {
            echo 'Connection failed:'.$e->getMessage();
            exit();
        }
	}

    function getLastInsertId()
    {
        return $this->getPdoResource()->lastInsertId();
    }

    function getAffectedRowCounts()
    {
        return $this->getPdoResource()->rowCount();
    }
}
?>