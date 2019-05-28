<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//Get All Customers
$app->get('/api/customers', function(Request $req, Response $res){
 //echo 'Customers';
 $sql = "SELECT * FROM customers";

 try{
    //GET DB Object
    $connection = new connection();

    $connection = $connection->connect();

    $stmt = $connection->query($sql);

    $customers = $stmt->fetchAll(PDO::FETCH_OBJ);
    $connection = null;

    echo json_encode($customers);
 }catch(PDOException $error){
    echo '{"error":{"text": '.$error->getMessage().'}';
 }
});

//Get Single Customer
$app->get('/api/customer/{id}', function(Request $req, Response $res){
  $id = $req->getAttribute('id');

  $sql = "SELECT * FROM customers WHERE ID = $id";

  try{
    //Get DB Object
    $connection = new connection();

    $connection = $connection->connect();

    $stmt = $connection->query($sql);

    $customer = $stmt->fetchAll(PDO::FETCH_OBJ);

    $connection = null;

    echo json_encode($customer);
  }catch(PDOException $error){
    echo '{"error": {"text": '.$error->getMessage().'}';
  }
});

//Add a customer
$app->post('/api/customer/add', function(Request $req, Response $res){
  $name = $req->getParam('name');
  $surname = $req->getParam('surname');
  $address = $req->getParam('address');
  $city = $req->getParam('city');
  $province = $req->getParam('province');
  $phone = $req->getParam('phone');
  $email = $req->getParam('email');

  $sql = "INSERT INTO customers (name, surname, address, city, province, phone, email) VALUES(:name, :surname, :address, :city, :province, :phone, :email)";

  try{
    $connection = new connection();

    $connection = $connection->connect();

    $stmt = $connection->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    echo '{"notice":{"text": "Customer added"}';
  }catch(PDOException $error){
    echo '{"error":{"text":'.$error->getMessage().'}';
  }

});

//UPDATE customer
$app->put('/api/customer/update/{id}', function(Request $req, Response $res){
  $id = $req->getAttribute('id');

  $name = $req->getParam('name');
  $surname = $req->getParam('surname');
  $address = $req->getParam('address');
  $city = $req->getParam('city');
  $province = $req->getParam('province');
  $phone = $req->getParam('phone');
  $email = $req->getParam('email');

  $sql = "UPDATE customers SET
     name = :name,
      surname = :surname,
      address = :address,
      city = :city,
      province = :province,
      phone = :phone,
      email = :email WHERE ID = $id";

  try{
    $connection = new connection();

    $connection = $connection->connect();

    $stmt = $connection->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':province', $province);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);

    $stmt->execute();

    echo '{"notice":{"text": "Customer updated"}';
  }catch(PDOException $error){
    echo '{"error":{"text":'.$error->getMesage().'}';
  }
});

//Delete Customer
$app->delete('/api/customer/delete/{id}', function(Request $req, Response $res){
  $id = $req->getAttribute('id');

  $sql = "DELETE FROM customers WHERE ID = $id";

  try{
    //Get DB Object
    $connection = new connection();

    $connection = $connection->connect();

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $connection = null;

    echo '{"notice":{"text": "Customer deleted"}';
  }catch(PDOException $error){
    echo '{"error": {"text": '.$error->getMessage().'}';
  }
});