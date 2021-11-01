<?php
    class User{
        // DB stuff
        private $conn;
        private $table = 'hh_user';

        // Properties
        private $user_id;
        private $user_type;
        private $user_status;
        private $first_name;
        private $last_name;
        private $phone_number;
        private $date_time_created;
        private $messenger_status;
        private $timestamp_last_active;

        // Constructor with DB
        public function __construct($conn){
            $this->conn = $conn;
        }


        // @name    Check Phone Number
        // @params  user's phone number
        // @returns true if number is in db or false on failure/number is not in db.
        public function is_in_db($phone_number){
            try{
                // CREATE query
                $query = "SELECT 
                            hh.phone_no as phone_no 
                          FROM 
                            ".$this->table." hh WHERE phone_no = :phone";
                
                // Prepare statement
                $stmt = $this->conn->prepare($query);
                
                // Only fetch if prepare succeeded
                if ($stmt !== false) {
                    $stmt->bindparam(':phone', $phone_number);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                $stmt=null;

                return $result == false ? false : true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }


    }






?>