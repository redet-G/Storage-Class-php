# Storage-Class-php
This is a PHP storage class for easier execution of database queries.  

first open the Storage.php and configure database infromation. Set the following valiables
~~~     
    private static $user = "root";
    private static $pass = "";
    private static $database_name = "moonlight";
    private static $server = "127.0.0.1";
~~~
# usage

insert statement
~~~
  <?php include 'storage.php';
 
 Storage::exectute("insert into user (username, password) values (? , ?)","ss",[$username,$password]);
 
 ?>
~~~

select statement
~~~
  <?php include 'storage.php';
 
 $result = Storage::exectute("select * from user where id = ?","s",[$id],true);
 $row = $result->fetch_assoc();
 
 ?>
~~~
