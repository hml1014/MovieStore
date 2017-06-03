<?php

class RatingsController extends Controller
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

    public function getFullRatingsList()
    {
        try {
                $data = array();
                $data = $this->_model->getAllRatings();
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
    }

    public function getStarRatingsList($parameter){
	 try {
                $data = array();
                $data = $this->_model->getRatingsByStar($parameter); // obtain data
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
    }

    public function getOccupationList($parameter)
    {
	try {
		$data = array();
		$data = $this->_model->getRatingsByOccupation($parameter);
		$this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
    }

   public function getYearList($parameter)
    {
        try {
                $data = array();      
                $data = $this->_model->getRatingsByYear($parameter); // obtain data
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
     }

    public function getTitleKeywordList($parameter)
    {
        try {
                $data = array();
                $data = $this->_model->getRatingsByTitle($parameter); // obtain data
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
     }
	
    public function getZipList($parameter)
    {
        try {
                $data = array();
                $data = $this->_model->getRatingsByZip($parameter); // obtain data
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
     }	

    public function getAgeList($parameter)
    {
        try {
                $data = array();
                $data = $this->_model->getRatingsByAge($parameter); // obtain data
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
     }

}
