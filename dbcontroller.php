<?php
class DBController
{
    public $mConnector;
    function __construct($conn)
    {
        $this->mConnector = $conn;
    }
    
    public function getAllTCars()
    {
        $sql = "select * from t_car_base";
        $statement = $this->mConnector->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    public function getAllMCommon(){
		$sql = "select data_type,data_cd,value1 from m_common";
		$statement = $this->mConnector->prepare($sql);
		$statement->execute();
		$result=$statement->fetchAll();

		$m_common=array();
		foreach ($result as $value) {
			$m_common[$value["data_type"]][$value["data_cd"]]=$value["value1"];
		}
		return $m_common;
	}
}
