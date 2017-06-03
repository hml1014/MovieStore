<?php

class MovieController extends Controller
{

   public function __construct($prefix, $action)
   {
        parent::__construct($prefix, $action);
        // Use the prefix to define the model	
        // comment out the two line below if you do not
        //  need a model to get data    
        $model = ucfirst($prefix).'Model';
        $this->_setModel($model);

   }

   public function getLinkList()
   {
	try {
		$data = array();
                $data = $this->_model->getMovieLinks(); // obtain data
                // define the template
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
   }

    public function getFullMovieList()
    {
        try {
                $data = array();
                $data = $this->_model->getAllMovies(); // obtain data
		// define the template
		$this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
     }

    public function getAvgRatingList($parameter)
    {
	try {
		$data = array();
		$data = $this->_model->getMoviesByAvgRating($parameter);
		$this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
    }

     public function getMovieGenreList($parameter)
    {
        try {
                $data = array();
                $data = $this->_model->getMoviesByGenre($parameter);
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
    }

    public function getMovieTitleList($parameter)
    {
	 try {
                $data = array();
                $data = $this->_model->getMoviesByTitle($parameter);
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }

    }

    public function getMovieYearList($parameter)
    {
         try {
                $data = array();
                $data = $this->_model->getMoviesByYear($parameter);
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }

    }

    public function getMoviePriceList($parameter)
    {
         try {
                $data = array();
                $data = $this->_model->getMoviesByPrice($parameter);
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }

    }

    public function getStyleList($parameter)
    {
	 try {
                $data = array();
                $data = $this->_model->getMoviesByStyle($parameter);
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }

    }

    public function getCompanyList($parameter)
     {
         try {
                $data = array();
                $data = $this->_model->getMoviesByCompany($parameter);
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }

    }
}
