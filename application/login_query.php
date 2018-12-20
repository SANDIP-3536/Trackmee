institute admin:
SELECT
employee.*
,institute.*
FROM employee 
join institute 
on 
employee_client_profile_id = institute_profile_id 
WHERE employee_profile_id=2
and employee_type = 2


SELECT credential_username
,employee_profile_id
,employee_type
FROM 
credential  
JOIN employee 
on 
employee_profile_id = credential_profile_id
and employee_type = credential_profile_id
left join institute 
on 
employee_client_profile_id = institute_profile_id 
WHERE credential_profile_id =1
AND credential_user_type=1 
and institute_expiry_date ="9999-12-31"
and employee_expiry_date = "9999-12-31"

Super admin:

SELECT 
credential_username
,employee.*
FROM 
credential  
JOIN 
employee on 
employee_profile_id = credential_profile_id
WHERE credential_profile_id =1
AND credential_user_type=1
AND user_expiry_date="9999-12-31"

login Query:
SELECT credential_profile_id,credential_user_type FROM credential where credential_username='11111111' and credential_password='0192023a7bbd73250516f069df18b500';

fetch_data_through_login query_id

Codeignator Super admin:
$this->db->select('credential_username');
$this->db->from('credential');
$this->db->join('employee','employee_profile_id = credential_profile_id');
$this->db->where('credential_profile_id',1);
$this->db->where("credential_user_type","1");
$this->db->where("user_expiry_date","9999-12-31");
$query=$this->db->get();

Codeignator Super admin:
$this->db->select('credential_username,employee_profile_id,employee_type')->from('credential')->join('employee','employee_profile_id = credential_profile_id')->join('institute','employee_client_profile_id = institute_profile_id','left')->where('credential_profile_id',1)->where("credential_user_type","1")->where("employee_expiry_date","9999-12-31")->where("institute_expiry_date","9999-12-31")->get();

