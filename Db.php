<?php

class Db
{
    /** @var \mysqli */
    private $mysqli;
    /** @var \mysqli_result */
    private $result;
    /** @var $insertId int */
    private $insertId;

    private function getConnection()
    {
        //$config = \App::getDb();
        $this->mysqli = new \mysqli("sql209.byetcluster.com", "epiz_24460337", "LmTbhA9LxJd", "epiz_24460337_forca");
        $this->mysqli->set_charset('utf8');
        if ($this->mysqli->connect_error) {
            file_put_contents("db_error.txt", $this->mysqli->connect_error);
            //\Log::create("db_error.log", $this->mysqli->connect_error);
        }
    }

    public function queryBind($sql, $bind = [])
    {
        $this->getConnection();
        $stmt = $this->mysqli->prepare($sql);
        if ($this->mysqli->error) {
            //\Log::create("db_error.log", $this->mysqli->error);
        }
        if (!empty($bind)) {
            $binds = [];
            $type = str_pad("s", count($bind));
            $binds[] = &$type;
            foreach ($bind as $k => $v) {
                $binds[] = &$bind[$k];
            }
            call_user_func_array([$stmt, "bind_param"], $binds);
        }
        if (!$stmt->execute()) {
            $this->result = false;
            return $this;
        }
        $this->result = $stmt->get_result();
        return $this;
    }

    public function query($sql)
    {
        try {
            $this->getConnection();
            $this->result = $this->mysqli->query($sql);
            if ($this->mysqli->insert_id) {
                $this->insertId = $this->mysqli->insert_id;
            }
        } catch (\Exception $e) {
            //\Log::create("db_error.log", $e->getMessage());
        }

        return $this;
    }


    public function getResult()
    {
        return $this->result;
    }

    public function getArray()
    {
        $result = [];
        while ($l = $this->getResult()->fetch_assoc()) {
            $result[] = $l;
        }
        return $result;
    }

    public function getFirst()
    {
        if ($this->getResult())
            return $this->getResult()->fetch_assoc();
        return [];
    }

    public function getInsertId()
    {
        return $this->insertId;
    }

}