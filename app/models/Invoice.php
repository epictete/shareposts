<?php

    class Invoice
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getInvoices()
        {
            $this->db->query('SELECT *,
                              posts.id as postId,
                              users.id as userId,
                              posts.created_at as postCreated,
                              users.created_at as userCreated
                              FROM invoices
                              INNER JOIN users
                              ON posts.user_id = users.id
                              ORDER BY posts.created_at DESC
                              ');

            $results = $this->db->resultSet();

            return $results;
        }

        public function addInvoice($data)
        {
            // var_dump($data);
            // die();
            // $date = new DateTime($data['date']);
            // $date = $date->format('m-d-Y');
            $this->db->query('INSERT INTO invoices(number, date, company_id, people_id) VALUES(:number, :date, :company_id, :people_id)');

            // Bind values
            $this->db->bind(':number', $data['number']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':company_id', $data['company']);
            $this->db->bind(':people_id', $data['contact']);
      
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

        public function updateInvoice($data)
        {
            $this->db->query('UPDATE posts SET title = :title, body = :body WHERE id = :id');

            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
      
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

        public function findInvoiceByNumber($number)
        {
            $this->db->query('SELECT * FROM invoices WHERE number = :number');
            $this->db->bind(':number', $number);

            $row = $this->db->single();
            return $row;
        }

        public function deleteInvoice($id)
        {
            $this->db->query('DELETE FROM posts WHERE id = :id');

            // Bind values
            $this->db->bind(':id', $id);
      
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
    }