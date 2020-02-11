<?php
    require_once __DIR__ . "/config.php";
    const HEADER_SCORE = 40;
    const BODY_SCORE = 20;

    class TempDB{
        public
            $db;
        
        public function __construct(){
            $this->connect_db();
        }
        public function connect_db(){
            $this->db = mysqli_connect( HOST, LOGIN, PASSWORD, DATABASE );
            $this->db->query( "SET NAMES 'utf8'" );
        }
        public function search( $text ){

            //algo of relevant search
            //It's cheap, but it's good

            //$res = $this->db->query( "SELECT * FROM `data` WHERE MATCH (`title`,`text`) AGAINST ('$text')" );     //FULLTEXT

            //get words
            $text = preg_replace( "/\s{2,}/", " ", trim( $text ) );
            $words = explode( " ", $text );

            //get condition
            function get_condition( $column, $key, $score ){
                return "IF ( `$column` LIKE '%$key%', $score, 0)";
            }
            
            //fill the conditions array
            $conditions = [];
            foreach( $words as $w ){
                $conditions []= get_condition( "title", $w, HEADER_SCORE );
                $conditions []= get_condition( "text", $w, BODY_SCORE );
            }

            //query
            $query = "SELECT *,
                (".implode( " + ", $conditions ).") AS `relevant`
                FROM 
                    `data` 
                HAVING 
                    `relevant` > 0
                ORDER BY
                    `relevant` DESC
                LIMIT 20";
            $res = $this->db->query( $query );

            //having result. Get it to the array
            $result = [];                
            while( $row = mysqli_fetch_array( $res ) )
                $result []= $row;
            
            exit( json_encode( $result ) );
            return $result;
        } 
        public function add_template( $title, $text ){
            if( empty( $title ) || empty( $text ) )
                return false;
            file_put_contents( "log.txt" , "INSERT INTO `data` (`title`, `text`) VALUES ( '$title', '$text' )" );
            return $this->db->query( "INSERT INTO `data` (`title`, `text`) VALUES ( '$title', '$text' )" );
        }
        public function get_by_id( $id ){
            if( ! $id ) return false;
            $query = "SELECT * FROM `data` WHERE id = $id";
            $res = $this->db->query( $query );                           
            return mysqli_fetch_array( $res );
        }
        public function update_template( $id, $title, $text ){
            if( !( $id && $title && $text ) ) return false;
            $query = "UPDATE `data` SET `title` = '$title', `text` = '$text' WHERE `data`.`id` = $id";                     
            return $this->db->query( $query ); 
        }
        public function delete_template( $id ){
            if( !$id ) return false;
            $query = "DELETE FROM `data` WHERE `data`.`id` = $id";                     
            return $this->db->query( $query ); 
        }
    }