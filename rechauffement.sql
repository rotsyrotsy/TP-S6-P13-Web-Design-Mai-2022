CREATE DATABASE rechauffement;
ALTER DATABASE rechauffement CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use rechauffement;

CREATE TABLE article(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255),
    description text,
    image VARCHAR(100),
    date TIMESTAMP,
    auteur VARCHAR(100),
);
alter table article add url VARCHAR(255);
alter table article add resume text;

CREATE TABLE admin(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(100),
    mdp VARCHAR(255)
);

ALTER TABLE article CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DELIMITER $$
CREATE TRIGGER after_article_insert
BEFORE INSERT
ON article FOR EACH ROW
BEGIN 
SET @lastID = (select auto_increment from information_schema.TABLES where TABLE_NAME ='article' and TABLE_SCHEMA='rechauffement');
SET NEW.url = REGEXP_REPLACE(CONCAT("rechauffement-climatique/ ", REPLACE(NEW.titre, ' ', '-'), "-", @lastID),'[^[:alnum:]]+', '-');
END$$
DELIMITER ;


DELIMITER $$
CREATE TRIGGER after_article_update
BEFORE UPDATE
ON article FOR EACH ROW
BEGIN
SET NEW.url = REGEXP_REPLACE(CONCAT("rechauffement-climatique/ ", REPLACE(NEW.titre, ' ', '-'), "-", OLD.id),'[^[:alnum:]]+', '-');
END$$
DELIMITER ;

INSERT INTO admin VALUES (1,'John Doe','johndoe@gmail.com',sha1('motdepasse123'));


INSERT INTO article VALUES (null,'Une extinction de masse se prépare dans l''océan : comment l''éviter ?',
'Le réchauffement climatique menace la vie sur Terre. Jusque dans les océans. Une extinction de masse se prépare. Possiblement comparable à la pire qu''a connue notre Planète. Il y a 250 millions d''années. Possiblement. Parce que des chercheurs nous l''assurent aujourd''hui. Il n''est pas trop tard pour inverser la tendance !',
'1.jpg','2022-05-16','Nathalie Mayer',null,'Une extinction de masse se prépare de la Terre à l''océan');

INSERT INTO article VALUES (null,'Réchauffement climatique : en Australie, 91 % de la Grande Barrière de corail a subi un « blanchissement »',
'En Australie, environ 91 % de la Grande Barrière de corail a subi un « blanchissement » en raison d’une vague de chaleur prolongée lors de l’été austral, selon un nouveau rapport gouvernemental publié mardi soir. Sur les 719 récifs étudiés, 654, soit 91 %, présentent un certain niveau de blanchiment des coraux. C’est la première fois que le plus grand récif corallien du monde est touché par un tel blanchissement au cours du phénomène climatique La Niña, habituellement caractérisé par une température anormalement basse des eaux.

« Le changement climatique s’intensifie et le récif en subit déjà les conséquences », met en garde le rapport de surveillance, qui rappelle qu’il s’agit de la quatrième vague de « blanchissement » à frapper le récif depuis 2016. Entre septembre 2021 et mars 2022, l’autorité maritime de la Grande Barrière de corail, qui a publié cette étude, a procédé à des relevés exhaustifs sur ce récif inscrit sur la liste du patrimoine mondial de l’Unesco.',
'2.jpg','2022-05-11','Le Monde avec AFP',null,'En Australie, environ 91 % de la Grande Barrière de corail a subi un « blanchissement » en raison d’une vague de chaleur prolongée lors de l’été austral');

INSERT INTO article VALUES (null,'Climat : ces étendues d’eau sont en train de disparaître',
'Depuis le XXe siècle, on constate que les étendues d''eau continentales s''assèchent. Les zones tropicales sont les premières touchées car elles ont un climat chaud et sec, mais des régions plus tempérées, comme la France, commencent à manifester aussi des signes de sécheresse.
N''importe quel pays peut être touché par des épisodes de sécheresse s''il répond aux conditions climatiques suivantes : une baisse des précipitations pendant une période prolongée, accompagnée d''une élévation des températures. Bien sûr, certaines régions du Globe sont plus vulnérables à ces sécheresses, notamment les zones tropicales et subtropicales qui ont un climat plus chaud et plus sec. ',
'3.jpg','2022-05-16','Salomé Vercelot',null,'Depuis le XXe siècle, on constate que les étendues d''eau continentales s''assèchent');

