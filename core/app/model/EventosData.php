<?php
class EventosData {
	public static $tablename = "evento";



	public function EventosData(){
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
		
			$sql = "insert into evento (nombre,apellidos) ";
			$sql .= "value (\"$this->name\",\"$this->apellidos\")";
			Executor::doit($sql);
	}
    /*
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_personal=$id";
		Executor::doit($sql);
    }
    
*/
	public function del(){
		$sql = "delete from ".self::$tablename." where id_evento=$this->id_evento";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objeto UserData previamente utilizamos el contexto
	
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->name\",apellidos=\"$this->lastname\" where id_organizador=$this->id_organizador";
		Executor::doit($sql);
	}
/*
	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

*/
	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_evento=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EventosData());

	}
/*
	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where email=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());

	}
*/

	public static function getAll(){
		$sql = "select evento.id_evento,evento.nombre,evento.descripcion,evento.fecha,evento.precio_entrada,organizadores.nombre as organizador,artista.nombre_artistico from evento inner join organizadores on evento.id_organizador=organizadores.id_organizador inner join artista on evento.id_artista=artista.id_artista;";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventosData());
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