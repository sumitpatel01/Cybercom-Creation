<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>auto suggest</title>
    <script>

    function findmatch() {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
        }

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('results').innerHTML =xmlhttp.responseText;
            }
        }

        xmlhttp.open('GET','search.inc.php?search='+document.search.search.value,true);
        xmlhttp.send();
    }
    
    </script>
</head>
<body>
    <form index='anotherpage.php' method='GET' id="search" name="search">
    Type a name : <br>
    <input type="text" name="search" id="search" onkeyup="findmatch()">
    </form>
    <div id="results"></div>
</body>
</html>