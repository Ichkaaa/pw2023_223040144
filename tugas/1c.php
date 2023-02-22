<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }
    .kotak1-pertama{
        width: 50px;
        height: 50px;
        background-color: purple;
        border: 1px solid black;
    }

    .kotak1-kedua{
        width: 50px;
        height: 50px;
        background-color: purple;
        border: 1px solid black;
    }
    .kotak2-kedua{
        width: 50px;
        height: 50px;
        background-color: purple;
        border: 1px solid black;
    }
    .kotak1-ketiga{
        width: 50px;
        height: 50px;
        background-color: purple;
        border: 1px solid black;
    }
    .kotak2-ketiga{
        width: 50px;
        height: 50px;
        background-color: purple;
        border: 1px solid black;
    }
    .kotak3-ketiga{
        width: 50px;
        height: 50px;
        background-color: purple;
        border: 1px solid black;
    }
    .kotak-pertama {
        text-align: center;
        line-height: 50px;
    }
    .kotak-kedua {
        text-align: center;
        line-height: 50px;
        display:flex;
    }
    .kotak-ketiga {
        text-align: center;
        line-height: 50px;
        display:flex;
    }
</style>

<body>
    <div class="kotak-pertama">
        <div class="kotak1-pertama">1</div>
    </div>
    <div class="kotak-kedua">
        <div class="kotak1-kedua">2</div>
        <div class="kotak2-kedua">2</div>
    </div>
    <div class="kotak-ketiga">
        <div class="kotak1-ketiga">3</div>
        <div class="kotak2-ketiga">3</div>
        <div class="kotak3-ketiga">3</div>
    </div>
</body>
</html>