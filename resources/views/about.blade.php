
    @extends('layouts.main')
 
    @section('container')
    <h1>Halaman About</h1>
    <h2 style="text-align: center">{{ $name }}</h2>
    <h3 style="text-align: center">{{ $email }}</h3>
    <h3 style="text-align: center">{{ $jurusan }}</h3>    
    @endsection

