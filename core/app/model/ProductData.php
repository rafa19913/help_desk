<?php 
class ProductData {
	public static $tablename = "inventario";

	public function ProductData(){
		$this->name = "";
		$this->serie = "";
		$this->category_id = "";
		$this->aula_id = "";
		$this->estado_id = "";
		$this->description = "";
	}

	public function getCategory(){ return CategoryData::getById($this->categoria_id);}
	public function getAula(){ return AulaData::getById($this->aula_id);}
	public function getEstado(){ return EstadoData::getById($this->estado_id);}


	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,serie,categoria_id,aula_id,estado_id,descripcion) ";
		$sql .= "value (\"$this->name\",\"$this->serie\",\"$this->category_id\",\"$this->aula_id\",\"$this->estado_id\",\"$this->description\")";
		return Executor::doit($sql);
	}


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id_inventario=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id_inventario=$this->id_inventario";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->name\",serie=\"$this->serie\",categoria_id=\"$this->category_id\",aula_id=\"$this->aula_id\",estado_id=\"$this->estado_id\",descripcion=\"$this->description\" where id_inventario=$this->id_inventario";
		Executor::doit($sql);
	}


	public function del_category(){
		$sql = "update ".self::$tablename." set categoria_id=NULL where id_inventario=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id_inventario=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductData());

	}

	public static function getByIdAllData($id){
		$sql = "select inventario.id_inventario,inventario.nombre,inventario.descripcion,inventario.serie,categoria.nombre as categoria,aula.nombre as aula,estado.estado as estado from ".self::$tablename." inner join categoria
on inventario.categoria_id=categoria.id_categoria inner join aula on inventario.aula_id=aula.id_aula inner join estado on inventario.estado_id=estado.id_estado where id_inventario=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id_inventario>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where id_inventario like '%$p%' or nombre like '%$p%' or serie like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id order by creado desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getAllByCategoryId($category_id){
		$sql = "select * from ".self::$tablename." where categoria_id=$category_id order by creado desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}







}

?>