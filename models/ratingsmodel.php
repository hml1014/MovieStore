<?php
class RatingsModel extends Model
{

        // A method to set any variable passed to this object
        public function __set($name, $value) {
                $this->name = $value;
        }


        // A method to return any variable that are set
        public function __get($name) {
                if (isset($this->name)) { return $this->name ;}
        }

	public  function getAllRatings(){
                $this->_sql = 'SELECT m.title,r.rating FROM movie m, ratings r WHERE m.mid=r.mid';
                $movies_list = $this->getAll();
                return $movies_list;
        }

	public function getRatingsByStar($parameter){
		$this->_sql = 'SELECT m.title,r.rating FROM movie m, ratings r WHERE m.mid=r.mid and r.rating= :star';
		$values = array(':star'=>$parameter);
                $movies_list= $this->getAll($values);
                return $movies_list;
	}
	
	 public function getRatingsByTitle($parameter){
                $this->_sql = 'SELECT m.title,r.rating FROM movie m, ratings r WHERE m.mid=r.mid AND m.title LIKE "%'.$parameter.'%"';
                $movies_list= $this->getAll();
                return $movies_list;
        }

	public function getRatingsByZip($parameter){
                $this->_sql = 'SELECT m.title,r.rating FROM movie m, ratings r, reviewer u WHERE m.mid=r.mid AND u.rid=r.rid AND u.zipcode LIKE "%'.$parameter.'%"';
                $movies_list= $this->getAll();
                return $movies_list;
        }

	public function getRatingsByOccupation($parameter){
		$this->_sql = 'SELECT m.title,r.rating FROM movie m, ratings r, reviewer u, occupation o WHERE m.mid=r.mid AND u.rid=r.rid AND o.oid=u.oid AND o.o_title=:job';
		$values = array(':job'=>$parameter);
		$movies_list= $this->getAll($values);
		return $movies_list;
	}
		
	public function getRatingsByYear($parameter){
		$endyear=1959;
		if ($parameter==1960) {$endyear=1979;}
		else if ($parameter==1980) { $endyear=1989; }
		else if ($parameter==1990) { $endyear=1994; }
		else if ($parameter==1995) { $endyear=1999; }

		$this->_sql = 'SELECT m.title,r.rating FROM movie m, ratings r WHERE m.mid=r.rid AND m.r_date BETWEEN :year AND :endyear ORDER BY m.title';
		$values = array(':year'=>$parameter, ':endyear'=>$endyear);
		$movies_list=$this->getAll($values);
		return $movies_list;
	}

	public function getRatingsByAge($parameter){
		$age=$parameter+19;
		$this->_sql = 'SELECT m.title,r.rating FROM movie m, ratings r, reviewer u WHERE m.mid=r.mid AND u.rid=r.rid AND u.age BETWEEN :young AND :old';
		$values = array(':young'=>$parameter, ':old'=>$age);
		$movies_list=$this->getAll($values);
                return $movies_list;
	}
}
?>

