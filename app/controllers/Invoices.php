<?php

    class Invoices extends Controller
    {
        public function __construct()
        {
            $this->invoiceModel = $this->model('Invoice');
        }

        public function add()
        {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data =
                [
                    'number' => trim($_POST['number']),
                    'date' => trim($_POST['date']),
                    'company' => trim($_POST['company']),
                    'contact' => trim($_POST['contact']),
                    'number_err' => '',
                    'date_err' => '',
                    'company_err' => '',
                    'contact_err' => ''
                ];

                // Validate Number
                if (empty($data['number']))
                {
                    $data['number_err'] = 'Please enter number';
                }
                else
                {
                    if ($this->invoiceModel->findInvoiceByNumber($data['number']))
                    {
                        $data['number_err'] = 'Invoice number already exists';
                    }
                }

                // Validate Date
                if (empty($data['date']))
                {
                    $data['date_err'] = 'Please enter date';
                }

                // Validate Company
                if (empty($data['company']))
                {
                    $data['company_err'] = 'Please select a company';
                }


                // Validate Contact
                if (empty($data['contact']))
                {
                    $data['contact_err'] = 'Please select a contact';
                }

                // Make sure errors are empty
                if (empty($data['number_err']) && empty($data['date_err']) && empty($data['company_err']) && empty($data['contact_err']))
                {
                    // Validated

                    // Add invoice
                    if ($this->invoiceModel->addInvoice($data))
                    {
                        flash('add_success', 'Invoice added');
                        redirect('admin/index');
                    }
                    else
                    {
                        die('Something went wrong');
                    }
                }
                else
                {
                    // Load view with errors
                    $this->view('invoices/add', $data);
                }

            }
            else
            {
                // Init data
                $data =
                [
                    'number' => '',
                    'date' => '',
                    'company' => '',
                    'contact' => '',
                    'number_err' => '',
                    'date_err' => '',
                    'company_err' => '',
                    'contact_err' => ''
                ];

                // Load view
                $this->view('invoices/add', $data);
            }
        }
    }