@isset($urls)
<header>
    <h1 id="header">URL Shortener</h1>
</header>
<a href="{{route('index')}}" ><button type="button" id="home" >Go To Home</button></a>
<h1>Url's</h1>
<div class="col">
       <div class="row">
         <div class="col-sm-12">
           <div class="card-box table-responsive">
             <div class="x_content">
             <table id="urls" class="table table-bordered">
               <thead>
                 <tr>
                   <th>S No.</th>
                   <th>Actual URL</th>
                   <th>Shortened URL</th>
                   <th>Total_Visit</th>
                   <th>Last Visited</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach($urls as $url)
                 <tr class>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $url->actual_url }}</td>
                   <td><a href="{{ request()->getSchemeAndHttpHost().'/su/'.$url->shortened_url }}">{{ request()->getSchemeAndHttpHost().'/su/'.$url->shortened_url }}</a></td>
                   <td>{{$url->total_visit }}</td>
                   <td>{{$url->updated_at }}</td>
                 </tr>
                 @endforeach
               </tbody>
             </table>
           </div>
           </div>
         </div>
       </div>
     </div>
   @endisset
   <?php
   $query = @unserialize (file_get_contents('http://ip-api.com/php/'));
   if ($query && $query['status'] == 'success') {
       echo("<h2>Current City: ". $query['city']."</h2>");
       echo("<h2>Current Country: ". $query['country']."</h2>");
    }
    ?>
    <h2 id="width"></h2>
    <h2 id="height"></h2>
    <script>
        document.getElementById("width").innerHTML =
        "Screen width : " + screen.width;
        document.getElementById("height").innerHTML =
        "Screen height : " + screen.height;
    </script>
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
   a{
       color:blue;
       text-decoration: none;
   }
   #urls {
     font-family: Arial, Helvetica, sans-serif;
     border-collapse: collapse;
     width: 100%;
   }

   #urls td, #urls th {
     border: 1px solid #ddd;
     padding: 8px;
   }

   #urls tr:nth-child(even){background-color: #f2f2f2;}

   #urls tr:hover {background-color: #ddd;}

   #urls th {
     padding-top: 12px;
     padding-bottom: 12px;
     text-align: left;
     background-color: blue;
     color: white;
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
