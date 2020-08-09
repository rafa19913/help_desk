<?php
class PeticionData {
    public static $tablename = "peticion";


	public function PeticionData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

    
	
	
/*
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

*/
	public static function getById($id){
		$sql = "select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion, usuarioA.nombre as nombre, usuarioA.apellidos as apellidos, usuarioA.email as email, usuarioB.id as id_asesor, usuarioB.nombre as nombre_asesor, usuarioB.apellidos as apellidos_asesor, estado_solicitud.id_estadosolicitud as id_estado, estado_solicitud.estado as estado, peticion.detalles_asesor from ".self::$tablename." inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema inner join usuario as usuarioA on peticion.id_cliente=usuarioA.id inner join usuario as usuarioB on peticion.id_asesor=usuarioB.id inner join estado_solicitud on peticion.id_estadosolicitud=estado_solicitud.id_estadosolicitud where id_peticion=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new PeticionData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id_peticion'];
			$data->problema = $r['problema'];
			$data->tipo = $r['tipo'];
			$data->descripcion = $r['descripcion'];
			$data->fecha_creacion = $r['fecha_creacion'];
			$data->nombre = $r['nombre'];
			$data->apellidos = $r['apellidos'];
			$data->email = $r['email'];
			$data->id_asesor = $r['id_asesor'];
			$data->nombre_asesor = $r['nombre_asesor'];
			$data->apellidos_asesor = $r['apellidos_asesor'];
			$data->id_estado = $r['id_estado'];
			$data->estado = $r['estado'];
			$data->detalles_asesor = $r['detalles_asesor'];
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

public function add(){
	$sql = "insert into peticion (problema,id_tipo_problema,descripcion,id_cliente,id_asesor,id_estadosolicitud) ";
	$sql .= "value (\"$this->problema\",$this->tipo_problema,\"$this->descripcion\",$this->id,$this->id_asesor,$this->id_estado)";
	Executor::doit($sql);
}

public function updateAsesor(){
	$sql = "update ".self::$tablename." set id_asesor=\"$this->id_asesor\" where id_peticion=$this->id";
	Executor::doit($sql);
}

public function updateDetalles(){
	$sql = "update ".self::$tablename." set detalles_asesor=\"$this->detalles\",id_estadosolicitud=\"$this->id_estado\" where id_peticion=$this->id";
	Executor::doit($sql);
}

public function updateEstado(){
	$sql = "update ".self::$tablename." set id_estadosolicitud=\"$this->id_estado\" where id_peticion=$this->id";
	Executor::doit($sql);
}

public function addAsesor(){
	$sql = "insert into peticion (id_asesor) ";
	$sql .= "value ($this->id_asesor)";
	Executor::doit($sql);
}


public static function getAllAdmin(){


	$sql = "select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion from ".self::$tablename." inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema order by fecha_creacion";
	$query = Executor::doit($sql);
	$array = array();
	$cnt = 0;
	while($r = $query[0]->fetch_array()){
		$array[$cnt] = new RolData();
		$array[$cnt]->id = $r['id_peticion'];
		$array[$cnt]->problema = $r['problema'];
		$array[$cnt]->tipo = $r['tipo'];
		$array[$cnt]->descripcion = $r['descripcion'];
		$array[$cnt]->fecha = $r['fecha_creacion'];
		
		$cnt++;
	}
	return $array;
}



	public static function getAll($usuario){


		$sql = "select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion, usuario.nombre as nombre, usuario.apellidos as apellidos, estado_solicitud.id_estadosolicitud as id_estadosolicitud, estado_solicitud.estado as estado from ".self::$tablename." inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema inner join usuario on peticion.id_asesor=usuario.id inner join estado_solicitud on peticion.id_estadosolicitud=estado_solicitud.id_estadosolicitud where id_cliente='$usuario' order by id_peticion";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new RolData();
			$array[$cnt]->id = $r['id_peticion'];
            $array[$cnt]->problema = $r['problema'];
            $array[$cnt]->tipo = $r['tipo'];
            $array[$cnt]->descripcion = $r['descripcion'];
			$array[$cnt]->fecha = $r['fecha_creacion'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellidos = $r['apellidos'];
			$array[$cnt]->id_estadosolicitud = $r['id_estadosolicitud'];
			$array[$cnt]->estado = $r['estado'];
            
            $cnt++;
		}
		return $array;
	}


	public static function getAllAsesor($usuario){


		$sql = "select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion, usuario.nombre as nombre, usuario.apellidos as apellidos, estado_solicitud.id_estadosolicitud as id_estadosolicitud, estado_solicitud.estado as estado from ".self::$tablename." inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema inner join usuario on peticion.id_asesor=usuario.id inner join estado_solicitud on peticion.id_estadosolicitud=estado_solicitud.id_estadosolicitud where id_asesor='$usuario' order by id_peticion";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new RolData();
			$array[$cnt]->id = $r['id_peticion'];
            $array[$cnt]->problema = $r['problema'];
            $array[$cnt]->tipo = $r['tipo'];
            $array[$cnt]->descripcion = $r['descripcion'];
			$array[$cnt]->fecha = $r['fecha_creacion'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellidos = $r['apellidos'];
			$array[$cnt]->id_estadosolicitud = $r['id_estadosolicitud'];
			$array[$cnt]->estado = $r['estado'];
            
            $cnt++;
		}
		return $array;
	}


	public static function getAllPendientes(){


		$sql = "select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion from ".self::$tablename." inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema where id_asesor = 1 order by fecha_creacion";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new RolData();
			$array[$cnt]->id = $r['id_peticion'];
            $array[$cnt]->problema = $r['problema'];
            $array[$cnt]->tipo = $r['tipo'];
            $array[$cnt]->descripcion = $r['descripcion'];
            $array[$cnt]->fecha = $r['fecha_creacion'];
            
            $cnt++;
		}
		return $array;
	}


	public static function getAllAsignadas(){


		$sql = "select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion, usuario.nombre as nombre, usuario.apellidos as apellidos, estado_solicitud.id_estadosolicitud as id_estadosolicitud, estado_solicitud.estado as estado from ".self::$tablename." inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema inner join usuario on peticion.id_asesor=usuario.id inner join estado_solicitud on peticion.id_estadosolicitud=estado_solicitud.id_estadosolicitud where id_asesor != 1 order by fecha_creacion";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new RolData();
			$array[$cnt]->id = $r['id_peticion'];
            $array[$cnt]->problema = $r['problema'];
            $array[$cnt]->tipo = $r['tipo'];
            $array[$cnt]->descripcion = $r['descripcion'];
			$array[$cnt]->fecha = $r['fecha_creacion'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellidos = $r['apellidos'];
			$array[$cnt]->id_estadosolicitud = $r['id_estadosolicitud'];
			$array[$cnt]->estado = $r['estado'];
            
            $cnt++;
		}
		return $array;
	}

/*
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

*/

}

?>