<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Oh no | OFW Serbisyo</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body{
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f8ecec;
            flex-direction: column;
        }
        div{
            text-align: center;
        }
        #soon{
            color: #333;
            opacity: .3;
            font-size: 4rem;
            font-weight: 800;
        }
        #desc{
            /* margin-top: -0px; */
            color: #333;
            font-size: 1.4rem;
            font-weight: 600;
        }
        #svg_img{
            max-width: 300px;
        }

        img{
            width: 100%;
            height: 100%;
        }

        #headers{
            margin-top: -40px;
        }

        button{
            background-color:#68a6c8;
            padding-inline: 1.2em;
            padding-block: 1em;
            outline: none;
            border: none;
            border-radius: 16px;
            margin-top: 1.2em;
            color: #e6e6e6;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: 300ms;
        }
        button:hover{
            background-color:#23698f;

        }
    </style>
</head>
<body>
    <div id="svg_img">
        <img  src="{{ asset('images/soon.svg') }}" alt="Soon">
    </div>
      <div id="headers">
            <p id="soon">Soon</p>
            <p id="desc">We are still cooking this page.</p>
            <button type="button" onclick="window.location.href='/'">Go back home</button>
      </div>
</body>
</html>
