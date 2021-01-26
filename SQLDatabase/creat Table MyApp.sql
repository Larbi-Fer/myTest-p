CREATE DATABASE MYAPP DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
USE MYAPP;

CREATE TABLE EMPLOYEE(
    EmpNO INT PRIMARY KEY AUTO_INCREMENT,
    Name1 VARCHAR(100),
    Name2 VARCHAR(100),
    Email_Phone VARCHAR(30),
    password VARCHAR(30),
    Location VARCHAR(30),
    country VARCHAR(30),
    address VARCHAR(30),
    jander VARCHAR(10),
    BARTHDATE DATE,
    HIRINGDATE DATE,
    ALA VARCHAR(100)
);

CREATE TABLE EMPLOYEE_s(
    EmpNO INT PRIMARY KEY AUTO_INCREMENT,
    name1 VARCHAR(100),
    name2 VARCHAR(100),
    jan VARCHAR(30),
    EP VARCHAR(30),
    pass VARCHAR(30),
    country VARCHAR(30),
    loc VARCHAR(30),
    BD DATE,
    ad VARCHAR(100),
    co VARCHAR(100),
    token VARCHAR(255),
    tokenTime DATE
);

CREATE TABLE PHO_EMPOLEE(
    EMPNO INT,
    Phone VARCHAR(15),
    CONSTRAINT FOREIGN KEY(EMPNO) REFERENCES EMPLOYEE(EMPNO)
);

CREATE TABLE AMI(
    EMPNO INT PRIMARY KEY,
    EMPAMINO INT,
    CONSTRAINT FOREIGN KEY(EMPNO) REFERENCES EMPLOYEE(EMPNO),
    CONSTRAINT FOREIGN KEY(EMPAMINO) REFERENCES EMPLOYEE(EMPNO)
);

ALTER TABLE `ami`
  DROP PRIMARY KEY,
   ADD PRIMARY KEY(
     `EMPNO`,
     `EMPAMINO`);

CREATE TABLE IAMI(
    ID INT PRIMARY KEY,
    EMPNO INT,
    EMPAMINO INT,
    CONSTRAINT FOREIGN KEY(EMPNO) REFERENCES EMPLOYEE(EMPNO),
    CONSTRAINT FOREIGN KEY(EMPAMINO) REFERENCES EMPLOYEE(EMPNO)
);

ALTER TABLE `IAMI`
  DROP PRIMARY KEY,
   ADD PRIMARY KEY(
     `ID`,
     `EMPNO`,
     `EMPAMINO`);

CREATE TABLE Countries(
    Languge VARCHAR(30),
    country VARCHAR(30),
    mail VARCHAR(30),
    femail VARCHAR(30)
);

CREATE TABLE massge(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id1 INT,
    id2 INT,
    massge TEXT,
    date DATETIME,
    CONSTRAINT FOREIGN KEY(id1) REFERENCES EMPLOYEE(EMPNO),
    CONSTRAINT FOREIGN KEY(id2) REFERENCES EMPLOYEE(EMPNO)
);

CREATE TABLE telephone(
    country VARCHAR(30) UNIQUE,
    num VARCHAR(15)
);

