<!DOCTYPE html>
<html>

<head>
    <title>Quotes App</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin: 10px 2px;
        }

        blockquote {
            font-size: 22px;
            text-align: center;
            margin: 30px 0;
        }

        .author {
            text-align: center;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: black;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-center {
            text-align: center;
            margin: 20px 0;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            background: #f5f5f5;
        }

        form button {
            padding: 10px 15px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Motivational Quote</h1>

        <!-- Form Submission Success Message-->
        @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
        @endif

        <blockquote>
            "{{ $quote->content }}"
        </blockquote>

        @if($quote->author)
        <p class="author">— {{ $quote->author }}</p>
        @endif

        <div class="btn-center">
            <a href="/" class="btn">New Quote</a>
        </div>

        <!-- User form to submit quotes -->
        <h2>Submit Your Quote</h2>

        <form action="/quotes" method="post">
            @csrf

            <input type="text" name="content" placeholder="Enter quote" required>
            <input type="text" name="author" placeholder="Author (optional)">

            <button type="submit">Submit Quote</button>
        </form>
</body>
</div>
</body>

</html>