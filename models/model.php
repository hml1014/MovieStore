<?php
class Model
{
    public $_db; // property to store database connection
    public $_sql; // property to store SQL statement
 
    public function __construct()

    {
        $this->_db = Db::getDb(); // establish database connection 
    }
 

    public function _setSql($sql)
    {
        $this->_sql = $sql; 
    }

    public  function getAll($data = null)
    {
/* Define a method to set SQL statement. This method accepts an associative array, $data, as an argument
     $data should contain named parameters and their corresponding values as key/value pairs.
*/
        if (!$this->_sql)
        {
            throw new Exception("No SQL query defined!");
        }
        $stm = $this->_db->prepare($this->_sql);
        $stm->execute($data);
        return $stm->fetchAll();
    }

    public function getOne($data = null)
    {

/* Define a method to set SQL statement. This method accepts an associative array, $data, as an argument
     $data should contain named parameters and their corresponding values as key/value pairs.
*/
        if (!$this->_sql)
        {
            throw new Exception("No SQL query defined!");
        }

        $stm = $this->_db->prepare($this->_sql);

        $stm->execute($data);

         return $stm->fetch();

    }

}

 

 

?>
