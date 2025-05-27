@extends('layout.sidebar')

@section('content')

<style>
    .bordered-table {
        border-collapse: collapse;
        width: 100%;
    }
    .bordered-table, .bordered-table th, .bordered-table td {
        border: 1px solid black;
    }
    .no-border-table {
        border-collapse: collapse;
        width: 100%;
    }
    .no-border-table, .no-border-table th, .no-border-table td {
        border: none;
    }
</style>

<h3>Table with Border 1</h3>
<table class="bordered-table">
    <thead>
        <tr>
            <th>Header 1A</th>
            <th>Header 1B</th>
            <th>Header 1C</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1A</td>
            <td>Row 1B</td>
            <td>Row 1C</td>
        </tr>
        <tr>
            <td>Row 2A</td>
            <td>Row 2B</td>
            <td>Row 2C</td>
        </tr>
    </tbody>
</table>

<h3>Table with Border 2</h3>
<table class="bordered-table">
    <thead>
        <tr>
            <th>Header 2A</th>
            <th>Header 2B</th>
            <th>Header 2C</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1A</td>
            <td>Row 1B</td>
            <td>Row 1C</td>
        </tr>
        <tr>
            <td>Row 2A</td>
            <td>Row 2B</td>
            <td>Row 2C</td>
        </tr>
    </tbody>
</table>

<h3>Table without Border</h3>
<table class="no-border-table">
    <thead>
        <tr>
            <th>Header A</th>
            <th>Header B</th>
            <th>Header C</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row A1</td>
            <td>Row B1</td>
            <td>Row C1</td>
        </tr>
        <tr>
            <td>Row A2</td>
            <td>Row B2</td>
            <td>Row C2</td>
        </tr>
    </tbody>
</table>

@endsection
