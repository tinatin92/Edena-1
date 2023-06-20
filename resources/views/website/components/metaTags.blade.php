@if(isset($model))
<meta name="description" content="{{ $model[app()->getlocale()]->desc }}-stateless">
<meta property='og:title' content='{{ $model[app()->getlocale()]->desc }}-stateless'/>
<meta property='og:image' content='//media.https://stateless.azurewebsites.net/ 1234567.jpg'/>
<meta property='og:description' content='{{ $model[app()->getlocale()]->desc }}'/>
<meta property='og:url' content='//www.https://stateless.azurewebsites.net/URL of the article' />
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="_token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=">
<link rel="canonical" href="{{url()->current()}}"/>
@else
<meta property='og:description' content='stateless'/>
<meta name="description" content="stateless">
<meta property='og:title' content='stateless'/>
@endif