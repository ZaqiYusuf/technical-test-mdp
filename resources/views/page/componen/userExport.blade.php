<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Email</th>
            <th scope="col">Username</th>
            <th scope="col">role</th>
            <th scope="col">Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->role }}</td>
                <td>{{ $item->address }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
