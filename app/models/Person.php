<?php

    class Person
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getPeople()
        {
            $this->db->query('SELECT * FROM people');

            $results = $this->db->resultSet();

            return $results;
        }

        public function addPerson($data)
        {
            $this->db->query('INSERT INTO
                              people(first_name, last_name, telephone, email, company_id)
                              VALUES
                              (:first_name, :last_name, :telephone, :email, :company_id)
                              ');

            // Bind values
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':telephone', $data['telephone']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':company_id', $data['company_id']);
      
            // Execute
            if ($this->db->execute())
            {
              return true;
            }
            else
            {
              return false;
            }
        }

        public function findEmail($email)
        {
            $this->db->query('SELECT * FROM people WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();
            return $row;
        }

        public function findTelephone($telephone)
        {
            $this->db->query('SELECT * FROM people WHERE telephone = :telephone');
            $this->db->bind(':telephone', $telephone);

            $row = $this->db->single();
            return $row;
        }
    }