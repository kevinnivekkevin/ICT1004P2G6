# CREATE DATABASE vending;

USE vending;
# Create Table manually on workbench to populate database
CREATE TABLE shirtsize (
event_id			MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
Event_Name       	VARCHAR(60) NOT NULL, 
Event_Location      VARCHAR(60) NOT NULL, 
event_day			MEDIUMINT UNSIGNED NOT NULL,
event_month			MEDIUMINT UNSIGNED NOT NULL,
event_year			MEDIUMINT UNSIGNED NOT NULL,
XSC               	VARCHAR(5) NOT NULL,  
XSL               	VARCHAR(5) NOT NULL,  
SC               	VARCHAR(5) NOT NULL,  
SL                	VARCHAR(5) NOT NULL, 
MC                	VARCHAR(5) NOT NULL,  
ML                	VARCHAR(5) NOT NULL,  
LC                	VARCHAR(5) NOT NULL,  
LL                	VARCHAR(5) NOT NULL,  
XLC               	VARCHAR(5) NOT NULL, 
XLL               	VARCHAR(5) NOT NULL,  
org_name 			VARCHAR(40) NOT NULL,
org_id 				MEDIUMINT UNSIGNED NOT NULL,
PRIMARY KEY (event_id));
/*
INSERT INTO vending.shirtsize(Event_Name, Event_Location, XSC, XSL, SC, SL, MC, ML, LC, LL, XLC, XLL) VALUES
('Standard Chartered Marathon', 'Raffles City', '28', '36.5', '30', '38.5', '32', '40.5', '34', '42.5', '36', '44.5');
UPDATE acc SET bloodtype='A' WHERE user_id=12;*/
