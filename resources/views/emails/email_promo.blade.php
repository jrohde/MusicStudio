<table class="table table-striped" style="font-size: 16px;">
	<tbody style="background-color: #f7f7f7;">
		<tr>
			<td style="padding:15px;background: #428bca;color: white;">Nombre</td>
			<td style="padding:15px">{{$name}}</td>
		</tr>
		<tr>
			<td style="padding:15px;background: #428bca;color: white;">Email</td>
			<td style="padding:15px">{{$email}}</td>
		</tr>
		<tr>
			<td style="padding:15px;background: #428bca;color: white;">Promo elegída</td>
			<td style="padding:15px">{{$plan}}</td>
		</tr>
		<tr>
			<td style="padding:15px;background: #428bca;color: white;">Tel</td>
			<td style="padding:15px"><a href="tel:{{$tel}}"> {{$tel}} </td>
		</tr>
		<tr>
			<td style="padding:15px;background: #428bca;color: white;">Fecha evento</td>
			<td style="padding:15px">{{$date}}</td>
		</tr>
		<tr>
			<td style="padding:15px;background: #428bca;color: white;">Mensaje</td>
			<td style="padding:15px">{{$bodymessage}}</td>
		</tr>
	</tbody>
</table>