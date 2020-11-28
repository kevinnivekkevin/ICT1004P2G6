USE vending;
/* Create Table manually on workbench to populate database
CREATE TABLE BPP(
event_id			MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
Event_Name			VARCHAR(60) NOT NULL,
XS					VARCHAR(3) NOT NULL,
S					VARCHAR(3) NOT NULL,
M					VARCHAR(3) NOT NULL,
L					VARCHAR(3) NOT NULL,
XL					VARCHAR(3) NOT NULL,
PRIMARY KEY (event_id)
);


CREATE TABLE OneKMM(
event_id			MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
Event_Name			VARCHAR(60) NOT NULL,
XS					VARCHAR(3) NOT NULL,
S					VARCHAR(3) NOT NULL,
M					VARCHAR(3) NOT NULL,
L					VARCHAR(3) NOT NULL,
XL					VARCHAR(3) NOT NULL,
PRIMARY KEY (event_id)
);

CREATE TABLE CSM(
event_id			MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
Event_Name			VARCHAR(60) NOT NULL,
XS					VARCHAR(3) NOT NULL,
S					VARCHAR(3) NOT NULL,
M					VARCHAR(3) NOT NULL,
L					VARCHAR(3) NOT NULL,
XL					VARCHAR(3) NOT NULL,
PRIMARY KEY (event_id)
);



CREATE TABLE VN(
event_id			MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
Event_Name			VARCHAR(60) NOT NULL,
XS					VARCHAR(3) NOT NULL,
S					VARCHAR(3) NOT NULL,
M					VARCHAR(3) NOT NULL,
L					VARCHAR(3) NOT NULL,
XL					VARCHAR(3) NOT NULL,
PRIMARY KEY (event_id)
);
*/
/* Manual inserting and deleting on workbench
INSERT INTO vending.BPP (Event_Name, XS, S, M, L, XL) VALUES
('Marina Run 2018', '0', '0', '0', '0', '0');
INSERT INTO vending.OneKMM (Event_Name, XS, S, M, L, XL) VALUES
('Marina Run 2018', '0', '0', '0', '0', '0');
INSERT INTO vending.CSM (Event_Name, XS, S, M, L, XL) VALUES
('Marina Run 2018', '0', '0', '0', '0', '0');
INSERT INTO vending.VN (Event_Name, XS, S, M, L, XL) VALUES
('Marina Run 2018', '0', '0', '0', '0', '0');/*
DELETE FROM vending.shirtsize WHERE event_id = '7';*/
