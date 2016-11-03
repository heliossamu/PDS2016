--usuario: getmedicine
--senha: getmedicine


create database getmedicine;

use getmedicine;

create table pessoa(
	pessoaid integer not null auto_increment,
    facebookid integer not null, 
    reportstatus integer,
    totalvendas integer,
    
    primary key(pessoaid)
);


create table remedio(
    remedioid integer not null auto_increment,
    pessoaid integer,
    
    nome varchar(80),
    datavalidade varchar(20),
    sintomas varchar(80),
    coordx varchar(30),
    coordy varchar(30),
        
    foreign key(pessoaid) references pessoa(pessoaid),
    primary key(remedioid)
);


insert into pessoa values(1, 1, 0, 0)
