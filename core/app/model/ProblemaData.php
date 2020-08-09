<?php
class ProblemaData {
	public static $tablename = "tipo_problema";



	public function ProblemaData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id_tipo_problema";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProblemaData();
			$array[$cnt]->id = $r['id_tipo_problema'];
			$array[$cnt]->problema = $r['problema'];
			$cnt++;
		}
		return $array;
    }
    
    public function add(){
		$sql = "insert into tipo_problema(problema) ";
		$sql .= "value (\"$this->name\")";
		Executor::doit($sql);
    }
    
    public static function getByName($nombre){
		$sql = "select * from ".self::$tablename." where problema = '$nombre'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ProblemaData();
			$array[$cnt]->id = $r['id_tipo_problema'];
			$array[$cnt]->name = $r['problema'];
			$cnt++;
		}
		return $array;
    }
    
    public function del(){
		$sql = "delete from ".self::$tablename." where id_tipo_problema=$this->id";
		Executor::doit($sql);
    }
    
    public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_tipo_problema=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ProblemaData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id_tipo_problema'];
			$data->name = $r['problema'];
			$found = $data;
			break;
		}
		return $found;
	}

	public function update(){
		$sql = "update ".self::$tablename." set problema=\"$this->name\" where id_tipo_problema=$this->id";
		Executor::doit($sql);
	}


}

?>