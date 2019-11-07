<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model represents user authentication data. It operates the following tables:
 * - user account data,
 * - user profiles
 *
 * @package	Tank_auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Users extends CI_Model
{
	private $table_name			= 'users';			// user accounts
	private $profile_table_name	= 'user_profiles';	// user profiles

	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name			= $ci->config->item('db_table_prefix', 'tank_auth').$this->table_name;
		$this->profile_table_name	= $ci->config->item('db_table_prefix', 'tank_auth').$this->profile_table_name;
	}

	/**
	 * Get user record by Id
	 *
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_user_by_id($user_id, $activated=0)
	{
		$this->db->where('id', $user_id);
//		$this->db->where('activated', $activated ? 1 : 0);

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by login (user_name or email)
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_login($login)
	{
		$this->db->where('LOWER(user_name)=', strtolower($login));
		$this->db->or_where('LOWER(email)=', strtolower($login));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by user_name
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_user_name($user_name)
	{
		$this->db->where('LOWER(user_name)=', strtolower($user_name));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by email
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_email($email)
	{
		$this->db->where('LOWER(email)=', strtolower($email));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by phone number
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_phone_number($phone_number)
	{
		$this->db->where('LOWER(phone)=', strtolower($phone_number));

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	function create_user_by_phone_login($phone_number) 
	{
		$activated = 0;
		$data['email'] = md5(rand(1,100));
		$data['phone'] = $phone_number;
		$data['created'] = date('Y-m-d H:i:s');
		$data['activated'] = $activated ? 1 : 0;

		if ($this->db->insert($this->table_name, $data)) {
			$user_id = $this->db->insert_id();
			if ($activated)	$this->create_profile($user_id);
			return array('user_id' => $user_id);
		}
		return NULL;
	}

	function set_phone_to_user($phone){
        $userdata=$this->session->userdata('user');

        $this->db->set('phone', $phone);
        $this->db->where('id', $userdata['id']);
        $this->db->update('users');
        return true;
    }

	function set_otp_to_phone($phone,$otp)
	{
		$this->db->set('code', $otp);
		$this->db->where('phone', $phone);
		$this->db->update('verification_code_tmp');

        if($this->db->affected_rows()==0)
        {
            $data = array(
                'phone' => $phone,
                'code' => $otp,
            );
            $this->db->insert('verification_code_tmp', $data);
        }
		return NULL;
	}

	function get_otp_by_phone($phone){
        $this->db->where('phone', $phone);
        $query = $this->db->get('verification_code_tmp');
        return $query->row_object();
    }

	function set_otp_to_user_id($user_id,$phone_number,$otp) 
	{
		$this->db->set('verification_code', $otp);
		$this->db->set('phone',$phone_number);
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name);
		return TRUE;
	}

	function user_activated($user_id) 
	{
		$this->db->set('activated','1');
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name);
		return NULL;
	}



	

	/**
	 * Check if user_name available for registering
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_user_name_available($user_name)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(user_name)=', strtolower($user_name));

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

    function is_phone_available($phone)
    {
        $this->db->where('LOWER(phone)=', strtolower($phone));
        $query = $this->db->get($this->table_name);
        return $query->num_rows() == 0;
    }

	/**
	 * Check if email available for registering
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_email_available($email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(email)=', strtolower($email));
		$this->db->or_where('LOWER(new_email)=', strtolower($email));

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	/**
	 * Create new user record
	 *
	 * @param	array
	 * @param	bool
	 * @return	array
	 */
	function create_user($data, $activated = TRUE)
	{
		$facebook_user_id = $this->session->userdata('facebook_user_id');

		$data['created'] = date('Y-m-d H:i:s');
		$data['activated'] = $activated ? 1 : 0;

		if(empty($facebook_user_id))
		{
			if ($this->db->insert($this->table_name, $data)) {
				$user_id = $this->db->insert_id();
				if ($activated)	$this->create_profile($user_id);
				return array('user_id' => $user_id);
			}
		}
		else{

//			$this->db->select('*');
//			$this->db->where('LOWER(receive_user_id)=', strtolower($facebook_user_id));
//			$query = $this->db->get('in_out');
//			$result=$query->result();
//
//			$send_date=$result[0]->send_dt;
//
//
//			$this->db->select('NOW() as current_times');
//			$query1=$this->db->get('in_out');
//			$result1=$query1->result();
//			$current_time=$result1[0]->current_times;
//
//
//			$to_time = strtotime(date($current_time));
//			$from_time = strtotime(date($send_date));
//			$diif=round(abs($to_time - $from_time) / 60). " minute";
//
//			$minute_diff=$this->config->item('signup_link_expiry_time');
//
//			if($minute_diff <= $diif)
//			{
//				$this->db->set('amount',0);
//				$this->db->where('receive_user_id', $facebook_user_id);
//				$this->db->update('in_out');
//			}
			
			$this->db->set('activated', 1);
			$this->db->set('user_name', $data['user_name']);
			$this->db->set('img_url', $data['img_url']);
			$this->db->set('email', $data['email']);
			$this->db->set('full_name', $data['full_name']);
			$this->db->set('last_ip', $data['last_ip']);

			$this->db->where('id', $facebook_user_id);
			$this->db->update($this->table_name);
			$this->session->unset_userdata('facebook_user_id');
			return array('user_id' => $facebook_user_id);

		}
		return NULL;
		
	}
	function update_user($data, $activated = TRUE)
	{
		$facebook_user_id = $data['user_id'];

//        $this->db->select('*');
//		$this->db->where('phone',$this->session->userdata['login_phone']);
//        $this->db->group_start();
//        $this->db->where('user_name IS NOT NULL', null, false);
//        $this->db->where('user_name!=', '');
//        $this->db->group_end();
//		$query=$this->db->get('users');
//		if($query->num_rows()==1)
//        {
//            $this->session->unset_userdata('facebook_user_id');
//            return array('user_id' => $facebook_user_id);
//        }

		$data['created'] = date('Y-m-d H:i:s');
		$data['activated'] = $activated ? 1 : 0;

		if(empty($facebook_user_id))
		{
			if ($this->db->insert($this->table_name, $data)) {
				$user_id = $this->db->insert_id();
				if ($activated)	$this->create_profile($user_id);
				return array('user_id' => $user_id);
			}
		}
		else{

//			$this->db->select('*');
//			$this->db->where('LOWER(receive_user_id)=', strtolower($facebook_user_id));
//			$query = $this->db->get('in_out');
//			$result=$query->result();
//
//			$send_date=$result[0]->send_dt;
//
//
//			$this->db->select('NOW() as current_times');
//			$query1=$this->db->get('in_out');
//			$result1=$query1->result();
//			$current_time=$result1[0]->current_times;
//
//
//			$to_time = strtotime(date($current_time));
//			$from_time = strtotime(date($send_date));
//			$diif=round(abs($to_time - $from_time) / 60). " minute";
//
//			$minute_diff=$this->config->item('signup_link_expiry_time');
//
//			if($minute_diff <= $diif)
//			{
//				$this->db->set('amount',0);
//				$this->db->where('receive_user_id', $facebook_user_id);
//				$this->db->update('in_out');
//			}

			$this->db->set('activated', 1);
			$this->db->set('user_name', $data['user_name']);
			$this->db->set('img_url', $data['img_url']);
			$this->db->set('email', $data['email']);
			$this->db->set('full_name', $data['full_name']);
			$this->db->set('last_ip', $data['last_ip']);

			$this->db->where('id', $facebook_user_id);
//			$this->db->group_start();
//			$this->db->where('user_name IS NULL', null, false);
//			$this->db->or_where('user_name', '');
//            $this->db->group_end();

			$this->db->update($this->table_name);
			$this->session->unset_userdata('facebook_user_id');
			return array('user_id' => $facebook_user_id);

		}
		return NULL;
		
	}

	/**
	 * Activate user if activation key is valid.
	 * Can be called for not activated users only.
	 *
	 * @param	int
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function activate_user($user_id, $activation_key, $activate_by_email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('id', $user_id);
		if ($activate_by_email) {
			$this->db->where('new_email_key', $activation_key);
		} else {
			$this->db->where('new_password_key', $activation_key);
		}
		$this->db->where('activated', 0);
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() == 1) {

			$this->db->set('activated', 1);
			$this->db->set('new_email_key', NULL);
			$this->db->where('id', $user_id);
			$this->db->update($this->table_name);

			$this->create_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}
	

	/**
	 * Purge table of non-activated users
	 *
	 * @param	int
	 * @return	void
	 */
	function purge_na($expire_period = 172800)
	{
		$this->db->where('activated', 0);
		$this->db->where('UNIX_TIMESTAMP(created) <', time() - $expire_period);
		$this->db->delete($this->table_name);
	}

	/**
	 * Delete user record
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete($this->table_name);
		if ($this->db->affected_rows() > 0) {
			$this->delete_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Set new password key for user.
	 * This key can be used for authentication when resetting user's password.
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function set_password_key($user_id, $new_pass_key)
	{
		$this->db->set('new_password_key', $new_pass_key);
		$this->db->set('new_password_requested', date('Y-m-d H:i:s'));
		$this->db->where('id', $user_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Check if given password key is valid and user is authenticated.
	 *
	 * @param	int
	 * @param	string
	 * @param	int
	 * @return	void
	 */
	function can_reset_password($user_id, $new_pass_key, $expire_period = 900)
	{
		$this->db->select('1', FALSE);
		$this->db->where('id', $user_id);
		$this->db->where('new_password_key', $new_pass_key);
		$this->db->where('UNIX_TIMESTAMP(new_password_requested) >', time() - $expire_period);

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 1;
	}

	/**
	 * Change user password if password key is valid and user is authenticated.
	 *
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	function reset_password($user_id, $new_pass, $new_pass_key, $expire_period = 900)
	{
		$this->db->set('password', $new_pass);
		$this->db->set('new_password_key', NULL);
		$this->db->set('new_password_requested', NULL);
		$this->db->where('id', $user_id);
		$this->db->where('new_password_key', $new_pass_key);
		$this->db->where('UNIX_TIMESTAMP(new_password_requested) >=', time() - $expire_period);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Change user password
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function change_password($user_id, $new_pass)
	{
		$this->db->set('password', $new_pass);
		$this->db->where('id', $user_id);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Set new email for user (may be activated or not).
	 * The new email cannot be used for login or notification before it is activated.
	 *
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function set_new_email($user_id, $new_email, $new_email_key, $activated)
	{
		$this->db->set($activated ? 'new_email' : 'email', $new_email);
		$this->db->set('new_email_key', $new_email_key);
		$this->db->where('id', $user_id);
		$this->db->where('activated', $activated ? 1 : 0);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Activate new email (replace old email with new one) if activation key is valid.
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function activate_new_email($user_id, $new_email_key)
	{
		$this->db->set('email', 'new_email', FALSE);
		$this->db->set('new_email', NULL);
		$this->db->set('new_email_key', NULL);
		$this->db->where('id', $user_id);
		$this->db->where('new_email_key', $new_email_key);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Update user login info, such as IP-address or login time, and
	 * clear previously generated (but not activated) passwords.
	 *
	 * @param	int
	 * @param	bool
	 * @param	bool
	 * @return	void
	 */
	function update_login_info($user_id, $record_ip, $record_time)
	{
		$this->db->set('new_password_key', NULL);
		$this->db->set('new_password_requested', NULL);

		if ($record_ip)		$this->db->set('last_ip', $this->input->ip_address());
		if ($record_time)	$this->db->set('last_login', date('Y-m-d H:i:s'));

		$this->db->where('id', $user_id);
		$this->db->update($this->table_name);
	}

	/**
	 * Ban user
	 *
	 * @param	int
	 * @param	string
	 * @return	void
	 */
	function ban_user($user_id, $reason = NULL)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 1,
			'ban_reason'	=> $reason,
		));
	}

	/**
	 * Unban user
	 *
	 * @param	int
	 * @return	void
	 */
	function unban_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 0,
			'ban_reason'	=> NULL,
		));
	}

	/**
	 * Create an empty profile for a new user
	 *
	 * @param	int
	 * @return	bool
	 */
	private function create_profile($user_id)
	{
		$this->db->set('user_id', $user_id);
		return $this->db->insert($this->profile_table_name);
	}

	/**
	 * Delete user profile
	 *
	 * @param	int
	 * @return	void
	 */
	private function delete_profile($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete($this->profile_table_name);
	}

    //Set Verify Status
    public function setStatus($userId){
        $this->db->set('status', 1);
        $this->db->where('id', $userId);
        $this->db->update('users');

        if($this->db->affected_rows()==0)
            return false;
        else
            return true;
    }
}

/* End of file users.php */
/* Location: ./application/models/auth/users.php */