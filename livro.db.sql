
CREATE TABLE IF NOT EXISTS estado (
	id	integer NOT NULL,
	sigla	char(2),
	nome	text,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS cidade (
	id	integer NOT NULL,
	nome	text,
	id_estado	INTEGER,
	FOREIGN KEY(id_estado) REFERENCES estado(id),
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS grupo (
	id	integer NOT NULL,
	nome	text,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS fabricante (
	id	integer NOT NULL,
	nome	text,
	site	text,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS unidade (
	id	integer NOT NULL,
	sigla	text,
	nome	text,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS tipo (
	id	integer NOT NULL,
	nome	text,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS produto (
	id	integer NOT NULL,
	descricao	text,
	estoque	float,
	preco_custo	float,
	preco_venda	float,
	id_fabricante	integer,
	id_unidade	integer,
	id_tipo	integer,
	FOREIGN KEY(id_fabricante) REFERENCES fabricante(id),
	FOREIGN KEY(id_unidade) REFERENCES unidade(id),
	FOREIGN KEY(id_tipo) REFERENCES tipo(id),
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS conta (
	id	integer NOT NULL,
	id_cliente	INTEGER,
	dt_emissao	date,
	dt_vencimento	date,
	valor	float,
	paga	char(1),
	FOREIGN KEY(id_cliente) REFERENCES pessoa(id),
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS funcionario (
	id	integer NOT NULL,
	nome	TEXT,
	endereco	TEXT,
	email	TEXT,
	departamento	INTEGER,
	idiomas	TEXT,
	contratacao	INTEGER,
	PRIMARY KEY(id)
);
CREATE TABLE IF NOT EXISTS pessoa (
	id	integer NOT NULL,
	nome	text,
	endereco	text,
	bairro	text,
	telefone	text,
	email	text,
	id_cidade	integer,
	FOREIGN KEY(id_cidade) REFERENCES cidade(id),
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS venda (
	id	integer NOT NULL,
	id_cliente	integer,
	data_venda	date,
	desconto	float,
	acrescimos	float,
	valor_final	float,
	obs	text,
	FOREIGN KEY(id_cliente) REFERENCES pessoa(id),
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS item_venda (
	id	integer NOT NULL,
	id_produto	integer,
	id_venda	integer,
	quantidade	float,
	preco	float,
	FOREIGN KEY(id_produto) REFERENCES produto(id),
	FOREIGN KEY(id_venda) REFERENCES venda(id),
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS pessoa_grupo (
	id	integer NOT NULL,
	id_pessoa	integer,
	id_grupo	integer,
	FOREIGN KEY(id_grupo) REFERENCES grupo(id),
	FOREIGN KEY(id_pessoa) REFERENCES pessoa(id),
	PRIMARY KEY(id)
);
INSERT INTO estado VALUES (1,'AC','Acre');
INSERT INTO estado VALUES (2,'AL','Alagoas');
INSERT INTO estado VALUES (3,'AP','Amap??');
INSERT INTO estado VALUES (4,'AM','Amazonas');
INSERT INTO estado VALUES (5,'BA','Bahia');
INSERT INTO estado VALUES (6,'CE','Cear??');
INSERT INTO estado VALUES (7,'DF','Distrito Federal');
INSERT INTO estado VALUES (8,'ES','Esp??rito Santo');
INSERT INTO estado VALUES (9,'GO','Goi??s');
INSERT INTO estado VALUES (10,'MA','Maranh??o');
INSERT INTO estado VALUES (11,'MT','Mato Grosso');
INSERT INTO estado VALUES (12,'MS','Mato Grosso do Sul');
INSERT INTO estado VALUES (13,'MG','Minas Gerais');
INSERT INTO estado VALUES (14,'PA','Par??');
INSERT INTO estado VALUES (15,'PB','Para??ba');
INSERT INTO estado VALUES (16,'PR','Paran??');
INSERT INTO estado VALUES (17,'PE','Pernambuco');
INSERT INTO estado VALUES (18,'PI','Piau??');
INSERT INTO estado VALUES (19,'RJ','Rio de Janeiro');
INSERT INTO estado VALUES (20,'RN','Rio Grande do Norte');
INSERT INTO estado VALUES (21,'RS','Rio Grande do Sul');
INSERT INTO estado VALUES (22,'RO','Rond??nia');
INSERT INTO estado VALUES (23,'RR','Roraima');
INSERT INTO estado VALUES (24,'SC','Santa Catarina');
INSERT INTO estado VALUES (25,'SP','S??o Paulo');
INSERT INTO estado VALUES (26,'SE','Sergipe');
INSERT INTO estado VALUES (27,'TO','Tocantins');
INSERT INTO cidade VALUES (1,'Aracaj??',26);
INSERT INTO cidade VALUES (2,'Bel??m',14);
INSERT INTO cidade VALUES (3,'Belo Horizonte',13);
INSERT INTO cidade VALUES (4,'Boa Vista',23);
INSERT INTO cidade VALUES (5,'Bras??lia',7);
INSERT INTO cidade VALUES (6,'Campo Grande',12);
INSERT INTO cidade VALUES (7,'Cuiab??',11);
INSERT INTO cidade VALUES (8,'Curitiba',16);
INSERT INTO cidade VALUES (9,'Florian??polis',24);
INSERT INTO cidade VALUES (10,'Fortaleza',6);
INSERT INTO cidade VALUES (11,'Goi??nia',9);
INSERT INTO cidade VALUES (12,'Jo??o Pessoa',15);
INSERT INTO cidade VALUES (13,'Macap ',3);
INSERT INTO cidade VALUES (14,'Macei??',2);
INSERT INTO cidade VALUES (15,'Manaus',4);
INSERT INTO cidade VALUES (16,'Natal',20);
INSERT INTO cidade VALUES (17,'Palmas',27);
INSERT INTO cidade VALUES (18,'Porto Alegre',21);
INSERT INTO cidade VALUES (19,'Porto Velho',22);
INSERT INTO cidade VALUES (20,'Recife',17);
INSERT INTO cidade VALUES (21,'Rio Branco',1);
INSERT INTO cidade VALUES (22,'Rio de Janeiro',19);
INSERT INTO cidade VALUES (23,'Salvador',5);
INSERT INTO cidade VALUES (24,'S??o Luis',10);
INSERT INTO cidade VALUES (25,'S??o Paulo',25);
INSERT INTO cidade VALUES (26,'Teresina',18);
INSERT INTO cidade VALUES (27,'Vit??ria',8);
INSERT INTO grupo VALUES (1,'Cliente');
INSERT INTO grupo VALUES (2,'Fornecedor');
INSERT INTO grupo VALUES (3,'Revendedor');
INSERT INTO grupo VALUES (4,'Colaborador');
INSERT INTO fabricante VALUES (1,'Kingston','www.kingston.com');
INSERT INTO fabricante VALUES (2,'Seagate','www.seagate.com');
INSERT INTO fabricante VALUES (3,'Corsair','www.corsair.com');
INSERT INTO fabricante VALUES (4,'Olimpus','www.olimpus.com');
INSERT INTO fabricante VALUES (5,'Samsung','www.samsung.com');
INSERT INTO fabricante VALUES (6,'Sony','www.sony.com');
INSERT INTO fabricante VALUES (7,'Creative','www.creative.com');
INSERT INTO fabricante VALUES (8,'Intel','www.intel.com');
INSERT INTO fabricante VALUES (9,'HP','www.hp.com');
INSERT INTO fabricante VALUES (10,'Satellite','www.satellite.com');
INSERT INTO unidade VALUES (1,'cm','Cent??metro');
INSERT INTO unidade VALUES (2,'m','Metro');
INSERT INTO unidade VALUES (3,'cm2','Cent??metro quadrado');
INSERT INTO unidade VALUES (4,'m2','Metro quadrado');
INSERT INTO unidade VALUES (5,'cm3','Cent??metro c??bico');
INSERT INTO unidade VALUES (6,'m3','Metro c??bico');
INSERT INTO unidade VALUES (7,'Kg','Kilograma');
INSERT INTO unidade VALUES (8,'Gr','Grama');
INSERT INTO unidade VALUES (9,'L','Litro');
INSERT INTO unidade VALUES (10,'PC','Pe??a');
INSERT INTO unidade VALUES (11,'PCT','Pacote');
INSERT INTO unidade VALUES (12,'CX','Caixa');
INSERT INTO unidade VALUES (13,'SAC','Saco');
INSERT INTO unidade VALUES (14,'TON','Tonelada');
INSERT INTO unidade VALUES (15,'KIT','Kit');
INSERT INTO unidade VALUES (16,'GL','Gal??o');
INSERT INTO unidade VALUES (17,'FD','Fardo');
INSERT INTO unidade VALUES (18,'BL','Bloco');
INSERT INTO tipo VALUES (1,'M??quina');
INSERT INTO tipo VALUES (2,'Acess??rio');
INSERT INTO tipo VALUES (3,'Insumo');
INSERT INTO tipo VALUES (4,'Componente');
INSERT INTO tipo VALUES (5,'Suprimento');
INSERT INTO produto VALUES (1,'Pendrive 512Mb',10.0,20.0,40.0,1,10,2);
INSERT INTO produto VALUES (2,'HD 120 GB',20.0,100.0,180.0,2,10,4);
INSERT INTO produto VALUES (3,'SD CARD  512MB',4.0,20.0,35.0,3,10,2);
INSERT INTO produto VALUES (4,'SD CARD 1GB MINI',3.0,28.0,40.0,1,10,2);
INSERT INTO produto VALUES (5,'CAM. FOTO I70 PLATA',5.0,600.0,900.0,5,10,1);
INSERT INTO produto VALUES (6,'CAM. FOTO DSC-W50 PLATA',4.0,400.0,700.0,6,10,1);
INSERT INTO produto VALUES (7,'WEBCAM INSTANT VF0040SP',4.0,50.0,80.0,7,10,1);
INSERT INTO produto VALUES (8,'CPU 775 CEL.D 360  3.46 512K 533M',10.0,140.0,300.0,8,10,4);
INSERT INTO produto VALUES (9,'FILMADORA DCR-DVD108',2.0,900.0,1400.0,6,10,1);
INSERT INTO produto VALUES (10,'HD IDE  80G 7.200',8.0,90.0,160.0,5,10,4);
INSERT INTO produto VALUES (11,'IMP LASERJET 1018 USB 2.0',4.0,200.0,300.0,9,10,1);
INSERT INTO produto VALUES (12,'MEM DDR  512MB 400MHZ PC3200',10.0,60.0,100.0,5,10,4);
INSERT INTO produto VALUES (13,'MEM DDR2 1024MB 533MHZ PC4200',5.0,100.0,170.0,3,10,4);
INSERT INTO produto VALUES (14,'MON LCD 19 920N PRETO',2.0,500.0,800.0,5,10,4);
INSERT INTO produto VALUES (15,'MOUSE USB OMC90S OPT.C/LUZ',10.0,20.0,40.0,5,10,2);
INSERT INTO produto VALUES (16,'NB DV6108 CS 1.86/512/80/DVD+RW ',2.0,1400.0,2500.0,9,10,1);
INSERT INTO produto VALUES (17,'NB N220E/B DC 1.6/1/80/DVD+RW ',3.0,1800.0,3400.0,6,10,1);
INSERT INTO produto VALUES (18,'CAM. FOTO DSC-W90 PLATA',5.0,600.0,1200.0,6,10,1);
INSERT INTO produto VALUES (19,'CART. 8767 NEGRO',20.0,30.0,50.0,9,10,3);
INSERT INTO produto VALUES (20,'CD-R TUBO DE 100 52X 700MB',20.0,30.0,60.0,5,10,5);
INSERT INTO produto VALUES (21,'MEM DDR 1024MB 400MHZ PC3200',7.0,80.0,150.0,1,10,4);
INSERT INTO produto VALUES (22,'MOUSE PS2 A7 AZUL/PLATA',20.0,5.0,15.0,10,10,2);
INSERT INTO produto VALUES (23,'SPEAKER AS-5100 HOME PRATA',5.0,100.0,180.0,10,10,2);
INSERT INTO produto VALUES (24,'TEC. USB ABNT AK-806',14.0,20.0,40.0,10,10,2);
INSERT INTO item_venda VALUES (1,1,1,10.0,40.0);
INSERT INTO item_venda VALUES (2,2,2,2.0,180.0);
INSERT INTO item_venda VALUES (3,3,3,10.0,35.0);
INSERT INTO item_venda VALUES (4,4,4,10.0,40.0);
INSERT INTO item_venda VALUES (5,5,5,1.0,900.0);
INSERT INTO item_venda VALUES (6,6,6,1.0,700.0);
INSERT INTO item_venda VALUES (7,7,7,10.0,80.0);
INSERT INTO item_venda VALUES (8,8,8,2.0,300.0);
INSERT INTO item_venda VALUES (9,9,9,1.0,1400.0);
INSERT INTO item_venda VALUES (10,10,10,5.0,160.0);
INSERT INTO item_venda VALUES (11,11,11,4.0,300.0);
INSERT INTO item_venda VALUES (12,12,12,12.0,100.0);
INSERT INTO item_venda VALUES (13,3,13,2.0,35.0);
INSERT INTO item_venda VALUES (14,4,13,1.0,40.0);
INSERT INTO venda VALUES (1,1,'2018-01-10',800.0,40.0,NULL,360.0,NULL);
INSERT INTO venda VALUES (2,2,'2018-02-10',720.0,36.0,NULL,324.0,NULL);
INSERT INTO venda VALUES (3,3,'2018-03-10',700.0,35.0,NULL,315.0,NULL);
INSERT INTO venda VALUES (4,4,'2018-04-10',800.0,40.0,NULL,360.0,NULL);
INSERT INTO venda VALUES (5,5,'2018-05-10',1800.0,90.0,NULL,810.0,NULL);
INSERT INTO venda VALUES (6,6,'2018-06-10',1400.0,70.0,NULL,630.0,NULL);
INSERT INTO venda VALUES (7,7,'2018-07-10',1600.0,80.0,NULL,720.0,NULL);
INSERT INTO venda VALUES (8,8,'2018-08-10',1200.0,60.0,NULL,540.0,NULL);
INSERT INTO venda VALUES (9,9,'2018-09-10',2800.0,140.0,NULL,1260.0,NULL);
INSERT INTO venda VALUES (10,10,'2018-10-10',1600.0,80.0,NULL,720.0,NULL);
INSERT INTO venda VALUES (11,11,'2018-11-10',2400.0,120.0,NULL,1080.0,NULL);
INSERT INTO venda VALUES (12,12,'2018-12-10',2400.0,100.0,NULL,1100.0,NULL);
INSERT INTO venda VALUES (13,3,'2018-03-30',110.0,0.0,0.0,110.0,'obs');
INSERT INTO conta VALUES (1,1,'2018-03-10','2018-03-12',360.0,'N');
INSERT INTO conta VALUES (2,2,'2018-03-10','2018-03-12',324.0,'N');
INSERT INTO conta VALUES (3,3,'2018-03-10','2018-03-12',315.0,'N');
INSERT INTO conta VALUES (4,4,'2018-03-10','2018-03-12',360.0,'N');
INSERT INTO conta VALUES (5,5,'2018-03-10','2018-03-12',810.0,'N');
INSERT INTO conta VALUES (6,6,'2018-03-10','2018-03-12',630.0,'N');
INSERT INTO conta VALUES (7,7,'2018-03-10','2018-03-12',720.0,'N');
INSERT INTO conta VALUES (8,8,'2018-03-10','2018-03-12',540.0,'N');
INSERT INTO conta VALUES (9,9,'2018-03-10','2018-03-12',1260.0,'N');
INSERT INTO conta VALUES (10,10,'2018-03-10','2018-03-12',720.0,'N');
INSERT INTO conta VALUES (11,11,'2018-03-10','2018-03-12',1080.0,'N');
INSERT INTO conta VALUES (12,12,'2018-03-10','2018-03-12',1100.0,'N');
INSERT INTO pessoa VALUES (1,'Penelope Terry','Penelope Terry Street, 1','Centro','(88) 1234-5678','naoenvie@email.com',18);
INSERT INTO pessoa VALUES (2,'James White','James White Street, 2','Centro','(88) 1234-5678','naoenvie@email.com',3);
INSERT INTO pessoa VALUES (3,'Anne Walsh','Anne Walsh Street, 3','Centro','(88) 1234-5678','naoenvie@email.com',19);
INSERT INTO pessoa VALUES (4,'Oliver Dowd','Oliver Dowd Street, 4','Centro','(88) 1234-5678','naoenvie@email.com',23);
INSERT INTO pessoa VALUES (5,'Lily Sutherland','Lily Sutherland Street, 5','Centro','(88) 1234-5678','naoenvie@email.com',26);
INSERT INTO pessoa VALUES (6,'Lily Oliver','Lily Oliver Street, 6','Centro','(88) 1234-5678','naoenvie@email.com',10);
INSERT INTO pessoa VALUES (7,'Amelia Thomson','Amelia Thomson Street, 7','Centro','(88) 1234-5678','naoenvie@email.com',4);
INSERT INTO pessoa VALUES (8,'Lily Pullman','Lily Pullman Street, 8','Centro','(88) 1234-5678','naoenvie@email.com',8);
INSERT INTO pessoa VALUES (9,'Justin Edmunds','Justin Edmunds Street, 9','Centro','(88) 1234-5678','naoenvie@email.com',25);
INSERT INTO pessoa VALUES (10,'Julia Turner','Julia Turner Street, 10','Centro','(88) 1234-5678','naoenvie@email.com',12);
INSERT INTO pessoa VALUES (11,'Julia White','Julia White Street, 11','Centro','(88) 1234-5678','naoenvie@email.com',1);
INSERT INTO pessoa VALUES (12,'Isaac Morrison','Isaac Morrison Street, 12','Centro','(88) 1234-5678','naoenvie@email.com',20);
INSERT INTO pessoa VALUES (13,'Frank Wallace','Frank Wallace Street, 13','Centro','(88) 1234-5678','naoenvie@email.com',21);
INSERT INTO pessoa VALUES (14,'Phil Ogden','Phil Ogden Street, 14','Centro','(88) 1234-5678','naoenvie@email.com',9);
INSERT INTO pessoa VALUES (15,'Gordon Murray','Gordon Murray Street, 15','Centro','(88) 1234-5678','naoenvie@email.com',22);
INSERT INTO pessoa VALUES (16,'Caroline Churchill','Caroline Churchill Street, 16','Centro','(88) 1234-5678','naoenvie@email.com',23);
INSERT INTO pessoa VALUES (17,'Sally Glover','Sally Glover Street, 17','Centro','(88) 1234-5678','naoenvie@email.com',6);
INSERT INTO pessoa VALUES (18,'Christopher Brown','Christopher Brown Street, 18','Centro','(88) 1234-5678','naoenvie@email.com',21);
INSERT INTO pessoa VALUES (19,'Owen Stewart','Owen Stewart Street, 19','Centro','(88) 1234-5678','naoenvie@email.com',22);
INSERT INTO pessoa VALUES (20,'Robert Peters','Robert Peters Street, 20','Centro','(88) 1234-5678','naoenvie@email.com',20);
INSERT INTO pessoa VALUES (21,'Nicola Ellison','Nicola Ellison Street, 21','Centro','(88) 1234-5678','naoenvie@email.com',27);
INSERT INTO pessoa VALUES (22,'Virginia Hill','Virginia Hill Street, 22','Centro','(88) 1234-5678','naoenvie@email.com',2);
INSERT INTO pessoa VALUES (23,'Edward Sutherland','Edward Sutherland Street, 23','Centro','(88) 1234-5678','naoenvie@email.com',9);
INSERT INTO pessoa VALUES (24,'Gordon Terry','Gordon Terry Street, 24','Centro','(88) 1234-5678','naoenvie@email.com',18);
INSERT INTO pessoa VALUES (25,'Michael Clark','Michael Clark Street, 25','Centro','(88) 1234-5678','naoenvie@email.com',18);
INSERT INTO pessoa_grupo VALUES (15,2,3);
INSERT INTO pessoa_grupo VALUES (16,2,4);
INSERT INTO pessoa_grupo VALUES (17,3,2);
INSERT INTO pessoa_grupo VALUES (18,3,4);
INSERT INTO pessoa_grupo VALUES (19,1,1);
INSERT INTO pessoa_grupo VALUES (20,1,3);
CREATE VIEW view_saldo_pessoa as
    SELECT 
        id,
        nome,
        endereco,
        bairro,
        telefone,
        email,
        (select sum(valor) from conta where id_cliente=pessoa.id) as total,
        (select sum(valor) from conta where id_cliente=pessoa.id and paga='N') as aberto
    FROM pessoa
    ORDER by 8 desc;

