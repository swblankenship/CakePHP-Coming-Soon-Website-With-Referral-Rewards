# CakePHP-Coming-Soon-Website-With-Referral-Rewards
This is a full cakephp application that serves as a responsive coming soon website, complete with unique referral id's and sharing counter in the database so you can track how many times someone has referred a new signup.

Requirements
	You’ll need a solid working knowledge of CakePHP, and you’ll need a full Apache, PHP, MySQL stack installed on your machine.  Once you get the application up and running it’s very easy to customize to fit your brand.  

Features
	The site is fully responsive, simply and easy to customize. When someone signup by adding their email address, the email is stored in the database and the user is given a unique share code url that they are then prompted to share with other people.  There is a text area where you can explain the incentive for sharing.  When they share this code, and one of their friends clicks on the link and then signs up, the total share number for the referring user goes up by one point.  The new signup as well as the referrer will then receive an email confirming the activity.  

	When you launch your beta application, you can use this username/sharecode/share total information to reward users in a way that makes sense for your project.  Good luck!

Screenshots of site
	Homepage: http://swblankenship.com/wp-content/uploads/2015/09/Homepage.png
	Homepage - Mobile: http://swblankenship.com/wp-content/uploads/2015/09/Homepage-Mobile.png
	Signup Confirmation: http://swblankenship.com/wp-content/uploads/2015/09/Confirmation.png
	About Us: http://swblankenship.com/wp-content/uploads/2015/09/About-Us.png
	
****INSTRUCTIONS**
INTALLING
	1. copy all github files into a folder called app then Install the app folder like you would with any other CakePHP application (install CakePHP and replace the app folder with the one you just created).

DATABASE
	1. Go to Config/ and install coming_soon_db.sql to your MySQL database.  This will create a new database.
	2. Go to Config/ and open database.php.  Then change the username, password and name of your new database

EMAIL
	1. Go to sendgrid.com and signup for an account.
	2. Go to Config/ and open email.php file, then add your sendgrid credentials to the $sendgrid array.
	3. Go to Controllers/ and open SignupsController.php, then change the the message and subject line of the two email functions.
	
SOCIAL MEDIA & Google Analytics
	1. Go to View/Elements and open body-top.ctp.  Then add your Facebook app code and your GA code
	2. then open social_linking.ctp and adjust the Facebook page and twitter page in the code

COPY
	1. To adjust the Title on every page, go to View/Elements and open title.ctp and edit copy.
	2. Copy and metadata for all other pages is under View/Signups

BACKGROUND IMAGE
	1. put your new image in webroot/img
	2. Go to Config/ and open bootstrap.php.  Then update the file name for background_image.
	3. Go to webroot/js and open site.js.  Then change the string for both variable img and imgtall (imgtall will allow you to set a different image for small window displays if your image doesn’t look good in that aspect   



