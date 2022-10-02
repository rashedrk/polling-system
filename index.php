<?php 

//PHP for server side data entry
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "online_polling";
    $conn = mysqli_connect($servername,$username,$password,$database_name);
// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
//variable declare
    $uid='';
    $errors = array(); 

    if(isset($_POST['submit'])){
        
        $uid = $_POST['uid'];
        $food = $_POST['food'];

    } 
    
    $user_check_query = "SELECT * FROM vote WHERE uid='$uid' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    if ($user) { 
        if ($user['uid'] === $uid) {
          array_push($errors, "you submitted already");
        }
      }
    if (count($errors) == 0) {
        if(!empty($uid) && !empty($food)){
        
            $sql_query = "INSERT INTO vote (uid,food) VALUES ('$uid','$food')";
                if($conn->query($sql_query) == TRUE){
                header("Location:result.php");
                exit();
            
         } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="box mt-5 p-4">
            <?php  if (count($errors) > 0) : ?>
                            <div class="error">
                                <?php foreach ($errors as $error) : ?>
                                <p><?php echo $error ?></p>
                                <h5>see the result</h5>
                                <?php endforeach ?>
                            </div>
            <?php  endif ?>
            <form action="" method="post">
                <h3 class="mb-4 text-center">VOTE FOR YOUR FAVOURITE FOOD</h3>
                <div class="mb-3">
                    <label for="name" class="form-label">Enter Your UID</label>
                    <input class="form-control" name="uid" type="text">
                </div>
                <div class="mb-3">
                    <h4>Your Favourite Food?</h4>
                    <input class="form-check-input" type="radio" name="food" value="Panta Ilish" id="Panta_Ilish">
                    <label class="form-check-label" for="Panta_Ilish"><h5>Panta Ilish</h5></label> <br>
                    <input class="form-check-input" type="radio" name="food" value="Kacchi Biryani" id="Kacchi_Biryani">
                    <label class="form-check-label" for="Kacchi_Biryani"><h5>Kacchi Biryani</h5></label> <br>
                    <input class="form-check-input" type="radio" name="food" value="Morog Polao" id="Morog_Polao">
                    <label class="form-check-label" for="Morog_Polao"><h5>Morog Polao</h5></label> <br>
                    <input class="form-check-input" type="radio" name="food" value="Seekh Kebab" id="Seekh_Kebab">
                    <label class="form-check-label" for="Seekh_Kebab"><h5>Seekh Kebab</h5></label> <br>
                    <input class="form-check-input" type="radio" name="food" value="Grill Chicken With Naan Roti" id="Grill_Chicken_With_Naan_Roti">
                    <label class="form-check-label" for="Grill_Chicken_With_Naan_Roti"><h5>Grill Chicken With Naan Roti</h5></label> <br>
                </div>
                <div>
                    <input type="submit" value="submit" name="submit" class="btn btn-success">
                    <a class="ms-1 btn btn-primary" href="result.php">View Result</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>