<?php
class LoginModel extends Model
{

        // A method to set any variable passed to this object
        public function __set($name, $value) {
                $this->name = $value;
        }


        // A method to return any variable that are set
        public function __get($name) {
                if (isset($this->name)) { return $this->name ;}
        }

        public  function checkUserLogin(){
                $this->_sql = 'select username from user where username= :username and password = :pwd';
		$values = array(':username'=>$_POST['username'],
				 ':pwd'=>$_POST['pwd']);
                $member_info = $this->getOne($values);
                return $member_info;
        }

	public function createOrder($parameter){
		$this->_sql = 'INSERT INTO orders (username,total) VALUES (:username, :total)';
		$stm = $this->_db->prepare($this->_sql);
		$values = array(':username'=>$_POST['username'], ':total'=>$parameter);
		$stm->execute($values);
		return 1;
	}

}
?>

