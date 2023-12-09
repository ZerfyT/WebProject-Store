<?php include 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hardware Store</title>
    <?php include 'includes/header.php'; ?>
    <style>
    </style>
</head>

<body class="">
    <style>

    </style>

    <!-- Header - Navigation Bar -->
    <?php include "includes/navbar_dark.php"; ?>


    <!-- Container -->
    <div class="container my-5 p-2 px-4">
    <h1>Contact Us</h1>
        
        <form class="mt-3" id="contactForm">
            <div class="form-group mt-2">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group mt-2">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <div class="form-group mt-2">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>


    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
    

    <script>
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var message = document.getElementById("message").value;
            
            var formData = {
                name: name,
                email: email,
                message: message
            };
            
            fetch("/contact", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error(error);
            });
        });
    </script>
    
</body>

</html>