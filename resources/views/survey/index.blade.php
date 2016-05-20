@extends('layouts.app')

@section('content')
<textarea name="message" id="message">
			</textarea>
			<script>
			  CKEDITOR.replace('message');
			</script>
			
@endsection
	