<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <style>
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
        button {
          width: 100%;
          background-color: blue;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        button:hover {
          background-color: #45a049;
        }
        </style>
    </head>
    <body>
        <header>
            <h1 id="header">URL Shortener</h1>
      </header>
      <a href="{{route('signup')}}"><button type="button" >User</button></a>
      <a href="{{route('adminLogin')}}"><button type="button">Admin</button></a>
    </body>
</html>
