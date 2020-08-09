create database helpdesk;
use helpdesk;
set sql_mode='';

create table rol_usuario(
id_rol int not null auto_increment primary key,
rol varchar(20)
);

insert into rol_usuario(rol)
value ("Administrador"),
("Tecnico"),
("Cliente");


create table usuario(
id int not null auto_increment primary key,
nombre varchar(50),
apellidos varchar(50),
username varchar(50),
email varchar(50),
password varchar(50),
is_active boolean not null default 1,
id_rol int not null,
creado datetime,

foreign key (id_rol) references rol_usuario(id_rol)
);

insert into usuario(nombre,apellidos,is_active,id_rol,creado)
value ("Sin","asignar",1,1,NOW());

insert into usuario(nombre,apellidos,email,password,is_active,id_rol,creado)
value ("Administrador","","admin","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,1,NOW());

insert into usuario(nombre,apellidos,email,password,is_active,id_rol,creado)
value ("tecnico","","tecnico","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,2,NOW());

insert into usuario(nombre,apellidos,email,password,is_active,id_rol,creado)
value ("cliente","","cliente","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,3,NOW());

insert into usuario(nombre,apellidos,email,username,password,is_active,id_rol,creado)
value ("Osiel","De La Fuente","osiel@gmail.com","osiel","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,3,NOW());

insert into usuario(nombre,apellidos,email,username,password,is_active,id_rol,creado)
value ("Rafael","Perez","rafael@gmail.com","rafael","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,3,NOW());

create table tipo_problema(
id_tipo_problema int not null auto_increment primary key,
problema varchar(35)
);

insert into tipo_problema(problema)
value ("Software"), ("Hardware"),("No tengo idea");


create table peticion(
id_peticion int not null auto_increment primary key,
problema varchar(50),
id_tipo_problema int,
descripcion text,
id_cliente int,
id_asesor int,
fecha_creacion timestamp,

foreign key (id_tipo_problema) references tipo_problema(id_tipo_problema),
foreign key (id_cliente) references usuario(id),
foreign key (id_asesor) references usuario(id)
);

insert into peticion(problema,id_tipo_problema,descripcion,id_cliente,fecha_creacion,id_asesor)
value ("Pc no enciende",2,"La computadora esta bien muerta",4,'2020-08-04 22:32:34',1),
("Pc trabada",1,"No hace nada la mugre",4,'2020-08-04 22:45:01',1),
("La computadora esta muy lenta",1,"Tarda mucho en arrancar esta mugre",4,'2020-08-04 22:47:41',1),
("Chrome no abre",1,"El navegador google chrome no se ejecuta",5,'2020-08-04 22:48:27',1),
("Pc hace ruidos extraños",3,"La computadora la enciendo y comienza a pillar algo dentro de ella",5,'2020-08-04 22:49:47',1),
("Computadora se apaga",3,"Estoy trabajando de manera normal con el equipo y de la nada se apaga",6,'2020-08-04 22:50:54',1);


select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion,
usuario.nombre as nombre, usuario.apellidos as apellidos, usuario.email as email,
usuario.id.nombre
from peticion
inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema
inner join usuario as usuario on peticion.id_cliente=usuario.id
inner join usuario on peticion.id_asesor=usuario.id
where id_peticion=5;


select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion,
usuarioA.nombre as nombre, usuarioA.apellidos as apellidos, usuarioA.email as email,
usuarioB.nombre as nombre_asesor, usuarioB.apellidos as apellidos_asesor
from peticion
inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema
inner join usuario as usuarioA on peticion.id_cliente=usuarioA.id
inner join usuario as usuarioB on peticion.id_asesor=usuarioB.id
where id_peticion=5;


/*
select peticion.id_peticion, peticion.problema, tipo_problema.problema as problema, peticion.descripcion, peticion.fecha_creacion
from peticion
inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema;


select * from peticion where id_asesor is null;


select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion, usuario.nombre, usuario.apellidos
from peticion
inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema
inner join usuario on peticion.id_asesor=usuario.id
where id_asesor is not null order by fecha_creacion;



select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion, usuario.nombre, usuario.apellidos
from peticion
inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema
inner join usuario on peticion.id_asesor=usuario.id
where id_cliente=3 order by fecha_creacion;


select peticion.id_peticion, peticion.problema, tipo_problema.problema as tipo, peticion.descripcion, peticion.fecha_creacion, usuario.nombre as nombre, usuario.apellidos as apellidos
from peticion
inner join tipo_problema on peticion.id_tipo_problema=tipo_problema.id_tipo_problema
inner join usuario on peticion.id_asesor=usuario.id
where id_cliente=3 order by fecha_creacion;
*/