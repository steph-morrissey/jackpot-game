<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jackpot Game</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Style -->
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <div>
            <div class="flex-row space-around">
                <h1>Jackpot Game </h1>
                <h2>Credits: {{ Session::get('credits') }}</h2>
            </div>
            <div class="flex-row space-between">
                <table class="w-100">
                    <tbody>
                        <tr class="flex-row space-between">
                            @if(Session::has('option1'))
                                <td>{{ Session::get('option1')['initial'] }}</td>
                                <td>{{ Session::get('option2')['initial'] }}</td>
                                <td>{{ Session::get('option3')['initial'] }}</td>
                            @else
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
                <form action="/game/session" method="post">
                    @csrf
                    <button type="submit">Spin Me</button>
                </form>            
            </div>
            <div class="flex-row justify-center pt-20">
            <form action="/game/session/end" method="post">
                    @csrf
                    <button type="submit">Cash Out</button>
                </form>   
            </div>
        </div>
    </body>
</html>
