<?php
    error_reporting(0);
    ini_set('date.timezone', 'Asia/Jakarta');
    define("HOST","localhost");
    define("USERNAME","maknohan_5c3");
    define("PASSWORD","3.s.0.c.9.m.7");
    define("DATABASE","maknohan_toko");

    /**
     * setting konfigurasi replace database 
     */
    define("SQL_DUMP","sql_dump/".DATABASE.".sql");

    // Koneksi dan memilih database di server
    mysql_connect(HOST,USERNAME,PASSWORD) or die("Koneksi gagal");
    mysql_select_db(DATABASE) or die("Database tidak bisa dibuka");

    class DB
    {
        protected $db;
        function __construct() {
            $this->db = $this->check_connection(); 
        }

        /*
        *	public function query
        *	return object
        */
        public function query()
        {
            $stmt= $this->db->prepare($this->query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        /*
        *	public function query
        *	return boolean
        */
        public function query_exec()
        {
            $stmt= $this->db->prepare($this->query);
            return $stmt->execute();
        }
        
        /*
        *	public function query
        *	return lastInsertId
        */
        public function lastInsertId()
        {
            return $this->db->lastInsertId();
        }

        protected function check_connection()
        {
            try {
                $conn = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USERNAME, PASSWORD);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            }
            catch(PDOException $e)
            {
                return $e->getMessage();
                // echo "Connection failed: " . $e->getMessage();
            }
        }
    }

    $db = new DB();
