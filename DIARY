NLC DIARY
=========

Welcome to the developer diary, documenting the development experience(s) of the New Life Copenhagen (NLC) project home page.


## Markdown

This document SHOULD be formatted in the Markdown format (see [Markdown] for specifics), or just stick to the form laid down in this file. Double hash (##) results in a level 2 header (corresponds to `<h2>...</h2>` in HTML). Listing should be done with `*`, `+` or `-` for unorderedlists and numbered (1., 2., 3., etc.) for -- wait for it -- numbered lists.

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
