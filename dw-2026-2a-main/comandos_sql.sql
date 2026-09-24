INSERT INTO usuario (nome, apelido, email, senha, foto) VALUES
("Fulano Dital", "fulano", "fulano@teste.com", "123123", "foto");

INSERT INTO usuario (nome, apelido, email, senha, foto) VALUES
("Ciclano", "ciclano", "ciclano@teste.com", "321321", "usuario.png");

INSERT INTO postagem (texto, idusuario) VALUES ("Olá mundo!", 1);
INSERT INTO postagem (texto, idusuario) VALUES ("Outro texto", 1);

SELECT * FROM usuario; 
SELECT * FROM postagem;
SELECT * FROM comentario;

INSERT INTO comentario (idusuario, idpostagem, texto) VALUES (2, 2, "Muito bom");
INSERT INTO comentario (idusuario, idpostagem, texto) VALUES (1, 2, "Muito obrigado");