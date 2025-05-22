
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Ritul K App' }}</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
        }

        header {
            background: #0073e6;
            color: #fff;
            padding: 1em 0;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        aside {
            background: #ddd;
            padding: 1em;
            margin-bottom: 1em;
            border-radius: 5px;
        }

        .container {
            padding: 2em;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        footer {
            text-align: center;
            padding: 1em;
            background: rgb(5, 5, 5);
            color: #fff;
            margin-top: 2em;
            border-top: 2px solid rgb(160, 195, 229);
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>

<body>
{{ $slot }}

    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/education">Education</a></li>
            </ul>
        </nav>
    </header>

    <main class="container">
        {{$title}}
        {{$content}}
    </main>

    <footer>
        <p>&copy; 2025 Ritul K App. All rights reserved.</p>
    </footer>
</body>
</html>
