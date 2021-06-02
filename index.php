<?php

require_once("process.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating System with Ajax</title>

 <!-- font-aswome cdn -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" integrity="sha512-EaaldggZt4DPKMYBa143vxXQqLq5LE29DG/0OoVenoyxDrAScYrcYcHIuxYO9YNTIQMgD8c8gIUU8FQw7WpXSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
 <!-- bootstrap4.5.3 cdn css files -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- ajax cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- bootstrap cdn -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


<style>

.star-rating{
    
    margin-top: 20px;
    margin-left: 10px;
    line-height: 32px;
    font-size: 1.25rem;
}

.star-rating .fa-star{
    color: yellow;
}

</style>

</head>
<body>

   <h1> <u>Rating System With Ajax</u></h1> 

<div class="container">

<?php 

$test="SELECT id FROM rate WHERE user_id='2'";

$result=$conn->query($test);

$row=$result->fetch_assoc();

$data=$row["id"];



?>

<div class="row">

    <div class="col-lg-2">

        <div class="star-rating">

            <span class="fa <?php if($data>=1){echo "fa-star";} ;?> fa-star" data-rating="1" onclick="getRating(1)"></span>
            <span class="fa <?php if($data>=2){echo "fa-star";} else{echo  "fa-star-o";};?>" data-rating="2" onclick="getRating(2)"></span>
            <span class="fa <?php if($data>=3){echo "fa-star";} else{echo  "fa-star-o";};?>" data-rating="3" onclick="getRating(3)"></span>
            <span class="fa <?php if($data>=4){echo "fa-star";} else{echo  "fa-star-o";};?>" data-rating="4" onclick="getRating(4)"></span>
            <span class="fa <?php if($data>=5){echo "fa-star";} else{echo  "fa-star-o";};?>" data-rating="5" onclick="getRating(5)"></span>
           
        </div>

    </div>

</div>
</div>

<script type="text/javascript">

function getRating(rating){
 
$(".fa").each(function(){

   var value = $(this).data('rating'); 

   if (value<=rating) {
    
    $(this).removeClass('fa-star-o').addClass('fa-star');

   } else {
    
    $(this).removeClass('fa-star').addClass('fa-star-o');

   }

});


$.ajax({

type : "post",
url:"process.php",
data: {

    id: rating,
    user_id: 2
}

});

}

</script>



</body>
</html>