<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('components.header')
	<title>{{$party->title}} - {{$party->subtitle}}</title>
	<link rel="stylesheet" href="/css/about.css" />
	<script type="application/javascript" src="{{asset("js/about.js")}}"></script>
</head>
<body>
{{$party->title}}
{{$party->subtitle}}
</body>
</html>
