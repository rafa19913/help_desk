<?php
class AulaData {
	public static $tablename = "aula";



	public function AulaData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into aula (nombre,creado) ";
		$sql .= "value (\"$this->name\",$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_aula=$id_aula";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_aula=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objeto AulaData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->name\" where id_aula=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_aula=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new AulaData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id_aula'];
			$data->name = $r['nombre'];
			$data->created_at = $r['creado'];
			$found = $data;
			break;
		}
		return $found;
	}
/*
	public static function getByName($name){
		$sql = "select nombre from ".self::$tablename." where nombre='$name'";
		$query = Executor::doit($sql);
		$found = null;
		$data = new AulaData();
		while($r = $query[0]->fetch_array()){
			$data->name = $r['nombre'];
			$found = $data;
			break;
		}
		return $found;
	}
*/

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by nombre";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new AulaData();
			$array[$cnt]->id = $r['id_aula'];
			$array[$cnt]->name = $r['nombre'];
			$array[$cnt]->created_at = $r['creado'];
			$cnt++;
		}
		return $array;
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new AulaData();
			$array[$cnt]->id = $r['id_aula'];
			$array[$cnt]->name = $r['nombre'];
			$array[$cnt]->created_at = $r['creado'];
			$cnt++;
		}
		return $array;
	}


public static function getByName($nombre){
		$sql = "select * from ".self::$tablename." where nombre = '$nombre'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new AulaData();
			$array[$cnt]->id = $r['id_aula'];
			$array[$cnt]->name = $r['nombre'];
			$array[$cnt]->created_at = $r['creado'];
			$cnt++;
		}
		return $array;
	}



}

?>