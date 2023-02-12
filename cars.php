<?php
class Product{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "accel_db";
	private $productTable = 'cars';    
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}	
	public function cleanString($str){
		return str_replace(' ','_',$str);
	}

	public function getAvailability() {		
		$sqlQuery = "
			SELECT distinct car_availability
			FROM ".$this->productTable." 
			GROUP BY car_availability";
        return  $this->getData($sqlQuery);
	}

	public function getLocation() {	
		$sqlQuery = "
			SELECT distinct location
			FROM ".$this->productTable." 
			GROUP BY location";
        return  $this->getData($sqlQuery);
	}

	public function getCarType() {
		$sqlQuery = "
			SELECT distinct car_type
			FROM ".$this->productTable." 
			GROUP BY car_type";
        return  $this->getData($sqlQuery);
	}

	public function getTransmission() {
		$sqlQuery = "
			SELECT distinct car_transmission
			FROM ".$this->productTable." 
 			GROUP BY car_transmission";
        return  $this->getData($sqlQuery);
	}

	public function getSeatCapacity() {
		$sqlQuery = "
			SELECT distinct car_seat_capacity
			FROM ".$this->productTable." 
			GROUP BY car_seat_capacity ORDER BY car_seat_capacity DESC";
        return  $this->getData($sqlQuery);
	}

	public function getTotalProducts() {
		$sql= "SELECT distinct car_id FROM ".$this->productTable." WHERE client_username = 'admin' ";
		if(isset($_POST['car_availability']) && $_POST['car_availability']!="") {
			$car_availability = $_POST['car_availability'];
			$sql.="AND car_availability IN ('".implode("','",$car_availability)."')";
		}
		if(isset($_POST['location']) && $_POST['location']!="") {
			$location = $_POST['location'];
			$sql.="AND location IN ('".implode("','",$location)."')";
		}
		if(isset($_POST['car_type']) && $_POST['car_type']!="") {
			$car_type = $_POST['car_type'];
			$sql.="AND car_type IN ('".implode("','",$car_type)."')";
		}
		if(isset($_POST['car_transmission']) && $_POST['car_transmission']!="") {
			$car_transmission = $_POST['car_transmission'];
			$sql.="AND car_transmission IN ('".implode("','",$car_transmission)."')";
		}	
		if(isset($_POST['car_seat_capacity']) && $_POST['car_seat_capacity']!="") {
			$car_seat_capacity = $_POST['car_seat_capacity'];
			$sql.="AND car_seat_capacity IN (".implode(',',$car_seat_capacity).")";
		}
		$productPerPage = 9;		
		$rowCount = $this->getNumRows($sql);
		$totalData = ceil($rowCount / $productPerPage);
		return $totalData;
	}

	public function getProducts() {
		$productPerPage = 9;	
		$totalRecord  = strtolower(trim(str_replace("/","",$_POST['totalRecord'])));
		$start = ceil($totalRecord * $productPerPage);		
		$sql= "SELECT * FROM ".$this->productTable." WHERE client_username = 'admin' ";
		if(isset($_POST['car_availability']) && $_POST['car_availability']!=""){			
			$sql.=" AND car_availability IN ('".implode("','",$_POST['car_availability'])."')";
		}
		if(isset($_POST['location']) && $_POST['location']!=""){			
			$sql.=" AND location IN ('".implode("','",$_POST['location'])."')";
		}
		if(isset($_POST['car_type']) && $_POST['car_type']!=""){			
			$sql.=" AND car_type IN ('".implode("','",$_POST['car_type'])."')";
		}		
		if(isset($_POST['car_transmission']) && $_POST['car_transmission']!=""){			
			$sql.=" AND car_transmission IN ('".implode("','",$_POST['car_transmission'])."')";
		}
		if(isset($_POST['car_seat_capacity']) && $_POST['car_seat_capacity']!="") {			
			$sql.=" AND car_seat_capacity IN (".implode(',',$_POST['car_seat_capacity']).")";
		}
		
		if(isset($_POST['sorting']) && $_POST['sorting']!="") {
			$sorting = implode("','",$_POST['sorting']);			
			if($sorting == 'newest' || $sorting == '') {
				$sql.=" ORDER BY car_id DESC";
			} else if($sorting == 'low') {
				$sql.=" ORDER BY rent_price ASC";
			} else if($sorting == 'high') {
				$sql.=" ORDER BY rent_price DESC";
			}
		} else {
			$sql.=" ORDER BY car_id DESC";
		}

		$sql.=" LIMIT $start, $productPerPage";		
		$products = $this->getData($sql);
		$rowcount = $this->getNumRows($sql);
		$productHTML = '';
		if(isset($products) && count($products)) {			
            foreach ($products as $key => $product) {				
                $productHTML .= '<article class="col-md-4 col-sm-6">
				<div class="thumbnail product">
                <figure>
                <a href="reservation.php?id='.$product['car_id'].'"><img src="'.$product['car_img'].'" alt="'.$product['car_name'].'" /></a>
                </figure>
                <div class="caption">
                <a href="reservation.php?id='.$product['car_id'].'" class="product-name" id="caption"><h6 id="car_name_list"><b>'.$product['car_name'].'</b></h6>
                <h6>Rent Price : <b>'.$product['rent_price'].'</b></h6>
                <h6>Location : <b>'.$product['location'].'</b></h6>
                <h6>Car Type : <b>'.$product['car_type'].'</b></h6>
                <h6>Seat Capacity : <b>'.$product['car_seat_capacity'].'</b></h6>
				<h6>Transmission Type : <b>'.$product['car_transmission'].'</b></h6>
				</a>
                </div>
                </div>	
                </article>';
			}
		}
		return 	$productHTML;	
	}

	public function getTotalAvailableProducts() {
		$sql= "SELECT distinct car_id FROM ".$this->productTable." WHERE client_username = 'admin' AND car_availability = 'yes'";
		if(isset($_POST['location']) && $_POST['location']!="") {
			$location = $_POST['location'];
			$sql.=" AND location IN ('".implode("','",$location)."')";
		}
		if(isset($_POST['car_type']) && $_POST['car_type']!="") {
			$car_type = $_POST['car_type'];
			$sql.=" AND car_type IN ('".implode("','",$car_type)."')";
		}
		if(isset($_POST['car_transmission']) && $_POST['car_transmission']!="") {
			$car_transmission = $_POST['car_transmission'];
			$sql.=" AND car_transmission IN ('".implode("','",$car_transmission)."')";
		}	
		if(isset($_POST['car_seat_capacity']) && $_POST['car_seat_capacity']!="") {
			$car_seat_capacity = $_POST['car_seat_capacity'];
			$sql.=" AND car_seat_capacity IN (".implode(',',$car_seat_capacity).")";
		}
		$productPerPage = 9;		
		$rowCount = $this->getNumRows($sql);
		$totalData = ceil($rowCount / $productPerPage);
		return $totalData;
	}

	public function getAvailableProducts() {
		$productPerPage = 9;	
		$totalRecord  = strtolower(trim(str_replace("/","",$_POST['totalRecord'])));
		$start = ceil($totalRecord * $productPerPage);		
		$sql= "SELECT * FROM ".$this->productTable." WHERE client_username = 'admin' AND car_availability = 'yes'";	
		if(isset($_POST['location']) && $_POST['location']!=""){			
			$sql.=" AND location IN ('".implode("','",$_POST['location'])."')";
		}
		if(isset($_POST['car_type']) && $_POST['car_type']!=""){			
			$sql.=" AND car_type IN ('".implode("','",$_POST['car_type'])."')";
		}		
		if(isset($_POST['car_transmission']) && $_POST['car_transmission']!=""){			
			$sql.=" AND car_transmission IN ('".implode("','",$_POST['car_transmission'])."')";
		}
		if(isset($_POST['car_seat_capacity']) && $_POST['car_seat_capacity']!="") {			
			$sql.=" AND car_seat_capacity IN (".implode(',',$_POST['car_seat_capacity']).")";
		}
		
		if(isset($_POST['sorting']) && $_POST['sorting']!="") {
			$sorting = implode("','",$_POST['sorting']);			
			if($sorting == 'newest' || $sorting == '') {
				$sql.=" ORDER BY car_id DESC";
			} else if($sorting == 'low') {
				$sql.=" ORDER BY rent_price ASC";
			} else if($sorting == 'high') {
				$sql.=" ORDER BY rent_price DESC";
			}
		} else {
			$sql.=" ORDER BY car_id DESC";
		}

		$sql.=" LIMIT $start, $productPerPage";		
		$products = $this->getData($sql);
		$rowcount = $this->getNumRows($sql);
		$productHTML = '';
		if(isset($products) && count($products)) {			
            foreach ($products as $key => $product) {			
                $productHTML .= '<article class="col-md-4 col-sm-6">
				<div class="thumbnail product">
                <figure>
                <a href="reservation.php?id='.$product['car_id'].'"><img src="'.$product['car_img'].'" alt="'.$product['car_name'].'" /></a>
                </figure>
                <div class="caption">
                <a href="reservation.php?id='.$product['car_id'].'" class="product-name" id="caption"><h6 id="car_name_list"><b>'.$product['car_name'].'</b></h6>
                <h6>Rent Price : <b>'.$product['rent_price'].'</b></h6>
                <h6>Location : <b>'.$product['location'].'</b></h6>
                <h6>Car Type : <b>'.$product['car_type'].'</b></h6>
                <h6>Seat Capacity : <b>'.$product['car_seat_capacity'].'</b></h6>
				<h6>Transmission Type : <b>'.$product['car_transmission'].'</b></h6>
				</a>
                </div>
                </div>	
                </article>';
			}
		}
		return 	$productHTML;	
	}
}
?>