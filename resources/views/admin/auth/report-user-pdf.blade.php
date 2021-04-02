<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envelope</title>
    <style>

        table.static {
            position: relative;
            border: 1px solid #543535;
            text-align: center;
            width: 95%;
        }

        .header {
            text-align: center;
        }

    </style>
</head>

<body>
    <div class="form-group">
        <p class="header"><strong>Laporan Data Users</strong></p>
        <p class="header">Berikut report semua data user</p>
        <table class="static" rules="all">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Nik</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->getRoleNames()->first() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type=text/javascript>
		window.print(); 
	</script> 
</body>

</html>
