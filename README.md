TODO LIST
=========

This is a very very basic todo list and is not finished, there are some functionalities that are missing and other are not working correctly.
The idea is create an API with three end points get, post and put (delete is missing).
Create the client side and interact with the api.
The technologies involucrated are vagrant and virtualbox for the environment, so you need to download and install them; 
plus php with zf2, mysql, jQuery, bootstrap, datatables and that's it.

#BUGS
Each time that you insert a new Animal you need to refresh the page, is something related with the datatable, but __the time eat me__.
This is not a bug but is not complete, I mean, the edit action (the logic in the backend is almost done) but I need to include functionality when click the edit button in the datatable.

#BAD THINGS:
There are many things that I need to improve, but this are the most prominent
* Incomplete Unit Test
* Better use of the config files
* Not use the minimify technique for js files 
* Not use the compile technique to increase the performance of js files
* And the list goes on...

#WHAT YOU NEED?
1. You need to run all the vagrant things (vagrant init & vagrant up).
2  Then vagrant ssh and make sure you have php, nginx, mysql once that you up your virtual machine (sudo service daemon status) if not you need to install them.
3  Move to the root path of the application and run composer install
4. Then you need to create a mysql table

```
DROP TABLE IF EXISTS `tiempo`.`Animals` ;
CREATE TABLE IF NOT EXISTS `tiempo`.`Animals` (
`id` INT NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(255) NULL ,
`status` TINYINT(1) NULL ,
PRIMARY KEY (`id`) ,
UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = MyISAM;
```
5. This is the url http://tiempo.webchallange.com/Animal/Animalclient, so yeah, you need to create a vhost like that, I know is awful, but don't worry I will change it.
6. If you wish you can test the API with curl, remember curl is your friend.

```
get-list
curl -i -H "Accept: application/json" http://tiempo.webchallange.com/api/Animal
create
curl -i -H "Accept: application/json" -X POST -d "name=AC DC&status=1" http://tiempo.webchallange.com/api/Animal
```

#IMAGE OF THE RESULTED WORK
![alt text][todo]

[todo]: https://github.com/martinn21/todo-list/blob/master/public/img/system.png "System"

I think that's it. See you and visit me in mmmh... the next days and I will change some things here :p
Thank you and see you around.