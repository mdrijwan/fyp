Basic Instruction for file configuration

This is a server plus client base programme, therefore, you have to run it with  software like Xampp

1) Please Extract the Zip File
2) Get a Xampp Software and add the extracted zip file to you HTDOCS folder

Database Configuration

3) Locate  file " everblaz_minstrument.sql" 
4) Import that �.sql� file into your database using PHP Admin or other means, Note that in my case, i use xampp software, while  name my database  
" everblaz_minstrument ", therefore, it is advisable to name your same way, 
5) Once done you should see list of table understand you database, A typical example  is "category_group"

Note: please locate � config� file under library and check for database configuration just in case you protect your database with password and you name your database as new name rather than everblaz_etech

6) Please locate this line 
@mysql_connect ("localhost", "root", "") or die ('I cannot connect to the database because: ' . mysql_error());
@mysql_select_db ("everblaz_minstrument")  or die("Database is not available, please try again later");

Then you are through with database configuration for the website.

Using Web

There are two main section in the zip folder extracted earlier, these are  user side and the Admin side.

Users Side
1) Locate you index page through web browser example �http://localhost/ccommerce/index.php�
2)  Click on �Enter store� to browse through store and all products can find under "product" drop down menu.
Note: product are still empty, therefore you are advise to upload all product yourself using Admin Panel


Admin Side
1) Go to Link like "http://localhost/assignment/eccommerce/admin/index.php"
2) Username:adim
3)Password:password
2) Click Category: I have Specify Default Category such as Keyboard, Guitar, recording, computer audio and so forth, please choose any category  and  
add sub caterory, this will be notice from you user side website after sucessful- 

Example : Under Keyboard, I Added Keyboard Stand as appear  on web page.

3)Click Product: please choose the category you just created and follow the page for adding product

Important Feild

Category, Name of product, Product Code,  Description (Your full product description), Price, Weight, Quantity, Image (Select Product image from  
anywhere you save it), Specification 1(This is short description under product display on web).

The rest can be feel any how you want.

4) After complete form, Submit and it should appear on you website.

5) Click Order: this allow you to check who order from you though it is not online, it may not that active. but try to complete one order as it will  
redirect you to use paypal payment method, then order  info of user will be available to you

6) Edit Shipping : please use that sectiong to specify  the country that you want to ship online too, Yes is (shipment is available to that country  
and No is not available to that country) typical example of yes is "malaysia Zone 1"

7) Everything mension are important criterial regarding admin side, please feel free to navigate through.



Conclusion

Please browse through webpage to understand how it works, try to purchase an item, though  there can be few error as no system is perfect but i have  
make sure that the system is design with limited error.




Designed with the help of  S.S Adebayo
www.evbteam.com
Email
Public :baioworld@hotmail.com
official : adebayo@everblazingcreation.com

