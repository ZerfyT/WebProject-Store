<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="resources/sweetalert2/sweetalert2.all.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 500;
            color: rgb(20, 20, 20);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            /* height: 100vh; */
            padding: 10rem;
        }

        .container form {
            display: flex;
            flex-direction: column;
            width: 100%;
            padding: 0 5rem;
        }

        .container form * {
            padding: 8px;
            margin: 8px;
            border: 1px solid rgba(100, 100, 100, 0.965);
            border-radius: 4px;
        }

        .container form button {
            font-weight: 600;
            font-size: medium;
        }

        #btSubmit {
            font-weight: 600;
            font-size: medium;
        }

        #btSubmit:hover {
            background-color: #111;
        }
    </style>
</head>

<body>

    <div class="container">
        <form id="formSignin">
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="password" placeholder="Password">
            <input id="btSubmit" type="submit" value="submit">
        </form>

    </div>

    <div class="container">
        <button id="btView">Click to View All</button>
        <div id="alldata"></div>
    </div>


    <script>
        document.getElementById('formSignin').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the form from being submitted
            const formData = new FormData(this);
            fetch('fetchapi_signin.php', {
                method: 'POST',
                body: formData,
            })
                .then(responce => responce.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            // title: '',
                            text: 'Data added successful',
                            icon: 'success',
                            confirmButtonText: 'Cool'
                        })
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong',
                            icon: 'error',
                            confirmButtonText: 'Cool'
                        })
                    }
                    // console.log(data);
                });
        });

        document.getElementById('btView').addEventListener('click', function (event) {
            fetch('fetchapi_viewall.php')
                .then(responce => responce.json())
                .then(data => {
                    var x = document.getElementById('alldata'); 
                    data.forEach(item => {
                        const div = document.createElement('div');
                        div.innerHTML = `<h2>Username : ${item.username}</h2><h2>Password : ${item.password}</h2><br>`;
                        x.appendChild(div);
                    }); {

                    }
                    // console.log(data);
                });
        });
    </script>

</body>

</html>