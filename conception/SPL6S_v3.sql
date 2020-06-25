#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `SPL6S` CHARACTER SET 'utf8';
USE `SPL6S`;

#------------------------------------------------------------
# Table: prs13_roles
#------------------------------------------------------------

CREATE TABLE `prs13_roles`(
        `id`   Int  Auto_increment  NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT prs13_roles_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_societies
#------------------------------------------------------------

CREATE TABLE `prs13_societies`(
        `id`    Int  Auto_increment  NOT NULL ,
        `name`  Varchar (50) NOT NULL ,
        `siret` Varchar (50) NOT NULL
	,CONSTRAINT prs13_societies_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_statusProjectName
#------------------------------------------------------------

CREATE TABLE `prs13_statusProjectName`(
        `id`   Int  Auto_increment  NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT prs13_statusProjectName_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_expectedAnnualSaving
#------------------------------------------------------------

CREATE TABLE `prs13_expectedAnnualSaving`(
        `id`    Int  Auto_increment  NOT NULL ,
        `value` Int NOT NULL
	,CONSTRAINT prs13_expectedAnnualSaving_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_stepsNames
#------------------------------------------------------------

CREATE TABLE `prs13_stepsNames`(
        `id`   Int  Auto_increment  NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT prs13_stepsNames_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_followSaving
#------------------------------------------------------------

CREATE TABLE `prs13_followSaving`(
        `id`                            Int  Auto_increment  NOT NULL ,
        `month`                         Int NOT NULL ,
        `value`                         Int NOT NULL ,
        `savingEntryDate`               Datetime NOT NULL ,
        `idExpectedAnnualSaving` Int NOT NULL
	,CONSTRAINT prs13_followSaving_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_typeQuery
#------------------------------------------------------------

CREATE TABLE `prs13_typeQuery`(
        `id`   Int  Auto_increment  NOT NULL ,
        `name` Varchar (50) NOT NULL
	,CONSTRAINT prs13_typeQuery_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_users
#------------------------------------------------------------

CREATE TABLE `prs13_users`(
        `id`                 Int  Auto_increment  NOT NULL ,
        `firstname`          Varchar (50) ,
        `lastname`           Varchar (50) ,
        `phone`              Varchar (15) ,
        `email`              Varchar (50) ,
        `password`           Varchar (50) ,
        `idRoles`     Int NOT NULL ,
        `idSocieties` Int NOT NULL ,
        `idUsers`     Int
	,CONSTRAINT prs13_users_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_projectLeanSigma
#------------------------------------------------------------

CREATE TABLE `prs13_projectLeanSigma`(
        `id`                         Int  Auto_increment  NOT NULL ,
        `nameProject`                Varchar (50) NOT NULL ,
        `department`                 Varchar (50) NOT NULL ,
        `description`                Varchar (50) NOT NULL ,
        `idLeader`             Int NOT NULL ,
        `idChampion`   Int NOT NULL ,
        `idController` Int NOT NULL
	,CONSTRAINT prs13_projectLeanSigma_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_query
#------------------------------------------------------------

CREATE TABLE `prs13_query`(
        `id`                        Int  Auto_increment  NOT NULL ,
        `description`               Varchar (255) NOT NULL ,
        `idProjectLeanSigma` Int NOT NULL ,
        `idTypeQuery`        Int NOT NULL
	,CONSTRAINT prs13_query_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_keyMesures
#------------------------------------------------------------

CREATE TABLE `prs13_keyMesures`(
        `id`                        Int  Auto_increment  NOT NULL ,
        `designation`               Varchar (50) NOT NULL ,
        `base`                      Int NOT NULL ,
        `goal`                      Int NOT NULL ,
        `ideal`                     Int NOT NULL ,
        `unit`                      Varchar (10) NOT NULL ,
        `idProjectLeanSigma` Int NOT NULL
	,CONSTRAINT prs13_keyMesures_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_followMeasuresKeys
#------------------------------------------------------------

CREATE TABLE `prs13_followMeasuresKeys`(
        `id`                  Int  Auto_increment  NOT NULL ,
        `month`               Int NOT NULL ,
        `value`               Int NOT NULL ,
        `mesureEntryDate`     Datetime NOT NULL ,
        `idKeyMesures` Int NOT NULL
	,CONSTRAINT prs13_followMeasuresKeys_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_steps
#------------------------------------------------------------

CREATE TABLE `prs13_steps`(
        `id`                        Int  Auto_increment  NOT NULL ,
        `date`                      Date NOT NULL ,
        `validated`                 Bool NOT NULL ,
        `idProjectLeanSigma` Int NOT NULL ,
        `idStepsNames`       Int NOT NULL
	,CONSTRAINT prs13_steps_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_statusProject
#------------------------------------------------------------

CREATE TABLE `prs13_statusProject`(
        `id`                         Int  Auto_increment  NOT NULL ,
        `date`                       Varchar (50) NOT NULL ,
        `idProjectLeanSigma`  Int NOT NULL ,
        `idStatusProjectName` Int NOT NULL
	,CONSTRAINT prs13_statusProject_PK PRIMARY KEY (`id`)
)ENGINE=InnoDB;




ALTER TABLE `prs13_followSaving`
	ADD CONSTRAINT prs13_followSaving_prs13_expectedAnnualSaving0_FK
	FOREIGN KEY (`idExpectedAnnualSaving`)
	REFERENCES `prs13_expectedAnnualSaving`(`id`);

ALTER TABLE `prs13_users`
	ADD CONSTRAINT prs13_users_prs13_roles0_FK
	FOREIGN KEY (`idRoles`)
	REFERENCES `prs13_roles`(`id`);

ALTER TABLE `prs13_users`
	ADD CONSTRAINT prs13_users_prs13_societies1_FK
	FOREIGN KEY (`idSocieties`)
	REFERENCES `prs13_societies`(`id`);

ALTER TABLE `prs13_users`
	ADD CONSTRAINT prs13_users_prs13_users2_FK
	FOREIGN KEY (`idUsers`)
	REFERENCES `prs13_users`(`id`);

ALTER TABLE `prs13_projectLeanSigma`
	ADD CONSTRAINT prs13_projectLeanSigma_prs13_users0_FK
	FOREIGN KEY (`idLeader`)
	REFERENCES `prs13_users`(`id`);

ALTER TABLE `prs13_projectLeanSigma`
	ADD CONSTRAINT prs13_projectLeanSigma_prs13_users1_FK
	FOREIGN KEY (`idChampion`)
	REFERENCES `prs13_users`(`id`);

ALTER TABLE `prs13_projectLeanSigma`
	ADD CONSTRAINT prs13_projectLeanSigma_prs13_users2_FK
	FOREIGN KEY (`idController`)
	REFERENCES `prs13_users`(`id`);

ALTER TABLE `prs13_query`
	ADD CONSTRAINT prs13_query_prs13_projectLeanSigma0_FK
	FOREIGN KEY (`idProjectLeanSigma`)
	REFERENCES `prs13_projectLeanSigma`(`id`);

ALTER TABLE `prs13_query`
	ADD CONSTRAINT prs13_query_prs13_typeQuery1_FK
	FOREIGN KEY (`idTypeQuery`)
	REFERENCES `prs13_typeQuery`(`id`);

ALTER TABLE `prs13_keyMesures`
	ADD CONSTRAINT prs13_keyMesures_prs13_projectLeanSigma0_FK
	FOREIGN KEY (`idProjectLeanSigma`)
	REFERENCES `prs13_projectLeanSigma`(`id`);

ALTER TABLE `prs13_followMeasuresKeys`
	ADD CONSTRAINT prs13_followMeasuresKeys_prs13_keyMesures0_FK
	FOREIGN KEY (`idKeyMesures`)
	REFERENCES `prs13_keyMesures`(`id`);

ALTER TABLE `prs13_steps`
	ADD CONSTRAINT prs13_steps_prs13_projectLeanSigma0_FK
	FOREIGN KEY (`idProjectLeanSigma`)
	REFERENCES `prs13_projectLeanSigma`(`id`);

ALTER TABLE `prs13_steps`
	ADD CONSTRAINT prs13_steps_prs13_stepsNames1_FK
	FOREIGN KEY (`idStepsNames`)
	REFERENCES `prs13_stepsNames`(`id`);

ALTER TABLE `prs13_statusProject`
	ADD CONSTRAINT prs13_statusProject_prs13_projectLeanSigma0_FK
	FOREIGN KEY (`idProjectLeanSigma`)
	REFERENCES `prs13_projectLeanSigma`(`id`);

ALTER TABLE `prs13_statusProject`
	ADD CONSTRAINT prs13_statusProject_prs13_statusProjectName1_FK
	FOREIGN KEY (`idStatusProjectName`)
	REFERENCES `prs13_statusProjectName`(`id`);
