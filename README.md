Arma 2 and Arma 3 Squad Management Site
================================

A PHP based admin and user management panel for Arma 2 / Arma 3 squads


Requirements
--------------
- A web host running an Apache server that allows for PHP, prefferably PHP 5 or higer
- A MySQL database

Installation
--------------
The installation is simple:
- Upload all the files to your web directory
- Import the sql.sql file found in the sql folder to your mysql database
- Configure the config.php to your liking
- Drop your squad.xml file in the main directory, make sure it's named squad.xml! This is important!
- Drop your squad logo in the main directory, having the name you configured in the config.php
- Drop the squad logo image that will show in game(The logo.paa / logo.tga or logo.jpg file) in the main directory
- Remove inc/password_generator.php unless you need it's functionality for the time being

More instructions can be found here: http://community.bistudio.com/wiki/squad.xml 

password_generator.php
--------------
- If you need a user to set up an account on the squad page you want to send them a URL looking like this:
http://www.yourdomain.com/index.php?pid=PLAYERID
- Replace PlayerID with the users playerid in the squad.xml
- Remember to remove the includes/password_generator.php if you're not using it!

Issues
--------------
If there are any issues please create a new issue in the "issues" tab or send in a pull request, I'll gladly review them :)
