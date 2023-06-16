<!DOCTYPE html>
<html>
<head>
	<title>Reservasi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>No Hp</th>
				<th>Reservasi</th>
				<th>Harga</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($transaction as $t)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$t->name}}</td>
				<td>{{$t->phone}}</td>
				<td>{{$t->res_date}}</td>
				<td>{{$t->total_price}}</td>
				<td>{{$t->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>