INSERT INTO article VALUES (null, 'Pourquoi la crème solaire fait périr les coraux ? Et comment y remédier ?',
'La crème solaire dont nous nous enduisons chaque été est destinée à nous protéger des rayonnements. Mais lorsqu''elle finit dans la mer -- des milliers de tonnes chaque année ! --, elle nuit à la santé des coraux et des anémones. Des chercheurs viennent de mettre à jour le mode opératoire du principal suspect.',
'4.jpg','2022-05-15','Nathalie Mayer',null,'Des chercheurs viennent de mettre à jour le mode opératoire de la crème solaire.');

INSERT INTO article VALUES (null,'La limite des +1,5 °C de réchauffement sera probablement atteinte ou dépassée d''ici 5 ans !',
'Un risque sur deux d''atteindre, voire de dépasser, le seuil des +1,5 °C de réchauffement d''ici 5 ans, tel est le constat de l''OMM, l''Organisation météorologique mondiale, dans son dernier rapport choc sur l''''évolution du climat 2022-entre et 2026.
Selon un nouveau rapport choc de l''Organisation Météorologique Mondiale, organisme de l''ONU, il y a 50 % de risques pour que la hausse des températures atteigne ou dépasse les +1,5 °C comparée à celle des niveaux préindustriels. Cette annonce, rendue publique le lundi 9 mai, fait effet de choc dans la communauté scientifique internationale car ce risque était estimé à zéro dans le rapport de 2015. Rappelons que l''Accord de Paris avait fixé comme objectif le seuil de +2 °C de réchauffement à ne pas dépasser d''ici la fin du siècle, en essayant au maximum de le limiter à +1,5 °C : ces 1,5 °C ne devraient donc pas être atteints d''ici 2100, mais peut-être d''ici 2026 selon l''OMM !
','5.jpg','2022-05-11','Karine Durand',null,'Un risque sur deux d''atteindre, voire de dépasser, le seuil des +1,5 °C de réchauffement d''ici 5 ans.');

INSERT INTO article VALUES (null,'La Nouvelle-Zélande est confrontée à une montée des eaux deux fois plus rapide que prévu',
'Le niveau de la mer augmente deux fois plus vite que prévu dans certaines parties de la Nouvelle-Zélande, menaçant les deux plus grandes villes du pays.
Les données recueillies le long du littoral en Nouvelle-Zélande ont montré que certaines zones s''enfoncent déjà de trois à quatre millimètres par an, accélérant le péril tant redouté. Les projections, qualifiées d''« un peu terrifiantes » par un expert, sont le fruit d''un vaste programme de recherche sur cinq ans -- baptisé NZ SeaRise -- effectué par des dizaines de scientifiques, locaux et internationaux et financé par le gouvernement.',
'6.jpg','2022-05-03','Futura avec ETX Daily Up',null,'Le niveau de la mer augmente deux fois plus vite que prévu dans certaines parties de la Nouvelle-Zélande.');

-- select *from fn_remove_accents('SS2éjbj coucou dd')

-- DROP FUNCTION IF EXISTS fn_remove_accents;
-- DELIMITER |
-- CREATE FUNCTION fn_remove_accents( textvalue VARCHAR(10000) ) RETURNS VARCHAR(10000)

-- BEGIN

--  SET @textvalue = textvalue ;

-- -- ACCENTS
-- SET @withaccents = 'ŠšŽžÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝŸÞàáâãäåæçèéêëìíîïñòóôõöøùúûüýÿþƒ';
-- SET @withoutaccents = 'SsZzAAAAAAACEEEEIIIINOOOOOOUUUUYYBaaaaaaaceeeeiiiinoooooouuuuyybf';
-- SET @count = LENGTH(@withaccents);

-- WHILE @count > 0 DO
--     SET @textvalue = REPLACE(@textvalue, SUBSTRING(@withaccents, @count, 1), SUBSTRING(@withoutaccents, @count, 1));
--     SET @count = @count - 1;
-- END WHILE;

-- -- SPECIAL CHARS
-- SET @special = '«»’”“!@#$%¨&()_+=§¹²³£¢¬"`´{[^~}]<,>.:;?/°ºª+|\'';
-- SET @count = LENGTH(@special);

-- WHILE @count > 0 do
--     SET @textvalue = REPLACE(@textvalue, SUBSTRING(@special, @count, 1), '');
--     SET @count = @count - 1;
-- END WHILE;
-- RETURN @textvalue;

-- END
-- |
-- DELIMITER ;