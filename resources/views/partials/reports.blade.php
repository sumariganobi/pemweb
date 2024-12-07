<h2>List of Reports</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>@</th>
            <th>Item Name</th>
            <th>Total Income</th>
            <th>Total Outcome</th>
            <th>Balance</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($items as $index => $item)
        <tr>
            <td>{{ $index +1}}</td>
            <td>{{ $item['name']}}</td>
            <td>{{ $item['income']}}</td>
            <td>{{ $item['outcome']}}</td>
            <td>{{ $item['balance']}}</td>
        </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Data Kosong</td>
            </tr>
        @endforelse
    </tbody>
</table>