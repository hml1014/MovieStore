<?php
class MovieModel extends Model
{

        // A method to set any variable passed to this object
        public function __set($name, $value) {
                $this->name = $value;
        }


        // A method to return any variable that are set
        public function __get($name) {
                if (isset($this->name)) { return $this->name ;}
        }

	public  function getAllMovies(){
                $this->_sql = 'select mid,title,price from movie';
                $movies_list = $this->getAll();
                return $movies_list;
        }

	public function getMoviesByAvgRating($parameter){
		$thing=$parameter+1;
		$this->_sql = 'SELECT mid,title,price FROM movie WHERE mid IN (SELECT mid FROM ratings GROUP BY mid HAVING AVG(rating)>=:star AND AVG(rating)< :end)';
		$values = array(':star'=>$parameter, ':end'=>$thing);
		$movies_list= $this->getAll($values);
		return $movies_list;
	}
		
	public function getMoviesByGenre($parameter){
		$this->_sql = 'SELECT m.mid,m.title, m.price FROM movie m, genre g WHERE m.mid=g.mid AND g.genre= :genre';
		$values = array(':genre'=>$parameter);
		$movies_list=$this->getAll($values);
		return $movies_list;
	}

	public function getMoviesByTitle($parameter){
		 $this->_sql = 'SELECT mid,title,price FROM movie WHERE title LIKE "%'.$parameter.'%"';
		 $movies_list = $this->getAll();
                 return $movies_list;
	}

	public function getMoviesByYear($parameter){
		$endyear=1959;
                if ($parameter==1960) {$endyear=1979;}
                else if ($parameter==1980) { $endyear=1989; }
                else if ($parameter==1990) { $endyear=1994; }
                else if ($parameter==1995) { $endyear=1999; }
		
		$this->_sql = 'SELECT mid,title,price FROM movie WHERE r_date BETWEEN :year AND :endyear';
		$values = array(':year'=>$parameter, ':endyear'=>$endyear);
                $movies_list=$this->getAll($values);
                return $movies_list;
	}

	public function getMoviesByPrice($parameter){
		$end=$parameter+2;
		$this->_sql = 'SELECT mid,title, price FROM movie WHERE price >= :start AND price < :end';
		$values = array(':start'=>$parameter, ':end'=>$end);
		$movies_list=$this->getAll($values);
		return $movies_list;
	}

	public function getMovieLinks(){
		$this->_sql = 'SELECT m.title,l.link FROm movie m, links l WHERE m.mid=l.mid';
		$movies_list = $this->getAll();
		return $movies_list;
	}

	public function getMoviesByStyle($parameter){
		$this->_sql = 'SELECT m.mid,m.title,m.price FROM movie m, kids_animation k WHERE m.mid=k.mid AND k.style= :style';
		$values = array(':style'=>$parameter);
		$movies_list=$this->getAll($values);
                return $movies_list;
	}

	public function getMoviesByCompany($parameter){
		$this->_sql = 'SELECT m.mid,m.title,m.price FROM movie m, kids_animation k WHERE m.mid=k.mid AND k.company= :company';
		$values = array(':company'=>$parameter);
                $movies_list=$this->getAll($values);
                return $movies_list;
	}
}
?>

