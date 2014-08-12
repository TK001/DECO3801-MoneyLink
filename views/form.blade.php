<html>
<body>
{{ Form::open(array('url'=>'regform','method'=>'post')) }}
{{ Form::label('email','email address') }}
{{ Form::text('email') }}

{{ Form::close() }}
</body>
</html>
