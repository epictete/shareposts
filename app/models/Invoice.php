<?php

    class Invoice
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function addInvoice($data)
        {
            $this->db->query('INSERT INTO invoices(number, date, company_id, people_id) VALUES(:number, :date, :company_id, :people_id)');

            // Bind values
            $this->db->bind(':number', $data['number']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':company_id', $data['company_id']);
            $this->db->bind(':people_id', $data['people_id']);
      
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
            $this->db->query('DELETE FROM invoices WHERE id = :id');

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