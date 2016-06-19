<?php

	class db {
		var $connection;
		public $result;
		private static $instance = null;
		
        public function __construct($connectionString) {
			$this->connection = pg_connect($connectionString);
        }
		
        function addOrUpdate($query) {
			return pg_query($this->connection, $query);
        }
	
        function getRow($query) {
			$result = pg_query($this->connection, $query);
			return pg_fetch_row($result);
		}
        
        function getRowAsArray($query) {
			$result = pg_query($this->connection, $query);
			return pg_fetch_array($result);
        }
		
        function getRowAsObject($query) {
			$result = pg_query($this->connection, $query);
			return pg_fetch_object($result);
        }
		
        function getAll($query) {
            $result = pg_query($this->connection, $query);
			return pg_fetch_all($result);
        }
		
		function getRowAsAssoc($query) {
			$result = pg_query($this->connection, $query);
			return pg_fetch_assoc($result);
        }
		
        function delete($query) {
			return pg_exec($this->connection, $query);
        }
		
        function closeConnection() {
			pg_close($this->connection);
        }
		
        function dbError($result) {
			echo pg_result_error($result);
        }
		
		public static function getInstance($connectionString) {
			if (!self::$instance) {
				self::$instance = new db($connectionString);
			}
			return self::$instance;
		}
    }
