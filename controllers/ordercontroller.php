<?php

class OrderController extends Controller
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

    public function purchase($parameter)
    {
        try {
                $data = array();
                $data = $this->_model->createOrder($parameter); // obtain data
                // define the template
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
     }

    public function insert($parameter)
    {
        try {
                $data = array();
                $data = $this->_model->insertPurchasedItem($parameter); // obtain data
                // define the template
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
     }

    public function registerUser()
    {
	 try {
                $data = array();
                $data = $this->_model->registerNewUser(); // obtain data
                // define the template
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }

    }

    public function getHistoryList($parameter)
    {
        try {
                $data = array();
                $data = $this->_model->getOrderHistory($parameter); // obtain data
                // define the template
                $this->_setView(BASE_DIR.DS.'views/generic_ajax_response.php');
                $this->_view->setData($data ); // define data needed for the template
                $this->_view->output(); // display output
        } catch (Exception $e) {
                echo "Application error:".$e->getMessage();
        }
     } 

}
