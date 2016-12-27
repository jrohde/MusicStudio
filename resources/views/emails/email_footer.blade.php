<h2 style="text-align:center; background-color: #DEBF45; color:white; padding: 10px; border-radius: 5px;">Nueva mail desde el Tridente</h2>
<h4 style="text-align:center;"><span style="font-weight: 400;">Nombre:</span> {{$nameSender}}</h4>
<h4 style="text-align:center;"><span style="font-weight: 400;">Email:</span> {{$email}}</h4>
<h4 style="text-align:center;"><span style="font-weight: 400;">Mensaje:</span> {{$bodyMessage}}</h4>
@if(!empty($demo_link))
	<h4 style="text-align:center;"><span style="font-weight: 400;">Demo:</span> <a href="{{$demo_link}}" target="_blank">Link Demo</h4>
@endif
@if(!empty($demo_link1))
	<h4 style="text-align:center;"><span style="font-weight: 400;">Demo:</span> <a href="{{$demo_link1}}" target="_blank">Link Demo</h4>
@endif
@if(!empty($demo_link2))
	<h4 style="text-align:center;"><span style="font-weight: 400;">Demo:</span> <a href="{{$demo_link2}}" target="_blank">Link Demo</h4>
@endif