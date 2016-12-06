**Welcome to RIJWAN MUSIC STORE, a full-fledged ecommerce website**

![Rijwan Music Store](https://github.com/mdrijwan/fyp/blob/master/Reports/RMS.jpg)

# Basic Instruction for Configuration

This is a client-server based programme, therefore, you have to run it with  software like Xampp

* Please Extract the Zip File (`fyp.rar) or clone the repo.
* Get a Xampp Software and add the extracted zip file to you `htdocs` folder

## Database Configuration

* Locate the file `rijwan_fyp`
* Import that `.sql` file into your database using PHP Admin or other means, Note that in my case, i use xampp software, while naming my database as `rijwan_fyp`, therefore, it is advisable to name your same way,
* Once done you should see the list of tables in your database, A typical example  is "category_group"

>Note: please locate config file under library and check for database configuration just in case you protect your database with password and you name your database as new name rather than `rijwan_fyp`

* Cretae the connection.php and name it accordingly which can be found under `Connections` folder
* Then locate this line where the hostname and database will be defined. 

```
@mysql_connect ("localhost", "root", "")
@mysql_select_db ("rijwan_fyp")
```
### Using Web

There are two main section in the zip folder extracted earlier, these are User side and the Admin side.

**Users Side**

* Locate you index page through web browser, example `http://localhost/fyp/index.php`
* Click on `Enter RMS` to browse through clearance Items. All the products can be found under "Products" drop down menu.

**Admin Side**

* Go to Link like `http://localhost/fyp/admin/index.php`
Username: adim
Password: password

* Click Category: I have specified Default Categories such as Keyboard, Guitar, Recording, Computer Audio and so forth. You can choose any category and add sub-caterory as you wish, it will be reflected to the user side website afterwards.

>Example : Under 'Keyboard' Category, I Added 'Keyboard Stand' as a product on web page.

* Click Product: You can choose the category you just created and follow the page for adding product

### Important Field

Category, Name of Product, Product Code,  Description (This is the full description under product display on web), Price, Weight, Quantity, Image (Select Product image from ../images/products), Specification 1 (This is short description under product display on web).

The rest can be filled as desired.

* After completing the form, Submit and it should appear on the website.

* Click Order: This allows to check order status in details.

* Edit Shipping : This allows to specify the country that you want to ship online. e.g. 'Yes' (Shipping is available to that country) and 'No' (Shipmping is not available to that country). e.g. typical example of yes is "Malaysia Zone 1"

## Conclusion
Everything is working nicely and all the functional requiremnts have been fulfilled

>Designed with the help of Adobe Dreamweaver for some parts.



**Md Rijwan Razzaq Matin | All Rights Reserved**

![RMS Logo](https://github.com/mdrijwan/fyp/blob/master/images/rmslogo.jpg)
