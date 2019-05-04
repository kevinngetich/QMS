<html>
    <head>
        <title>Dummy Redirect Page</title>
    </head>
    <body>
        <p>Error: <?php session_start(); echo $_SESSION['fuck'];?></p>
        <!--script lang="JavaScript">
            function processUser()
              {
                alert("Break 1");
                var parameters = location.search.substring(1).split("&");
                alert(parameters);
                var temp = parameters[0].split("=");
                l = unescape(temp[1]);
                alert(l);
                temp = parameters[1].split("=");
                alert("Break 3.5");
                p = unescape(temp[1]);
                alert("Break 4");
                document.getElementById("queryid").innerHTML = l;
                document.getElementById("sender").innerHTML = p;
                alert("Break 5");
              }
                //alert("l + p");
                //processUser();
                //alert("This is an alert");
        </script-->
        <h1>This is a test page</h1>
        <script language="JavaScript">
              
        </script>
        
    </body>
</html>