<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>معجم الكتروني</title>

  



    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" >

</head>
<body>

<form method="GET" > 


<section class="search">
 
    <img src="2-removebg-preview.png" alt="معجم الكتروني">

    <!-- <div>
        <p class="pp">البحث عن طريق</p>
    </div> -->
    
   
    
    <div>
        <input type="search" placeholder="البحث في  المعجم" name="search" dir="rtl"
>
    </div>

    <div >
       <button type="submit" name="mofrad" >المفردة</button>
       <button type="submit" name="m9yas"  >المقياس</button>
       <button type="submit" name="S" >السداسي</button>
       <button type="submit" name="S" >أعمى</button>

    </div>

</section>



<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=information;",$username,$password);

if(isset($_GET['mofrad']  )){
$SEARCH = $database->prepare("SELECT * FROM master WHERE Mofrada LIKE :value ");
$SEARCH_VALUE = "%".$_GET['search']."%";

$SEARCH->bindParam("value",$SEARCH_VALUE);
$SEARCH->execute();

foreach($SEARCH AS $data){

  echo '<div class="dataall">
  <section class="bord">
  <p class="title"> '.$data['Mofrada'] .'</p>
  <p> '.$data['Shar7'] .'</p>
   <div class="no"><h6>'.$data['Somaster'] .'</h6>
  <h6>'.$data['M9yas'] .'</h6>
  </div>
</section>
  
</div>
';









}
}

else if(isset($_GET['S']  )){
  $SEARCH = $database->prepare("SELECT * FROM master WHERE Somaster LIKE :value ");
  $SEARCH_VALUE = "%".$_GET['search']."%";
  
  $SEARCH->bindParam("value",$SEARCH_VALUE);
  $SEARCH->execute();
  
  foreach($SEARCH AS $data){
  
    echo '
    <div class="dataall">
    <div class="bord">
    <p class="title"> '.$data['Mofrada'] .'</p>
    <p> '.$data['Shar7'] .'</p>
     <div class="no"><h6>'.$data['Somaster'] .'</h6>
    <h6>'.$data['M9yas'] .'</h6>
    </div>
  </div>
  </div>

    
 
  ';
  
  }
  }

  else if(isset($_GET['m9yas']  )){
    $SEARCH = $database->prepare("SELECT * FROM master WHERE M9yas LIKE :value ");
    $SEARCH_VALUE = "%".$_GET['search']."%";
    
    $SEARCH->bindParam("value",$SEARCH_VALUE);
    $SEARCH->execute();
    
    foreach($SEARCH AS $data){
    
      echo '<div class="dataall">
      <div class="bord">
      <p class="title"> '.$data['Mofrada'] .'</p>
      <p> '.$data['Shar7'] .'</p>
       <div class="no"><h6>'.$data['Somaster'] .'</h6>
      <h6>'.$data['M9yas'] .'</h6>
      </div>
    </div>
      
    </div>
    ';
    
    }
    }
    else if(isset($_GET['a3ma']  )){
      $SEARCH = $database->prepare("SELECT * FROM master WHERE M9yas LIKE :value OR Somaster LIKE :value OR Shar7 LIKE :value OR Mofrada LIKE :value ");
      $SEARCH_VALUE = "%".$_GET['search']."%";
      
      $SEARCH->bindParam("value",$SEARCH_VALUE);
      $SEARCH->execute();
      
      foreach($SEARCH AS $data){
      
        echo '<div class="dataall">
        <div class="bord">
        <p class="title"> '.$data['Mofrada'] .'</p>
        <p> '.$data['Shar7'] .'</p>
         <div class="no"><h6>'.$data['Somaster'] .'</h6>
        <h6>'.$data['M9yas'] .'</h6>
        </div>
      </div>
        
      </div>
      ';
      
      }
      }
?>

</body>
</html>