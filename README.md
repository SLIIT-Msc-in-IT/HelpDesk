# HelpDesk

This code is for an imaginary IT solutions company by the name of 'FixIT Computer Solutions'. FixIT is a computer solutions company that has been in the market for some time. 
The client provides both software and hardware solutions to customers. Thus far,a manual log of all the software and hardware purchased by each customer has been maintained 
by FixIT. FixIT currently provides four types of services:

1.	Selling licensed Microsoft Office, and Graphics software to customers.
2.	Selling computers (laptops, desktops) and accessories (printers, graphics cards etc.)
3.	Providing solutions to software-related problems.
4.	Providing solutions to hardware related problems.
 
To provide their services in an optimum way and getting rewarded with higher number of successful transactions in the long run, FixIT has decided to invest in an online 
help desk system which will be available for customers 24 hours a day.

The system has been implemented using the following technologies:

* Server-side programming - PHP language
* Client-side programming - JavaScript language
* Database - MySQL
* Web server - Apache

The web server and the database have been implemented as a WAMP server. 

There are three types of users for this system: customer, helpdesk officer, IT officer.

# Summary of the helpdesk usage

A registered (username and password provided by FixIT) customer has a hardware or software related issue and seeks the help of FixIT. The customer logs into the system via the
login interface using the already provided username and password. He/she is presented with an option to create a job for him/herself or for some other registred user. After 
selecting the type he/she wants, the customer is taken to the 'customer dashboard' where he/she can use the menu option 'Create New Job' to create a new job by specifying an 
'item name', 'fault category', and 'fault description'. The successful creation generates a job number.
When the helpdesk officer logs into the system he/she sees the new job and assigns it to an IT officer. The IT officer logs into the system and sees the newly assigned job, 
attends to the job, completes it and sends a 'job complete' confirmation. This updated job status can be seen by all three types of users who have the corresponding job number.

# Versions that have been tested on

WAMP version 3.1.7 
Apache 2.4.37
PHP 7.3.1
MySQL 5.7.24

# Dependencies

Microsoft Visual C++ Redistributable For Windows
vcredist_2008_sp1_x64
vcredist_2008_mfc_x64
vcredist_2012_upd64_x64
vcredist_2013_upd64_x64
vcredist_2019_x64

# Supported operating systems

Windows 7 or higher ,windows 2008 server,windows 2012 server,windows 2016 server or windows 2019 server
ubuntu 18.0 or higher
redhat 6.0 or higher

# installation Steps

* install dependancy software first

  Microsoft Visual C++ Redistributable For Windows vcredist_2008_sp1_x64 vcredist_2008_mfc_x64 vcredist_2012_upd64_x64 vcredist_2013_upd64_x64 vcredist_2019_x64

  ![image](https://user-images.githubusercontent.com/79468171/116651276-7a7ff600-a9a0-11eb-83aa-5882fea46974.png)


  

* Install wamp server 3.1.7


 
* check weather the wamp server runing all service and apache ,mysql,php version

  ![image](https://user-images.githubusercontent.com/79468171/116650519-ec574000-a99e-11eb-93d6-2fd98fe1cac2.png)
  
  ![image](https://user-images.githubusercontent.com/79468171/116651600-2e818100-a9a1-11eb-89aa-3f3b937c95a1.png)


* copy the folder hepdesksliit folder in to wamp64\www path

  ![image](https://user-images.githubusercontent.com/79468171/116651734-7b655780-a9a1-11eb-8702-d83263c89596.png)

* change the the mysql username,password and the servername in to the dbconfig.php file 
* create database as helpdesk and import backup file in DB folder.
* Then browse the system using the url http://localhost/HelpDeskSliit





