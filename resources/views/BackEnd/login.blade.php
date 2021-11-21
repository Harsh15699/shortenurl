<!DOCTYPE html>
<html>
<head>
<title>Url Shortener</title>
<link rel="icon" href="image/cpl_logo.jpg" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="header.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <header>

</header>

<style>
input[type=text],[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
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

span{
    text-align: center;
}
#error{
    color:red;
}
</style>
<body>
    <header>
        <h1 id="header">URL Shortener</h1>
    </header>
    <a href="{{route('index')}}" ><button type="button" id="home" >Go To Home</button></a>
    <span><?php if(isset($_SESSION['error'])){echo("<h2 id="."error".">".$_SESSION['error']."</h2>");} unset($_SESSION['error']);?></span>
<h1>Admin Login</h1>
<div>
    <form action="{{ route('dashboard') }}" method="post" enctype="multipart/form-data">
        @csrf
    <label for="username">UserName</label>
    <input type="text" id="username" name="username" placeholder="Your username.." required>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Password" required>


    <input type="submit" value="Submit">
  </form>
</div>


</body>
</html>
