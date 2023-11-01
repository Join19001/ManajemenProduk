<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>no</th>
            <th>idBarang</th>
            <th>id Pesanan</th>
            <th>nama Barang</th>
            <th>jumlah</th>
            <th>Harga Satuan</th>
            <th>Sub Total</th>
        </tr>
        @foreach ($detail as $item)
            <tr>{{$item->id}}</tr>
            <tr>{{$item->idBarang}}</tr>
            <tr>{{$item->idPesanan}}</tr>
            <tr>{{$item->namaBarang}}</tr>
            <tr>{{$item->jumlah}}</tr>
            <tr>{{$item->hrgSatuan}}</tr>
            <tr>{{$item->subTotal}}</tr>
        @endforeach
    </table>
</body>
</html>