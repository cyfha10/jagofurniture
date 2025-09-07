<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Register Controller
 */
class Register extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('general_model'); // Load General_model untuk akses fungsi insert
    }

    // Function for showing the register form
    public function index()
    {
        $data['title'] = 'Register Account';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('register', $data);
        $this->load->view('templates/auth_footer');
    }

    // Function for handling register form submission
    public function register_user()
    {
        // Get input values from the registration form
        $email = $this->input->post('useremail');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('userpassword'), PASSWORD_DEFAULT); // Hash the password for security

        // Debugging: Log data
        log_message('debug', 'Email: ' . $email . ', Username: ' . $username);

        // Validate the input (you can add more validation as needed)
        if (empty($email) || empty($username) || empty($password)) {
            log_message('error', 'Validation failed. Empty fields.');
            echo "Please fill in all fields.";
            return;
        }

        // Prepare data for database
        $data = [
            'email' => $email,
            'username' => $username,
            'password' => $password
        ];

        // Debugging: Log prepared data
        log_message('debug', 'Data to insert: ' . print_r($data, true));

        // Call the model to insert the data into the database
        $inserted = $this->general_model->insert('users', $data);

        if ($inserted) {
            log_message('info', 'Data inserted successfully.');
            // Redirect to login page or success page
            redirect('login');
        } else {
            log_message('error', 'Data insert failed.');
            // Show an error message if user registration failed
            echo "Registration failed, please try again.";
        }
    }
}

/* End of file Register.php */
/* Location: ./application/modules/hod/controllers/Register.php */
