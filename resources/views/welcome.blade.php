<!DOCTYPE html>
<html lang="en">
<head>
    <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/css/app.css">
    <title>TO DO List</title>
</head>
<body>
<div id="app">
    <div class="container">
        <tasks></tasks>
    </div>
</div>
<script src="/js/app.js"></script>
</body>
</html>