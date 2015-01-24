<html>
<head>

</head>
<body>
<script type = "text/javascript" src = "jquery-1.10.1.min.js">
</script>
<script type="text/javascript">

    $(document).ready(function(){

        $("button").click(function(){
            $.post("login_test.php", document.getElementById('textbox_id').value, function(){
                alert("Data: " +  );
            });
        });
    });

</script>

<h1> Nova ucitana strana </h1>

    First name: <input type="text" name="userName" id="userName" ><br>
    Last name: <input type="password" name="password" id="password"><br>
<button id="button">A button element</button>

<p>Click the "Submit" button and the form-data will be sent to a page on the server called "demo_form.asp".</p>


<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 1/24/2015
 * Time: 11:08 AM
 */

?>

</body>

</html>
