<!DOCTYPE html>
<html>
<head>
<title>Url Shortener</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
input[type=text], select {
  width: 70%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 70%;
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  text-align: center;
  padding: 20px;
}
header{ /*makes header border solid black*/
	background-color: #FFC0CB;
	box-shadow: 50px 10px 5px #009dff;
}
body{
    background-color: #b4e2ae;
}
#header{
  color:#ffffff;
  font-size: 400%;
  text-align: center;
}
a{
    color:blue;
    text-decoration: none;
    font-size: 125%;
}
span{
    text-align: center;
}
#error{
    color:red;
}
#home {
  width: 10%;
  background-color: blue;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

#home:hover {
  background-color: #45a049;
}
</style>
</head>
<body>
  <header>
      <h1 id="header">URL Shortener</h1>
</header>
<a href="{{route('index')}}" ><button type="button" id="home" >Go To Home</button></a>
<span><?php if(isset($_SESSION['error'])){echo("<h2 id="."error".">".$_SESSION['error']."</h2>");} unset($_SESSION['error']);?></span>
<div>
   <form action="{{ route('saveUrl') }}" method="post" enctype="multipart/form-data">
        @csrf
    <input type="text" id="url" name="url" placeholder="Enter Url here...">
    <input type="submit" value="Submit">
  </form>
</div>
<div>
    <?php
        if(isset($_SESSION['actual_url'])&&isset($_SESSION['shortened_url'])){
            echo("<h2>Actual Url:</h2><a href=".$_SESSION['actual_url'].">".$_SESSION['actual_url']."</a>");
            echo("<h2>Shortened Url:</h2><a href=".$_SESSION['shortened_url'].">".$_SESSION['shortened_url']."</a>");
        }
    ?>
    <br>
    <h2>Go to Statistic Dashboard</h2>
    <a href="{{ route('userDashboard')}}">Dashboard</a>
</div>
</body>
</html>
