<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_oa2 extends CI_Controller
{
    public function session($provider_name)
    {
        $this->load->library('session');
        $this->load->helper('url_helper');

        $this->load->library('oauth2/OAuth2');
        $this->load->library('tank_auth');
        $this->load->model('tank_auth/users');
        $this->load->model('login_model');
        $this->load->config('oauth2', TRUE);

        $provider = $this->oauth2->provider($provider_name, array(
            'id' => $this->config->item($provider_name . '_id', 'oauth2'),
            'secret' => $this->config->item($provider_name . '_secret', 'oauth2'),
        ));


        if (!$this->input->get('code')) {
            // By sending no options it'll come back here
            $provider->authorize();
        } else {
            // Howzit?
            try {
                //$token = $provider->access($_GET['code']);
                $token = $provider->access($this->input->get('code'));

                $user = $provider->get_user_info($token);


                // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
                // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
                //echo "<pre>Tokens: ";
                //var_dump($token);

                //echo "\n\nUser Info: ";
                if ($this->tank_auth->is_logged_in()) {
                    // logged in
                    $user = $this->users->get_user_by_email($provider_name . '|' . $user['email']);
                    $this->session->unset_userdata('user');
                    $this->session->set_userdata('user', (array) $user);
                    redirect('main');
                } elseif (!is_null($this->users->get_user_by_email($provider_name . '|' . $user['email']))) { //already registered
//                    if(!$this->login_model->checkPhoneFb($this->session->userdata('login_phone'),$user['email']))
//                    {
//                        if($this->setAlert())
//                            redirect('login/logout');
//                    }
                    $user1 = $this->users->get_user_by_email($provider_name . '|' . $user['email']);
                    if ($this->tank_auth->login_oa2($provider_name . '|' . $user['email'], $user['image'])) {
                        if (empty($user1->phone)) {
                            redirect('login/loginPhone');
                        } else{
                            $this->session->set_userdata('login_phone', $user1->phone);
                            redirect('/');
                        }
                    } else {
                        if (!$this->tank_auth->get_is_phone_registered()) {
                            redirect('login');
                        }
                        $errors = $this->tank_auth->get_error_message();
                        if (isset($errors['banned'])) {								// banned user
                            $this->_show_message($this->lang->line('auth_message_banned') . ' ' . $errors['banned']);
                        } elseif (isset($errors['not_activated'])) {				// not activated user
                            redirect('/auth/send_again/');
                        } else {													// fail
                            foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
                        }
                    }
                } else {
                    $sourceImg = '';
                    if (!empty($user['image'])) {
                        $sourceImg = 'public/assets/admin/pages/media/users/' . date('Y-m-d_H-i-s') . '.jpg';
                        copy($user['image'], $sourceImg);
                    }

                    if (!isset($this->session->userdata['login_phone']))
                        if (!is_null($data = $this->tank_auth->create_user_oa2($user['email'], $provider_name, $user['first_name'], $user['last_name'], $sourceImg))) {
                            // success
                            $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                            if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email

                                $this->_send_email('welcome', $data['email'], $data);
                            }

                            redirect('/auth_oa2/session/' . $provider_name);
                        } else {
                            $errors = $this->tank_auth->get_error_message();
                            foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
                        }
                    else {
//                        if(!$this->login_model->checkPhoneFb($this->session->userdata('login_phone'),$user['email']))
//                        {
//                            if($this->setAlert())
//                                redirect('login/logout');
//                        }

                        if (!is_null($data = $this->tank_auth->update_user_oa2($user['email'], $provider_name, $user['first_name'], $user['last_name'], $sourceImg, $this->session->userdata['user_id']))) {
                            // success
                            $data['site_name'] = $this->config->item('website_name', 'tank_auth');
                            if ($this->config->item('email_account_details', 'tank_auth')) {	// send "welcome" email
                                $this->_send_email('welcome', $data['email'], $data);
                            }
                            redirect('/auth_oa2/session/' . $provider_name);
                        } else {
                            $errors = $this->tank_auth->get_error_message();
                            foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
                        }
                    }
                }
            } catch (OAuth2_Exception $e) {
                show_error('That didnt work: ' . $e);
            }
        }
    }

    public function setAlert()
    {
        echo "<script>alert(\"Your phone does not match Facebook.\")</script>";
        return true;
    }
    /**
     * Send email message of given type (activate, forgot_password, etc.)
     *
     * @param	string
     * @param	string
     * @param	array
     * @return	void
     */
    function _send_email($type, $email, &$data)
    {
        /*$this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
        $this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
        $this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
        $this->email->send();*/ }
}

/* End of file auth_oa2.php */
/* Location: ./application/controllers/auth_oa2.php */
