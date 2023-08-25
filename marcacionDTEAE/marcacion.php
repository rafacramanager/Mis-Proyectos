<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marcación Diaria</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results {
            padding: 20px;
            border: 1px solid;
            background: #ccc;
        }
    </style>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

    <div class="container fluid" align="center">
        <br><br><br><br>
        <img class="img fluid" src="img\logo-mined-2022.png" alt="" width="350px">
        <h1 class="text-center">Marcación Diaria</h1>
        <form method="POST" action="storeImage.php">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Seleccione la fecha:</label>
                        <input type="date" class="form-control">
                    </div>
                    <div id="my_camera"></div>
                    <br />
                    <input type=button value="Take Snapshot" onClick="take_snapshot()">
                    <input type="hidden" name="image" class="image-tag">
                </div>
                <div id="results">Your captured image will appear here...</div>
                <div class="col-md-6">
                    <div class="col-md-12 text-center">
                        <br />
                        <button class="btn btn-success">Realizar marcación</button>
                    </div>
                </div>
        </form>
    </div>

    <!-- Configure a few settings and attach camera -->

    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
</body>

</html>