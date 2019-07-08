


test
{{   url('/pdf') }}

{{ dump( $base64 ) }}

<img src="data:image/png;base64, {{ $base64 }} ">

{!! QrCode::size(250)->generate('ItSolutionStuff.com'); !!}