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

insert into usuario(nombre,apellidos,email,password,is_active,id_rol,creado)
value ("Administrador","","admin","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,1,NOW());

insert into usuario(nombre,apellidos,email,password,is_active,id_rol,creado)
value ("tecnico","","tecnico","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,2,NOW());

insert into usuario(nombre,apellidos,email,password,is_active,id_rol,creado)
value ("cliente","","cliente","90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad",1,3,NOW());


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
