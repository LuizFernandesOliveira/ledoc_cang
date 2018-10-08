CREATE TABLE ledoc_docente (
  id     smallint   not null auto_increment primary key,
  nome             varchar(100) not null,
  email varchar(40) not null
);


create table ledoc_usuario (
  matricula varchar(14) not null primary key,
  nome      varchar(50) not null,
  email     varchar(40) not null,
  senha     varchar(20) not null,
  resenha   varchar(20) not null,
  adm       varchar (3) not null
);
INSERT into ledoc_usuario(matricula, nome, email, senha, resenha, adm)value ('1234567', '','','','', 'sim');
INSERT into ledoc_usuario(matricula, nome, email, senha, resenha, adm)value ('1234568', '','','','', 'nao');
INSERT into ledoc_usuario(matricula, nome, email, senha, resenha, adm)value ('1234569', '','','','', 'nao');

create table ledoc_comunica (
  id int(7) not null auto_increment primary key,
  matricula varchar (14) not null,
  titulo  varchar(500) not null,
  imagem  varchar(200),
  texto  varchar(40000),
  data_p date
);

create table ledoc_postagem (
  codigo int(11) not null primary key,
  titulo  varchar(500) not null,
  imagem  varchar(200),
  video varchar (500),
  documento varchar (500),
  data date
);

create table ledoc_projeto_participante (
  id int(11) not null primary key,
  nome varchar (40),
  periodo_referencia int(4)
);

create table ledoc_projeto (
  codigo int(11) not null primary key,
  titulo  varchar(500) not null,
  resumo varchar (500),
  documento varchar (500),
  data_inicio date,
  data_fim date,
  participantes int
);

