create database if not exists mercado_marcio_rodrigo;
use mercado_marcio_rodrigo;

create table categoria(
 id_cat int auto_increment not null primary key,
 nome_cat varchar(16) not null
);

create table produtos(
 id_prod int auto_increment not null primary key,
 nome_prod varchar(32) not null,
 tb_produtos_preco decimal(10,2) not null
);

alter table produtos
add column id_cat integer not null;

alter table produtos
add constraint pk_categoria_fk_produtos
foreign key (id_cat)
references categoria(id_cat);

insert into categoria(nome_cat) values ('Tecnologia'); 
insert into categoria(nome_cat) values ('Doces'); 
insert into categoria(nome_cat) values ('Salgados');

insert into produtos (nome_prod, id_cat, tb_produtos_preco) values 
('bateria','1' , '20.00'),
('brigadeiro','2' , '5.00'),
('beijinho', '2', '5.00'),
('chuveiro', '1', '6.00'),
('coxinha', '3', '7.00'),
('joelho', '3', '4.00');