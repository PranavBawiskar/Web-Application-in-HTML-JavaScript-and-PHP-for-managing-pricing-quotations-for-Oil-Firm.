# Web-Application-in-HTML-JavaScript-and-PHP-for-managing-pricing-quotations-for-Oil-Firm.
Developed a Web Application for managing the quotations submitted by the client for Oil Delivery.
Contents of the Web-App and highlights are as follows - 
1. Login/Registration Page - Data pushed into SQL DB for new users, and values pulled form DB for old users.
2. Client Profile Page - Client Information was pushed into SQL DB, no repetition of the entries.
3. Fuel Quotation Form - Client was required to submit the Quote. Before submitting the client had the option to check the Fuel quote price. The client also had the option to view his previous quotations. Special restrictions were introduced so that client couldn't select past date.
4. Admin Page - Admin could track all the quotations from the users in a tabulated format. Search options were given to the admin to search by username or/and delivery date.
5. Fuel Pricing Parameters - Admin had the option to edit the parameters that affect the formula of calculating the actual price of the fuel such as company profit factor, seasonal profit factor, discount factor etc. Changes done by Admin were synchronously pushed into the entire system without delay.
6. Fuel Quote History - Admin had the access to this fuel quote history and could search for any quote history using username or/and delivery date.

Special Features 
1. MD5 password Encryption.
2. Navbar to easily navigate from one page to the other.
3. Update Profile option was provided to update profile for old users.
4. Entire system worked on PHP sessions thus no session could have 2 simultaneous users on the same machine, hence users has to logout from one ID to access the portal using another ID.
5. Margin and Cost calculation was done dynamically to account for any changes pushed in by the Admin.
6. Each Client's quote history was saved in a SQL DB so that Admin could retrieve the Data in Fuel Quote History Page.

# HOW TO RUN #
Prerequisites - 
1. Install xampp on your system and paste all the files above in the Htdocs folder in your project name folder.
    The path of the file must look like xampp/htdocs/your_folder
2. In phpmyadmin, the following procedure must be followed:-
    i.  Create a new DB and create 3 tables as admininfo, clientinfo, ratetable.
    ii. In admininfo table,the tables must be as given in the file - admin_image.png
    iii.In ratetable table, the table must be as given in the file - ratetable_image.png
    iv. In clientinfo table, the table must be as given in the file - client_image.png
3. Once everything is done as said above, type localhost/yourprojectname/login.php
4. You are good to go!
