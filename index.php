<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie 4</title>
    <script>
        function getUpdateDbResponse(){
            fetch('updateDb.php')
                .then(
                    function(response) {
                        if (response.status !== 200) {
                            console.log('Looks like there was a problem. Status Code: ' +
                                response.status);
                            return;
                        }

                        // Examine the text in the response
                        response.json().then(function(data) {
                            console.log(data);
                            alert(data.msg);
                        });
                    }
                )
                .catch(function(err) {
                    console.log('Fetch Error :-S', err);
                });
        }
    </script>
</head>
<body>

    <button onclick="getUpdateDbResponse()">Uppdate</button>

</body>
</html>
