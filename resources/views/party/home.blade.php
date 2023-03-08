<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('components.header')
	<title>{{$party->title}} - {{$party->subtitle}}</title>
</head>
<body>
{{$party->title}}
{{$party->subtitle}}
</body>
</html>
