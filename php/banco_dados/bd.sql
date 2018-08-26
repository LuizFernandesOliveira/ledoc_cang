/* CRIAR BANCO COM A CODIFICAÇÃO utf8_general_ci */

/*=============  ledoc_cang ===============*/

/* ================ Usuarios ================= */
CREATE TABLE ledoc_integrante_categoria(
  id smallint auto_increment primary key,
  categoria varchar(40)
);
INSERT into ledoc_integrante_categoria(categoria)value ('Aluno');
INSERT into ledoc_integrante_categoria(categoria)value ('Professor');
INSERT into ledoc_integrante_categoria(categoria)value ('Coordenador');

CREATE TABLE ledoc_habilitacao(
  id smallint auto_increment primary key,
  categoria varchar(40)
);
INSERT into ledoc_habilitacao(categoria)value ('Matemática');
INSERT into ledoc_habilitacao(categoria)value ('Ciências Humanas e Sociais');

CREATE TABLE ledoc_integrante (
  id     smallint   not null auto_increment primary key,
  nome             varchar(100) not null,
  email varchar(40) not null,
  ano            int(4) not null,
  id_habilitacao     smallint,
  id_categoria smallint,
  foreign key (id_habilitacao) references ledoc_habilitacao(id),
  foreign key (id_categoria) references ledoc_integrante_categoria(id)
);

create table ledoc_usuario (
  matricula            varchar(14) not null primary key,
  nome                 varchar(50) not null,
  email                varchar(40) not null,
  senha                  varchar(20) not null,
  re_senha                varchar(20) not null,
  turma varchar(4),
  usuario_categoria varchar (11)
);
INSERT into ledoc_usuario(matricula, nome, email, senha, re_senha, turma, usuario_categoria)value ('1234567', '','','','', NULL , NULL );

create table ledoc_postagem (
  id int(7) not null primary key,
  num_matricula varchar (14) not null,
  titulo  varchar(500) not null,
  imagem  varchar(200),
  texto  varchar(40000),
  data datetime
);






