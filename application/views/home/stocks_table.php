<h2>Stocks</h2>
<table class="table table-bordered">
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Category</th>
        <th>Value</th>
    </tr>
    {stocks}
    <tr>
        <td><a href="/history/stock/{code}">{code}</a></td>
        <td>{name}</td>
        <td>{category}</td>
        <td>{value}</td>
    </tr>
    {/stocks}
</table>