<h2>List of Transactions</h2>

<div class="mb-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTransactionModal">Create Transaction</button>
</div>

<div class="modal fade" id="createTransactionModal" tabindex="-1" aria-labelledby="createTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTransactionModalLabel">Create New Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="item_id" class="form-label">Item</label>
                        <select name="item_id" id="item_id" class="form-select" required>
                            <option value="">-- Select Item --</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mb-3">
                        <label for="location_id" class="form-label">Location</label>
                        <select name="location_id" id="location_id" class="form-select" required>
                            <option value="">-- Select Location --</option>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mb-3">
                        <label for="transaction_type" class="form-label">Transaction Type</label>
                        <select name="transaction_type" id="transaction_type" class="form-select" required>
                            <option value="income">Income</option>
                            <option value="outcome">Outcome</option>
                        </select>
                    </div>
            
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
                    </div>
            
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes</label>
                        <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Transactions</button>
                </form>
            </div>
        </div>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Item</th>
            <th>Item Description</th>
            <th>Gudang</th>
            <th>Location</th>
            <th>Type</th>
            <th>Quantity</th>
            <th>Notes</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->item->name }}</td>
                <td>{{ $transaction->item->description }}</td>
                <td>{{ $transaction->location->name }}</td>
                <td>{{ $transaction->location->description }}</td>
                <td>{{ ucfirst($transaction->transaction_type) }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>{{ $transaction->notes }}</td>
                <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No locations found</td>
            </tr>
        @endforelse
    </tbody>
</table>
