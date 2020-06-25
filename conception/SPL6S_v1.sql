#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `SPL6S` CHARACTER SET 'utf8';
USE `SPL6S`;

#------------------------------------------------------------
# Table: prs13_roles
#------------------------------------------------------------

CREATE TABLE prs13_roles(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_societies
#------------------------------------------------------------

CREATE TABLE prs13_societies(
        id    Int  Auto_increment  NOT NULL ,
        name  Varchar (50) NOT NULL ,
        siret Varchar (50) NOT NULL
	,CONSTRAINT societies_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_users
#------------------------------------------------------------

CREATE TABLE prs13_users(
        id                 Int  Auto_increment  NOT NULL ,
        firstname          Varchar (50) ,
        lastname           Varchar (50) ,
        phone              Varchar (15) ,
        email              Varchar (50) ,
        password           Varchar (50) ,
        idRoles     Int NOT NULL ,
        idSocieties Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_roles_FK FOREIGN KEY (idRoles) REFERENCES prs13_roles(id)
	,CONSTRAINT users_societies0_FK FOREIGN KEY (idSocieties) REFERENCES prs13_societies(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_projectLeanSigma
#------------------------------------------------------------

CREATE TABLE prs13_projectLeanSigma(
        id              Int  Auto_increment  NOT NULL ,
        nameProject     Varchar (50) NOT NULL ,
        department      Varchar (50) NOT NULL ,
        description     Varchar (50) NOT NULL ,
        downloadReports Varchar (50) NOT NULL
	,CONSTRAINT projectLeanSigma_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_statusProjectName
#------------------------------------------------------------

CREATE TABLE prs13_statusProjectName(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT statusProjectName_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_keyMesures
#------------------------------------------------------------

CREATE TABLE prs13_keyMesures(
        id                        Int  Auto_increment  NOT NULL ,
        designation               Varchar (50) NOT NULL ,
        base                      Int NOT NULL ,
        goal                      Int NOT NULL ,
        ideal                     Int NOT NULL ,
        unit                      Varchar (10) NOT NULL ,
        idProjectLeanSigma Int NOT NULL
	,CONSTRAINT keyMesures_PK PRIMARY KEY (id)

	,CONSTRAINT keyMesures_projectLeanSigma_FK FOREIGN KEY (idProjectLeanSigma) REFERENCES prs13_projectLeanSigma(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_expectedAnnualSaving
#------------------------------------------------------------

CREATE TABLE prs13_expectedAnnualSaving(
        id    Int  Auto_increment  NOT NULL ,
        value Int NOT NULL
	,CONSTRAINT expectedAnnualSaving_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_followMeasuresKeys
#------------------------------------------------------------

CREATE TABLE prs13_followMeasuresKeys(
        id                  Int  Auto_increment  NOT NULL ,
        month               Int NOT NULL ,
        value               Int NOT NULL ,
        mesureEntryDate     Datetime NOT NULL ,
        idKeyMesures Int NOT NULL
	,CONSTRAINT followMeasuresKeys_PK PRIMARY KEY (id)

	,CONSTRAINT followMeasuresKeys_keyMesures_FK FOREIGN KEY (idKeyMesures) REFERENCES prs13_keyMesures(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_stepsNames
#------------------------------------------------------------

CREATE TABLE prs13_stepsNames(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT stepsNames_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_steps
#------------------------------------------------------------

CREATE TABLE prs13_steps(
        id                        Int  Auto_increment  NOT NULL ,
        date                      Date NOT NULL ,
        validated                 TINYINT NOT NULL ,
        idProjectLeanSigma Int NOT NULL ,
        idStepsNames       Int NOT NULL
	,CONSTRAINT steps_PK PRIMARY KEY (id)

	,CONSTRAINT steps_projectLeanSigma_FK FOREIGN KEY (idProjectLeanSigma) REFERENCES prs13_projectLeanSigma(id)
	,CONSTRAINT steps_stepsNames0_FK FOREIGN KEY (idStepsNames) REFERENCES prs13_stepsNames(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_followSaving
#------------------------------------------------------------

CREATE TABLE prs13_followSaving(
        id                            Int  Auto_increment  NOT NULL ,
        month                         Int NOT NULL ,
        value                         Int NOT NULL ,
        savingEntryDate               Datetime NOT NULL ,
        idExpectedAnnualSaving Int NOT NULL
	,CONSTRAINT followSaving_PK PRIMARY KEY (id)

	,CONSTRAINT followSaving_expectedAnnualSaving_FK FOREIGN KEY (idExpectedAnnualSaving) REFERENCES prs13_expectedAnnualSaving(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_statusProject
#------------------------------------------------------------

CREATE TABLE prs13_statusProject(
        id                         Int  Auto_increment  NOT NULL ,
        date                       Varchar (50) NOT NULL ,
        idProjectLeanSigma  Int NOT NULL ,
        idStatusProjectName Int NOT NULL
	,CONSTRAINT statusProject_PK PRIMARY KEY (id)

	,CONSTRAINT statusProject_projectLeanSigma_FK FOREIGN KEY (idProjectLeanSigma) REFERENCES prs13_projectLeanSigma(id)
	,CONSTRAINT statusProject_statusProjectName0_FK FOREIGN KEY (idStatusProjectName) REFERENCES prs13_statusProjectName(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_has
#------------------------------------------------------------

CREATE TABLE prs13_has(
        id                        Int  Auto_increment  NOT NULL ,
        idUsers            Int NOT NULL ,
        idProjectLeanSigma Int NOT NULL
	,CONSTRAINT has_PK PRIMARY KEY (id)

	,CONSTRAINT has_users_FK FOREIGN KEY (idUsers) REFERENCES prs13_users(id)
	,CONSTRAINT has_projectLeanSigma0_FK FOREIGN KEY (idProjectLeanSigma) REFERENCES prs13_projectLeanSigma(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_typeQuery
#------------------------------------------------------------

CREATE TABLE prs13_typeQuery(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (50) NOT NULL
	,CONSTRAINT typeQuery_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: prs13_query
#------------------------------------------------------------

CREATE TABLE prs13_query(
        id                        Int  Auto_increment  NOT NULL ,
        description               Varchar (255) NOT NULL ,
        idProjectLeanSigma Int NOT NULL ,
        idTypeQuery        Int NOT NULL
	,CONSTRAINT query_PK PRIMARY KEY (id)

	,CONSTRAINT query_projectLeanSigma_FK FOREIGN KEY (idProjectLeanSigma) REFERENCES prs13_projectLeanSigma(id)
	,CONSTRAINT query_typeQuery0_FK FOREIGN KEY (idTypeQuery) REFERENCES prs13_typeQuery(id)
)ENGINE=InnoDB;

