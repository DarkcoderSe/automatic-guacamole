<table>
    <thead>
    <tr>
        <th>License Type</th>
        <th>License Status</th>
        <th>Expiration Date</th>
        <th>Date First Licensed</th>
        <th>Name</th>
        <th>Reference No</th>
        <th>Phone No</th>
        <th>Address </th>
        <th>Licensee Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($licenses as $li)
        <tr>
            <td>{{ $li->license_type }} </td>
            <td>{{ $li->license_status }} </td>
            <td>{{ $li->expiration_date }} </td>
            <td>{{ $li->date_first_license }} </td>
            <td>{{ $li->name }} </td>
            <td>{{ $li->reference_no }} </td>
            <td>{{ $li->phone_no }} </td>
            <td>{{ $li->address }} </td>
            <td>{{ $li->licensee_name }} </td>

        </tr>
    @endforeach
    </tbody>
</table>
