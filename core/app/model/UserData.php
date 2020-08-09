<?php
class UserData {
	public static $tablename = "usuario";



	public function Userdata(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		
			$sql = "insert into usuario (nombre,apellidos,username,email,id_rol,password,creado) ";
			$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->email\",\"$this->rol_id\",\"$this->password\",$this->created_at)";
			Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objeto UserData previamente utilizamos el contexto
	
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->name\",email=\"$this->email\",username=\"$this->username\",apellidos=\"$this->lastname\",is_active=\"$this->is_active\",administrador=\"$this->is_admin\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}

	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where email=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}

/*
	public static function getAll(){
		$sql = "select usuario.id,usuario.nombre, usuario.apellidos, usuario.username, usuario.email, rol_usuario.rol ".self::$tablename." inner join rol_usuario on usuario.id_rol=rol_usuario.id_rol where id!=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

*/
public static function getAll(){
	$sql = "select usuario.id, usuario.nombre, usuario.apellidos, usuario.username, usuario.email, rol_usuario.rol from ".self::$tablename." inner join rol_usuario on usuario.id_rol=rol_usuario.id_rol where id!=1 order by id";
	$query = Executor::doit($sql);
	$array = array();
	$cnt = 0;
	while($r = $query[0]->fetch_array()){
		$array[$cnt] = new UserData();
		$array[$cnt]->id = $r['id'];
		$array[$cnt]->nombre = $r['nombre'];
		$array[$cnt]->apellidos = $r['apellidos'];
		$array[$cnt]->username = $r['username'];
		$array[$cnt]->email = $r['email'];
		$array[$cnt]->rol = $r['rol'];
		$cnt++;
	}
	return $array;
}

	public static function getAllAsesor(){
		$sql = "select * from ".self::$tablename." where id_rol=2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


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
	}

}

?>