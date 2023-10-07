create table miembro(
    id integer not null auto_increment,
    nombres varchar(70) not null,
    apellidos varchar(70) not null,
    carnet varchar(10),
    celular varchar(10) not null,
    fecha_ingreso date not null,
    estado enum('activo','ausente'),
    primary key (id),
    unique (carnet)
)
create table parentesco(
    id integer not null auto_increment,
    miembro_id integer not null,
    parentesco_miembro_id integer not null,
    parentesco enum('padre','madre','hermano'),
    primary key (id,miembro_id),
    FOREIGN KEY(miembro_id) references miembro(id),
    FOREIGN KEY(parentesco_miembro_id) references miembro(id)
)

create table vistante(
    id integer not null auto_increment ,
    nombre_completo varchar(100) not null,
    celular varchar(10),
    motivo varchar(150),
    miembro_id integer,
    primary key (id),
    FOREIGN KEY(miembro_id) references miembro(id)
)

create table actividad(
    id integer not null auto_increment,
    nombre varchar(30) not null,
    descripcion varchar(100),
    primary key (id),
    unique(nombre)
)

create table ofrenda(
    id integer not null auto_increment,
    monto_total integer not null,
    fecha datetime not null,
    miembro_id integer not null,
    actividad_id integer not null,
    primary key (id),
    FOREIGN KEY(miembro_id) references miembro(id),
    FOREIGN KEY(actividad_id) references actividad(id)
)

create table cargo(
    id integer not null auto_increment,
    nombre varchar(30) not null,
    descripcion varchar(100),
    primary key (id),
    unique(nombre)
)

create table evento(
    id integer not null auto_increment,
    nombre varchar(30) not null,
    fecha_programada datetime not null,
    detalle varchar(100) not null,
    primary key (id)
)
create table organizacion(
    id integer not null auto_increment,
    id_actividad integer not null,
    miembro_id integer not null,
    cargo_id integer not null,
    fecha datetime not null,
    evento_id integer not null,
    estado enum('activo','finalizado','cancelado'),
    primary key (id,miembro_id),
    FOREIGN KEY(cargo_id) references cargo(id),
    FOREIGN KEY(miembro_id) references miembro(id),
    FOREIGN KEY(evento_id) references evento(id)
)
