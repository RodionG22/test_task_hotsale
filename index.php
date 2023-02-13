<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin=""></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="https://demo.opencart.com/catalog/view/stylesheet/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet" />

    <title>Hot Sale</title>


</head>

<body>
    <div class="container " style="max-width:1200px; margin-top: 40px;">

        <div id="alert">
        </div>

        <form id="user">
            <h1>Форма</h1>
            <div class="form-group mb-2">
                <label for="name">Имя</label>

                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
            </div>
            <div class="form-group mb-2">
                <label for="name">Фамилия</label>

                <input type="text" class="form-control" name="sirname" id="sirname" placeholder="Sirname">
            </div>
            <div class="form-group mb-2">
                <label for="name">Email</label>

                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
            </div>

            <div class="form-group mb-2">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>

            <div class="form-group mb-2">
                <label for="confirm_password">Подтверждение пароля</label>
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
            </div>


            <button type="" id="sumbit" class="btn btn-primary">Отправить</button>

        </form>

    </div>

    <script>
        $('#sumbit').on("click", function(e) {
            e.preventDefault();
            
            $('#alert').html("");

            let data = $('form#user').serialize();

            $.ajax({
                url: '/POST.php',
                type: 'POST',
                dataType: 'json',
                data: data,

                success: function(json) {

                    console.log(json);



                    if (json.error) {

                        $('#alert').html('<div class="alert alert-danger alert-dismissible"> <strong>Error</strong> : ' + json.error + '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');

                    } else {

                        $('#user').hide();

                        $('#alert').html('<div class="alert alert-success alert-dismissible"> <strong>Success</strong> : ' + 'Регистрация успешна' + '<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.warn(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);

                }
            });

        });
    </script>

</body>

</html>