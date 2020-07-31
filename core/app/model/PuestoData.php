<?php
class PuestoData {
	public static $tablename = "puesto";



	public function PuestoData(){
		$this->name = "";
	}

	


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new PuestoData();
			$array[$cnt]->id = $r['id_puesto'];
			$array[$cnt]->puesto = $r['puesto'];
			$cnt++;
		}
		return $array;
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_puesto=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new PuestoData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id_puesto'];
			$data->puesto = $r['puesto'];
			$found = $data;
			break;
		}
		return $found;
	}


}

?>