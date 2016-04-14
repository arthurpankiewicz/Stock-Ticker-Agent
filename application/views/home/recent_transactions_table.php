<h2>Recent Transactions</h2>
<table class="table table-bordered">
    <tr>
        <th>Seq</th>
        <th>Date</th>
        <th>Agent</th>
        <th>Player</th>
        <th>Stock</th>
        <th>Transaction</th>
        <th>Quantity</th>
    </tr>
    {recent_transactions}
    <tr>
        <td>{seq}</td>
        <td>{datetime}</td>
        <td>{agent}</td>
        <td>{player}</td>
        <td>{stock}</td>
        <td>{trans}</td>
        <td>{quantity}</td>
    </tr>
    {/recent_transactions}
</table>