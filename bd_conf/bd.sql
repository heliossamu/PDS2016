--usuario: getmedicine
--senha: getmedicine


create database getmedicine;

use getmedicine;

create table pessoa (
    pessoaid serial primary key,
    facebookid varchar(100),
    lat int,
    lng int
);


create table remedio(
    remedioid serial integer primary key,
    pessoaid integer references pessoa(pessoaid),
    nome varchar(80),
    datavalidade varchar(20),
    sintomas varchar(80)
);

