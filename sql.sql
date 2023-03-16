CREATE TABLE AddressInformation (
       ID INT unsigned PRIMARY KEY AUTO_INCREMENT,
 	   street VARCHAR(500),
       houseNumber VARCHAR(10),
       city VARCHAR(500),
       zip VARCHAR(10),
       country VARCHAR(500)
 );

 CREATE TABLE BankAccount (
       ID INT unsigned PRIMARY KEY AUTO_INCREMENT,
 	   name VARCHAR(500),
       iban VARCHAR(100),
       bic VARCHAR(500)
 );

 CREATE TABLE Club (
       ID INT unsigned PRIMARY KEY AUTO_INCREMENT,
 	 name VARCHAR(500),
       type VARCHAR(500),
	 bankAccountID INT unsigned,
       membershipFee INT,
       CONSTRAINT bankAccount FOREIGN KEY (bankAccountID) REFERENCES BankAccount(ID)
 );

CREATE TABLE Manager (
        ID INT unsigned PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(500),
        password TEXT,
        session VARCHAR(500) 
); 

 CREATE TABLE Member (
       ID INT unsigned PRIMARY KEY AUTO_INCREMENT,
       bankAccountID INT unsigned,
	 addressInformationID INT unsigned,
       birthDate date,
       clubID INT UNSIGNED,
 	 firstName VARCHAR(500),
       lastName VARCHAR(500),
       gender ENUM('f', 'm', 'd'),
       telephoneNumber VARCHAR(500),
       email VARCHAR(500),
       discount INT,
       CONSTRAINT member_bankAccount FOREIGN KEY (bankAccountID) REFERENCES BankAccount(ID),
       CONSTRAINT member_addressinformation FOREIGN KEY (addressInformationID) REFERENCES AddressInformation(ID),
       CONSTRAINT member_club FOREIGN KEY (clubID) REFERENCES Club(ID)
 );

 CREATE TABLE BankWireTransfer (
       ID INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
       fromIBAN VARCHAR(500),
       toIBAN VARCHAR(500),
       transferDate DATETIME,
       amount INT
  )