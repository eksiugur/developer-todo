<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ getenv('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">{{ getenv('APP_NAME') }}</a>
</nav>
<div class="container-fluid bg-light">
    <div class="row">
        @foreach($developerTasks as $developer)
            <div class="col-sm-6">
                <div class="bg-secondary  my-3 text-light text-center">
                    <h4>{{ $developer['name'] }}</h4>
                    Level : {{ $developer['level'] }}x - Total Duration : {{ $developer['duration'] }}h
                </div>
                <div class="row">
                    @foreach($developer['weekly'] as $week => $daily)
                        <div class="row">
                            <h3 class="text-dark">{{ ($week + 1) }}. Week</h3>
                            @foreach($daily['tasks'] as $task)
                                <div class="card col-md-6 my-3 p-2 bg-light">
                                    <h5 class="card-header p-0 m-0"> {{ $task['name'] }}</h5>
                                    <div class="card-body p-0">
                                        <hr class="m-1">
                                        <div>
                                            <span class="col-sm-6 p-0 m-0">Level: {{ $task['level'] }}x</span> -
                                            <span class="col-sm-6 p-0 m-0">Duration: {{ $task['duration'] }}h</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <hr class="py-5">
            </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
