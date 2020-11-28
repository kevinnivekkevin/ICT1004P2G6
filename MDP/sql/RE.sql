/*USE vending;*/
# Create table to populate database
CREATE TABLE acc (
user_id 			MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
first_name 			VARCHAR(20) NOT NULL,
last_name 			VARCHAR(40) NOT NULL,
username 			VARCHAR(60) NOT NULL,
email				VARCHAR(40) NOT NULL,
dob_day 			TINYINT NULL CHECK (dob_day BETWEEN 1 AND 31),
dob_month 		TINYINT NULL CHECK (dob_month BETWEEN 1 AND 12),
dob_year 		SMALLINT NULL CHECK (dob_year BETWEEN 1900 AND 2017),
gender				VARCHAR(10) NOT NULL,
pass 				CHAR(40) NOT NULL,
registration_date 	DATETIME NOT NULL,
PRIMARY KEY (user_id)
);/*
INSERT INTO vending.acc (first_name, last_name, username, email, dob_day, dob_month, dob_year, gender, pass, registration_date) VALUES
('Test', 'Cool', 'Kenny', 'krr@noj.com', '01', '06', '1998', 'Male', SHA1('qopkrokr65'), NOW());*/



CREATE TABLE RE (
user_id				MEDIUMINT UNSIGNED NOT NULL,
first_name 			VARCHAR(20) NOT NULL,
last_name 			VARCHAR(40) NOT NULL,
email				VARCHAR(40) NOT NULL,
dob_day 			TINYINT NULL CHECK (dob_day BETWEEN 1 AND 31),
dob_month 			TINYINT NULL CHECK (dob_month BETWEEN 1 AND 12),
dob_year 			SMALLINT NULL CHECK (dob_year BETWEEN 1900 AND 2017),
gender 				VARCHAR(10) NOT NULL,
shirt_size 			VARCHAR(10) NOT NULL,
event_id			MEDIUMINT UNSIGNED NOT NULL,
Event_Name 			VARCHAR(60) NOT NULL,
bib_number 			SMALLINT(4) UNSIGNED ZEROFILL NOT NULL,
PRIMARY KEY (bib_number)
);
/*
INSERT INTO vending.RE (user_id, first_name, last_name, email, gender, dob_day, dob_month, dob_year, shirt_size, event_id, Event_Name, bib_number)
SELECT user_id, first_name, last_name, email, gender, dob_day, dob_month, dob_year, 'S', '1', 'Osim Sundown Marathon 2017', '5002' from vending.acc WHERE user_id = 3;
*/
/*
Info - event_id, Event_Name, No. of Participants, SC_BPP, SC_CSM, SC_OneKMM, SC_VN 
*/

CREATE TABLE org (
user_id 			MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
company_name		VARCHAR(40) NOT NULL,
username 			VARCHAR(60) NOT NULL,
phone				VARCHAR(20) NOT NULL,
email				VARCHAR(40) NOT NULL,
address				VARCHAR(60) NOT NULL,
postal_code			VARCHAR(20) NOT NULL,
pass 				CHAR(40) NOT NULL,
registration_date 	DATETIME NOT NULL,
PRIMARY KEY (user_id)
);/*
INSERT INTO vending.org (company_name, username, phone, email, address, postal_code, pass, registration_date) VALUES
('Test', 'Cool', '+65 9876 5432', 'krr@noj.com', 'Testco, Pasir Panjang St 42', '721743', SHA1('qopkrokr65'), NOW());
*/