DELETE FROM telephone;
INSERT INTO telephone VALUES( 'Afghanistan', 93);
INSERT INTO telephone VALUES( 'Albania', 355);
INSERT INTO telephone VALUES( 'Algeria', 213);
INSERT INTO telephone VALUES( 'American Samoa', 1-684);
INSERT INTO telephone VALUES( 'Andorra', 376);
INSERT INTO telephone VALUES( 'Angola', 244);
INSERT INTO telephone VALUES( 'Anguilla', "1-264");
INSERT INTO telephone VALUES( 'Antarctica', 672);
INSERT INTO telephone VALUES( 'Antigua and Barbuda', 1-268);
INSERT INTO telephone VALUES( 'Argentina', 54);
INSERT INTO telephone VALUES( 'Armenia', 374);
INSERT INTO telephone VALUES( 'Aruba', 297);
INSERT INTO telephone VALUES( 'Australia', 61);
INSERT INTO telephone VALUES( 'Austria', 43);
INSERT INTO telephone VALUES( 'Azerbaijan', 994);
INSERT INTO telephone VALUES( 'Bahamas', "1-242");
INSERT INTO telephone VALUES( 'Bahrain', 973);
INSERT INTO telephone VALUES( 'Bangladesh', 880);
INSERT INTO telephone VALUES( 'Barbados', "1-246");
INSERT INTO telephone VALUES( 'Belarus', 375);
INSERT INTO telephone VALUES( 'Belgium', 32);
INSERT INTO telephone VALUES( 'Belize', 501);
INSERT INTO telephone VALUES( 'Benin', 229);
INSERT INTO telephone VALUES( 'Bermuda', "1-441");
INSERT INTO telephone VALUES( 'Bhutan', 975);
INSERT INTO telephone VALUES( 'Bolivia', 591);
INSERT INTO telephone VALUES( 'Bosnia and Herzegovina', 387);
INSERT INTO telephone VALUES( 'Botswana', 267);
INSERT INTO telephone VALUES( 'Brazil', 55);
INSERT INTO telephone VALUES( 'British Indian Ocean Territory', 246);
INSERT INTO telephone VALUES( 'British Virgin Islands', 1-284);
INSERT INTO telephone VALUES( 'Brunei', 673);
INSERT INTO telephone VALUES( 'Bulgaria', 359);
INSERT INTO telephone VALUES( 'Burkina Faso', 226);
INSERT INTO telephone VALUES( 'Burundi', 257);
INSERT INTO telephone VALUES( 'Cambodia', 855);
INSERT INTO telephone VALUES( 'Cameroon', 237);
INSERT INTO telephone VALUES( 'Canada', 1);
INSERT INTO telephone VALUES( 'Cape Verde', 238);
INSERT INTO telephone VALUES( 'Cayman Islands', 1-345);
INSERT INTO telephone VALUES( 'Central African Republic', 236);
INSERT INTO telephone VALUES( 'Chad', 235);
INSERT INTO telephone VALUES( 'Chile', 56);
INSERT INTO telephone VALUES( 'China', 86);
INSERT INTO telephone VALUES( 'Christmas Island', 61);
INSERT INTO telephone VALUES( 'Cocos Islands', 61);
INSERT INTO telephone VALUES( 'Colombia', 57);
INSERT INTO telephone VALUES( 'Comoros', 269);
INSERT INTO telephone VALUES( 'Cook Islands', 682);
INSERT INTO telephone VALUES( 'Costa Rica', 506);
INSERT INTO telephone VALUES( 'Croatia', 385);
INSERT INTO telephone VALUES( 'Cuba', 53);
INSERT INTO telephone VALUES( 'Curacao', 599);
INSERT INTO telephone VALUES( 'Cyprus', 357);
INSERT INTO telephone VALUES( 'Czech Republic', 420);
INSERT INTO telephone VALUES( 'Democratic Republic of the Congo', 243);
INSERT INTO telephone VALUES( 'Denmark', 45);
INSERT INTO telephone VALUES( 'Djibouti', 253);
INSERT INTO telephone VALUES( 'Dominica', 1-767);
INSERT INTO telephone VALUES( 'Dominican Republic', 1-809);/* 1-829 , 1-849 */
INSERT INTO telephone VALUES( 'East Timor', 670);
INSERT INTO telephone VALUES( 'Ecuador', 593);
INSERT INTO telephone VALUES( 'Egypt', 20);
INSERT INTO telephone VALUES( 'El Salvador', 503);
INSERT INTO telephone VALUES( 'Equatorial Guinea', 240);
INSERT INTO telephone VALUES( 'Eritrea', 291);
INSERT INTO telephone VALUES( 'Estonia', 372);
INSERT INTO telephone VALUES( 'Ethiopia', 251);
INSERT INTO telephone VALUES( 'Falkland Islands', 500);
INSERT INTO telephone VALUES( 'Faroe Islands', 298);
INSERT INTO telephone VALUES( 'Fiji', 679);
INSERT INTO telephone VALUES( 'Finland', 358);
INSERT INTO telephone VALUES( 'France', 33);
INSERT INTO telephone VALUES( 'French Polynesia', 689);
INSERT INTO telephone VALUES( 'Gabon', 241);
INSERT INTO telephone VALUES( 'Gambia', 220);
INSERT INTO telephone VALUES( 'Georgia', 995);
INSERT INTO telephone VALUES( 'Germany', 49);
INSERT INTO telephone VALUES( 'Ghana', 233);
INSERT INTO telephone VALUES( 'Gibraltar', 350);
INSERT INTO telephone VALUES( 'Greece', 30);
INSERT INTO telephone VALUES( 'Greenland',299);
INSERT INTO telephone VALUES( 'Grenada', 1-473);
INSERT INTO telephone VALUES( 'Guam', 1-671);
INSERT INTO telephone VALUES( 'Guatemala', 502);
INSERT INTO telephone VALUES( 'Guernsey', 44-1481);
INSERT INTO telephone VALUES( 'Guinea', 224);
INSERT INTO telephone VALUES( 'Guinea-Bissau', 245);
INSERT INTO telephone VALUES( 'Guyana', 592);
INSERT INTO telephone VALUES( 'Haiti', 509);
INSERT INTO telephone VALUES( 'Honduras', 504);
INSERT INTO telephone VALUES( 'Hong Kong', 852);
INSERT INTO telephone VALUES( 'Hungary', 36);
INSERT INTO telephone VALUES( 'Iceland', 354);
INSERT INTO telephone VALUES( 'India', 91);
INSERT INTO telephone VALUES( 'Indonesia', 62);
INSERT INTO telephone VALUES( 'Iran', 98);
INSERT INTO telephone VALUES( 'Iraq', 964);
INSERT INTO telephone VALUES( 'Ireland', 353);
INSERT INTO telephone VALUES( 'Isle of Man', 44-1624);
INSERT INTO telephone VALUES( 'Israel', 972);
INSERT INTO telephone VALUES( 'Italy', 39);
INSERT INTO telephone VALUES( 'Ivory Coast', 225);
INSERT INTO telephone VALUES( 'Jamaica', 1-876);
INSERT INTO telephone VALUES( 'Japan', 81);
INSERT INTO telephone VALUES( 'Jersey', 44-1534);
INSERT INTO telephone VALUES( 'Jordan', 962);
INSERT INTO telephone VALUES( 'Kazakhstan', 7);
INSERT INTO telephone VALUES( 'Kenya', 254);
INSERT INTO telephone VALUES( 'Kiribati', 686);
INSERT INTO telephone VALUES( 'Kosovo', 383);
INSERT INTO telephone VALUES( 'Kuwait', 665);
INSERT INTO telephone VALUES( 'Kyrgyzstan', 996);
INSERT INTO telephone VALUES( 'Laos', 856);
INSERT INTO telephone VALUES( 'Latvia', 371);
INSERT INTO telephone VALUES( 'Lebanon', 261);
INSERT INTO telephone VALUES( 'Lesotho', 266);
INSERT INTO telephone VALUES( 'Liberia', 231);
INSERT INTO telephone VALUES( 'Libya', 218);
INSERT INTO telephone VALUES( 'Liechtenstein', 423);
INSERT INTO telephone VALUES( 'Lithuania', 370);


/** algerian **/