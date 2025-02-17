<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stone Paper Scissors</title>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Background with Gradient */
        body {
            background: linear-gradient(120deg, #ffcc70, #ff6699, #6699ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
        }

        /* Container Box */
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 350px;
            backdrop-filter: blur(10px);
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        h2 {
            font-size: 18px;
            color: #444;
            margin-bottom: 10px;
        }

        .player {
            margin: 15px 0;
        }

        /* Input Styling */
        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 18px;
            text-align: center;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #ff5733;
            outline: none;
        }

        /* Button Styling */
        button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 8px;
            background: #ff5733;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #e64a19;
        }

        /* Result Styling */
        .result {
            width: 200px;
            height: 200px;
            background-color: #6699ff;
            animation: resultAnimation 4s ease-in-out infinite;
            border-radius: 50%;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            margin: 30px auto;
            text-align: center;
            font-size: 5vh;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            animation: fadeIn 3s forwards;
        }

        /* Keyframes for Result Animation */
        @keyframes resultAnimation {
            0% {
                background-color: #6699ff;
                transform: scale(0.5) rotate(0deg);
                opacity: 1;
            }
            25% {
                background-color: red;
                transform: scale(0.7) rotate(45deg);
                opacity: 0.8;
            }
            50% {
                background-color: yellow;
                transform: scale(1) rotate(90deg);
                opacity: 1;
            }
            75% {
                background-color: green;
                transform: scale(1.2) rotate(135deg);
                opacity: 0.8;
            }
            100% {
                background-color: yellow;
                transform: scale(1) rotate(180deg);
                opacity: 1;
            }
        }

        /* Fade-In for Result */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

    </style>
</head>
<body>
    @if(session('success'))
    <div class="result">{{ session('success') }}</div>
    @endif
    <div class="container">
        <h1>Stone Paper Scissors</h1>
        <form id="gameForm" method="post" action="/score">
            @csrf
            <div class="player">
                <h2>Player 1</h2>
                <input type="text" id="player1" placeholder="Enter Your Name" name="player1">
            </div>
            <div class="player">
                <h2>Player 2</h2>
                <input type="text" id="player2" placeholder="Enter Your Name" name="player2">
            </div>
            <button type="submit">Play</button>
        </form>
        <div id="result"></div>
    </div>
</body>
</html>
