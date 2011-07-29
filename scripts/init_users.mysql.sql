-- File: init_users.mysql.sql
--
-- Purpose: Create the basic table in nlc.users
--
-- Usage: mysql -B -u root -p < init_users.mysql.sql
--
-- NOTE: Once the tables have been created the users are expected to change
-- their passwords, because writing them explicitly here is dangerously unsafe.

USE nlc;

INSERT INTO users VALUES (
	NULL,				-- id
	'laumann',			-- username
	SHA('brassmonkey'),		-- store the SHA of password (this is not safe)
	'laumann.thomas@gmail.com',	-- email
	'Thomas',			-- first_name
	'Bracht Laumann Jespersen',	-- last_names
	'host',				-- enum('host','guest')
	'admin'				-- enum('user','admin')
);

INSERT INTO users VALUES (
	NULL,
	'giannis',
	SHA('gman'),
	'ichionid@gmail.com',
	'Chionidis',
	'Ioannis',
	'host',
	'admin'
);

INSERT INTO users VALUES (
	NULL,
	'diana',
	SHA('dianabelea'),
	'belea.diana@gmail.com',
	'Diana',
	'Belea',
	'host',
	'user'
);

INSERT INTO users VALUES (
	NULL,
	'theguest',
	SHA('theguest'),
	'noemail@foo.com',
	'Brass',
	'Monkey',
	'guest',
	'user'
);
