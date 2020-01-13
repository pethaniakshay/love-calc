<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Love Calculator</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/stylesheet.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>



<script language = "javascript" type = "text/javascript">
    var request = false;

    try
    {
        request = new XMLHttpRequest();
    }
    catch (trymicrosoft)
    {
        try
        {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (othermicrosoft)
        {
            try
            {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (failed)
            {
                request = false;
            }
        }
    }

    if (!request)
        alert("Error initializing XMLHttpRequest!");

    function updateDiv(person1, person2)
    {
        var url = "calc.php";
        var params = "p1=" + person1 + "&p2=" + person2;
        request.open("POST", url, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.setRequestHeader("Content-length", params.length);
        request.setRequestHeader("Connection", "close");
        request.onreadystatechange = function()
        {
            if (request.readyState == 4 && request.status == 200)
            {
                var response = request.responseText;
                document.getElementById('targetDiv').innerHTML = response + "%               ";
            }
        }

        request.send(params);
    }
    //-->
</script>







<br/>
<div class="container-fluid">
    <header class="row">
        <div class="col-md-offset-1 col-md-10">
            <img src="img/logo-1.png" class="img-responsive">
        </div>
    </header>
    <br/>

    <form name="test" target="#">
        <div class="row">
            <div class="col-md-12">
                <div class="form-inline text-center">
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-heart"></span></div>
                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Boy" name="p1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-heart"></span></div>
                            <input type="text" class="form-control" id="exampleInputAmount" placeholder="Girl" name="p2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <br/>

        <div class="row">
            <div class="col-md-12">
                <div class="text-center h1">
                    <span style="color: white" id ="targetDiv">0 %</span>
                </div>
            </div>
        </div>
        <br/>
        <br/>

        <div class="row">
            <div class="col-md-12">
                <div class="text-center" >
                    <button type="button" class="btn btn-warning" onclick = "updateDiv(p1.value, p2.value)">Calculate Your Love</button>
                </div>
            </div>
        </div>
    </form>

</div>





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>