<?php
class PersonalData {
	public static $tablename = "personal";



	public function PersonalData(){
		$this->name = "";
        $this->lastname = "";
        $this->fecha_nac = "";
        $this->id_puesto = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		
			$sql = "insert into personal (nombre,apellidos,fecha_nacimiento,id_puesto) ";
			$sql .= "value (\"$this->name\",\"$this->apellidos\",'$this->fecha_nac',$this->id_puesto)";
			Executor::doit($sql);
	}
    /*
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_personal=$id";
		Executor::doit($sql);
    }
    
*/
	public function del(){
		$sql = "delete from ".self::$tablename." where id_personal=$this->id_personal";
		Executor::doit($sql);
	}
/*
// partiendo de que ya tenemos creado un objeto UserData previamente utilizamos el contexto
	
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->name\",email=\"$this->email\",username=\"$this->username\",apellidos=\"$this->lastname\",is_active=\"$this->is_active\",administrador=\"$this->is_admin\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

*/
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_personal=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PersonalData());

	}
/*
	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where email=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}
*/

	public static function getAll(){
		$sql = "select personal.id_personal,personal.nombre,personal.apellidos,personal.fecha_nacimiento,puesto.puesto,puesto.sueldo from ".self::$tablename." inner join puesto on personal.id_puesto=puesto.id_puesto;";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PersonalData());
	}
/*

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());

	}


	public static function getByUser($usuario,$email){
		$sql = "select * from ".self::$tablename." where username = '$usuario' || email='$email'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->username = $r['username'];
			$array[$cnt]->email = $r['email'];
			$cnt++;
		}
		return $array;
	}*/

}

?>