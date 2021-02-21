<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Vue SPA</title>
    <style>
        html {
            font-family: sans-serif;
            margin: 15%;
        }
    </style>
</head>
<body>
    <div id='app'>
        <h3>Hello, @{{ title }}</h3>
        <p v-text="title"></p>
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>