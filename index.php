<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Calculadora</title>
</head>

<body>

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-5 m-auto bg-light p-5 rounded">
                <div class="m-auto col-9">
                    <h2> Calculadora</h2>
                    <form method="post" action="" id="formID">
                        <input type="text" name="value" id='btnValue' class="form-control" readonly> <br>
                        <div>
                            <div class="row">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="9" name="btn1">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="8" name="btn2">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="7" name="btn3">
                                <input type="button" class="col-2 m-1 btn btn-warning" value="+" name="btn4">
                            </div>

                            <div class="row">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="6" name="btn5">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="5" name="btn6">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="4" name="btn7">
                                <input type="button" class="col-2 m-1 btn btn-warning" value="-" name="btn8">
                            </div>
                            <div class="row">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="3" name="btn8">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="2" name="btn9">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="1" name="btn10">
                                <input type="button" class="col-2 m-1 btn btn-warning" value="/" name="btn11">
                            </div>
                            <div class="row">
                                <input type="button" class="col-2 m-1 btn btn-secondary" value="0" name="btn12">
                                <input type="button" class="col-2 m-1 btn btn-warning" value="X" name="btn13">
                                <input type="button" class="col-2 m-1 btn btn-warning" value="%" name="btn14">
                                <input type="button" class="col-2 m-1 btn btn-warning" value="^" name="btn15">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4"><a class="btn  btn-success" id="calcular">Calcular</a></div>
                            <div class="col-4"><input value="Borrar" type="reset" class="btn btn-dark"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>





        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script>
            $('input[type=button]').on('click', function() {
                if ($('#btnValue').val() == '') {
                    $('#btnValue').val($(this).val());
                } else {
                    $('#btnValue').val($('#btnValue').val() + ($(this).val()));
                }

            })

            $('#calcular').on('click', function() {


                $.ajax({
                    type: 'POST',
                    url: 'calcular.php',
                    dataType: "json",
                    data: {
                        cadena: $('#btnValue').val()
                    },
                    success: function(data) {
                        if (data.status == 'ok') {
                            $('#btnValue').val(data.respon);
                        } else {
                            alert("Algo salio mal");
                        }
                    }

                });
            });
        </script>
</body>

</html>