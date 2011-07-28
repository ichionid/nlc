-- File: schema.mysql.sql
--
-- Schema and user definition for NLC.
--
-- This file, when used in batch mode, is expected to set up the entire database
-- for the nlc project. The user running this script must have grant access on
-- database 'nlc'.

-- Database
CREATE DATABASE nlc;
USE nlc;

-- Users (the database users)
CREATE USER 'nlc_user'@'localhost' IDENTIFIED BY 'newlifecopenhagen'
CREATE USER 'nlc_user'@'%' IDENTIFIED BY 'newlifecopenhagen'
-- CREATE USER 'nlc_admin'@'localhost' IDENTIFIED BY 'nlCOP11'
-- CREATE USER 'nlc_admin'@'%' IDENTIFIED BY 'nlCOP11'

-- Tables
--	TABLE 'users':
-- 	id 	 	- Should be self explanatory
--	username	- Also explains itself (we require unique usernames)
--	password	- Cleartext passwords are NEVER stored in the table.
--			  All passwords are stored using the SHA(...) function.
--	email		- Email address.
--	first_name	- A user's first name.
--	last_names	- A user's last names.
--	role		- An enum indicating whether the user is a 'guest' or 'host'
--	acl_role	- An enum indicating whether the user is a 'user' or 'admin'
CREATE TABLE users (
	id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) UNIQUE NOT NULL,
	password VARCHAR(40) NOT NULL,

	email VARCHAR(100) NOT NULL,
	-- First name vs. last names (notice the plural).
	-- Ex.: Thomas Bracht Laumann Jespersen becomes:
	-- 	first_name = 'Thomas'
	--	last_names = 'Bracht Laumann Jespersen'
	first_name VARCHAR(50) NOT NULL,
	last_names VARCHAR(100) NOT NULL,

	-- role describes the users' role on the site
	role ENUM("host", "guest") NOT NULL,

	-- acl_role, describes the users' roles 
	acl_role ENUM("user", "admin") NOT NULL
);

-- Grant nlc_user all privileges to the nlc database
GRANT ALL ON nlc.* TO nlc_user;

