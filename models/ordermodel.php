<?php
class OrderModel extends Model
{

        // A method to set any variable passed to this object
        public function __set($name, $value) {
                $this->name = $value;
        }


        // A method to return any variable that are set
        public function __get($name) {
                if (isset($this->name)) { return $this->name ;}
        }

	public function createOrder($parameter){
		$this->_sql = 'INSERT INTO orders (username,total) VALUES (:username, :total)';
		$stm = $this->_db->prepare($this->_sql);
		$un = $_POST['username'];
		$values = array(':username'=>$un, ':total'=>$parameter);
		$stm->execute($values);
		return 1;
	}

	public function insertPurchasedItem($parameter){
                $this->_sql = 'INSERT INTO product (onum,mid) VALUES ((SELECT MAX(onum) FROM orders), :mid)';
                $stm = $this->_db->prepare($this->_sql);
                $values = array(':mid'=>$parameter);
                $stm->execute($values);
                return 1;
        }

	public function registerNewUser(){
		$this->_sql = 'INSERT INTO user (username,password) VALUES (:username, :password)';
		$stm = $this->_db->prepare($this->_sql);
		$username='';
		$password='';
		if (isset($_POST["rusername"])){ $username = $_POST["rusername"]; }
		if (isset($_POST["rpassword"])){ $password = $_POST["rpassword"]; }
                $values = array(':username'=>$username, ':password'=>$password);
                $stm->execute($values);
                return 1;
        }

	public function getOrderHistory($parameter){
		$this->_sql = 'SELECT p.onum,m.title,m.price FROM product p, orders o, movie m WHERE p.mid=m.mid AND o.onum=p.onum AND o.username=:username';
		$values = array(':username'=>$parameter);
		$order_list=$this->getAll($values);
		return $order_list;	
	}


}
?>

