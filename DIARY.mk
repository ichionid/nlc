NLC DIARY
=========

Welcome to the developer diary, documenting the development experience(s) of the New Life Copenhagen (NLC) project home page.


## Markdown

This document SHOULD be formatted in the Markdown format (see [Markdown] for specifics), or just stick to the form laid down in this file. Double hash (`##`) results in a level 2 header (corresponds to `<h2>...</h2>` in HTML). Listing should be done with `*`, `+` or `-` for unorderedlists and numbered (1., 2., 3., etc.) for -- wait for it -- numbered lists.

If in doubt consult the documentation.

## Format and Guidelines

All "entries" in this diary MUST be of a certain form (for consistency).

 + The title is a level 3 header: `###`
 + The title follows the form:
	### DD/MM/YEAR | Title
 + The entries are made in reverse chronological order, meaning you insert a new entry above all the other ones.
 + If there are several topics in one day's entry, don't be afraid to make several entries with the same date. Then the title of the entry will carry a much fuller explanation about the topic of the entry.
 + Please write nice descriptions and explanations.

## DIARY

### 28/07/2011 | Styling

Changes:
 + login form now has styling in nlc/public/css/site.css. This styling is specific to the login form, but some elements could be generalised
 + class SiteNavigation in nlc/application/views/helpers/SiteNavigation.php is tidier. Introduced __construct() and a few helper functions.
 + text shadow has been added to the siteheader (CSS)
 + in nlc/application/layouts/scripts/layout.phtml: the pipe '|' between siteNavigation() and loggedInUser() is inserted here. The functions siteNavigation() and loggedInUser() should never {ap,pre}prend '|'.
 + links are styled globally (this may need to change).

### 28/07/2011 | 'admin-module' merged into 'master'

I merged the 'admin-module' branch into the the 'master' branch - the module seems stable enough so we can allow further development to take place in the 'master' branch.

### 28/07/2011 | Database definition

I began working on a better database definition for the project, namely the users database. There are some resources on MySQL databases worth remembering:

 + MySQL 5.1 Reference Manual: http://dev.mysql.com/doc/refman/5.1/en/
 + Web developer notes (has other tutorials):
   http://www.webdevelopersnotes.com/tutorials/sql/mysql_online_tutorial_column_types_part_2.php3
 + About database design mistakes: http://www.simple-talk.com/sql/database-administration/ten-common-database-design-mistakes/

For now I've created a 'scripts' folder at nlc/, which contains 'schema.mysql.sql' that defines the database from scratch (creating database, tables, users, privileges, etc). I created a git branch 'database' to work out the database without affecting the rest of development. The idea is to integrate the new database design fully before merging into master.

### 27/07/2011 | Zend_Acl

At the time of writing I'm working on the admin module, trying to get Zend_Acl to reject anyone trying to access the /admin module (and anything in that subtree), who's not logged in AND not use 'thomas' (he's admin for now).

### 27/07/2011 | Admin module

I have decided to create an admin module as the functionality of the admin section of the site should be separate from the users'. The following commands were issued:

$ zf create module admin
$ zf create controller Index admin

Creating an index controller in any module seems like the logical thing to do, but this is apparently not the default behaviour. Also, from what I can read, when dealing with users, we just need to mark the admin module as "privileged the admin users" to restrict access to all controllers and actions within it (this should be easy to implement).

Note to self: If you use zsh, a good rule of thumb is to double quote the optional parameters for zf, otherwise they might get ignored.

Note to self: I created a git branch to work on the admin module. The intention is to rebase the entire thing onto the master branch once it's functional.

### 27/07/2011 | Birthday!

The birthday of this diary. Got sick of README, DOCUMENTATION, BLABLA - I want a diary, because then I can write what I please. Sometimes I tell long stories of how stupid stuff works, or rather doesn't work.

At other times I'll want to make a note of something, in which case I'll jot it down here. Development related topics will definitely go in here.

I will allow several diary entries in one day, to encourage entries separated into topics - rather than one entry per day.

[Markdown]: http://daringfireball.net/projects/markdown		"Markdown"
