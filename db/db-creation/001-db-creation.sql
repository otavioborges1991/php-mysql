-- Active: 1758661370891@@127.0.0.1@3306@bd_games
CREATE DATABASE IF NOT EXISTS bd_games DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use bd_games;
CREATE TABLE IF NOT EXISTS usuários (
    usuário VARCHAR(10) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    senha VARCHAR(60) NOT NULL,
    tipo VARCHAR(10) NOT NULL DEFAULT 'editor',
    PRIMARY KEY (usuário)
) engine=InnoDB DEFAULT charset=utf8;
CREATE TABLE IF NOT EXISTS generos (
    cod INT(11) NOT NULL AUTO_INCREMENT,
    genero VARCHAR(20) NOT NULL,
    PRIMARY KEY (cod)
) engine=InnoDB DEFAULT charset=utf8;
CREATE TABLE IF NOT EXISTS produtoras (
    cod INT(11) NOT NULL AUTO_INCREMENT,
    produtora VARCHAR(50) NOT NULL,
    pais VARCHAR(30) NOT NULL,
    PRIMARY KEY (cod)
) engine=InnoDB DEFAULT charset=utf8;
CREATE TABLE IF NOT EXISTS jogos (
    cod INT(11) NOT NULL AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    genero INT(11) NOT NULL,
    produtora INT(11) NOT NULL,
    descricao TEXT NOT NULL,
    nota DECIMAL(4, 2) NOT NULL,
    capa VARCHAR(100) NOT NULL,
    PRIMARY KEY (cod),
    Foreign Key (genero) REFERENCES generos(cod),
    Foreign Key (produtora) REFERENCES produtoras(cod)
) engine=InnoDB DEFAULT charset=utf8;