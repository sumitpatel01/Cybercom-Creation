<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajax</title>
    
</head>
<body>
    <input type="submit" name="submit" onclick="load()">
    <div id="adiv"></div>
    <script>

    function load() {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }
        console.log(xmlhttp);
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 || xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
                document.getElementById('adiv').innerHTML = xmlhttp.responseText;
            }
        }

        xmlhttp.open('get','include.in.php',true);
        xmlhttp.send();
    }
    
    </script>
</body>
</html>