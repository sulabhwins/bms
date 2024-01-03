<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: #333;
            overflow: hidden;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        nav li {
            float: left;
        }

        nav a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .user-dropdown {
            position: relative;
            float: right;
            line-height: 45px;
            margin-right: 50px;
        }

        .user-logo {
            cursor: pointer;
        }

        .user-dropdown-content {
            display: none;
            /* position: absolute; */
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .user-dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .user-dropdown-content a:hover {
            background-color: #ddd;
        }

        .user-dropdown:hover .user-dropdown-content {
            display: block;
        }
    </style>
</head>

<body>

    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#history">History</a></li>
            <li class="user-dropdown">
                <div class="user-logo" onclick="toggleUserDropdown()">
                    <i class="fas fa-user" style="color: #ffffff;"></i>
                </div>
                <div class="user-dropdown-content" id="userDropdown">
                    <a href="#logout">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <script>
        function toggleUserDropdown() {
            var dropdown = document.getElementById("userDropdown");
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }

        window.onclick = function(event) {
            if (!event.target.matches('.user-logo')) {
                var dropdown = document.getElementById("userDropdown");
                if (dropdown.style.display === "block") {
                    dropdown.style.display = "none";
                }
            }
        }
    </script>

</body>

</html>