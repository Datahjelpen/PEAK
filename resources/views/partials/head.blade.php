<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'PEAK') }}</title>
	<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
	<link rel="stylesheet" href="{{ mix('/fonts/butler.css') }}">
</head>