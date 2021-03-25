<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Envelope</title>
	<style>
		table.static {
			position:relative;
			border:1px solid #543535;
			text-align:center;
			width:95%;
		}
		.header {
			text-align:center;
		}
	</style>
</head>
<body>
	<div class="form-group">
		<p class="header"><strong>Laporan Data Aduan</strong></p>
		<p class="header">Berikut report aduan yang berlokasi di <strong> Desa {{ $lokasi }} </strong></p>
		<table class="static" rules="all">
				<tr>
					<th>no</th>
					<th>pengadu</th>
					<th>judul</th>
					<th>Isi</th>
					<th>lokasi</th>
					<th>status</th>
				</tr>
				@foreach($pengaduan as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->users->name }}</td>
					<td>{{ $item->judul_laporan }}</td>
					<td>{{ $item->isi_laporan }}</td>
					<td>{{ $item->lokasi }}</td>
					<td>{{ $item->status }}</td>
				</tr>
				@endforeach
		</table>
	</div>
	<script type=text/javascript>
		window.print();
	</script>
</body>
</html>