CREATE TABLE categoria (
	id SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(50) NOT NULL,
	descricao TEXT 
);

CREATE TABLE indicacao (
	id SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(50) NOT NULL
);

CREATE TABLE produto (
	id SERIAL NOT NULL PRIMARY KEY,
	nome VARCHAR(50),
	descricao TEXT,
	id_categoria INTEGER REFERENCES categoria(id)
);

CREATE TABLE produto_indicacao (
	id_indicacao INTEGER REFERENCES indicacao(id),
	id_produto INTEGER REFERENCES produto(id)
);

CREATE TABLE usuarios (
	id SERIAL NOT NULL PRIMARY KEY,
	usuario VARCHAR(32),
	senha VARCHAR(32)
);

CREATE TABLE informacoes (
	id SERIAL NOT NULL PRIMARY KEY,
	titulo_historia VARCHAR(100),
	texto_historia TEXT
);

INSERT INTO usuarios VALUES (DEFAULT, 'admin', 'a0df75a1872e12557f01b5670b3a9550');