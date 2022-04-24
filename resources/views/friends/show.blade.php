@extends('layouts.app')

@section('title', 'Coba')

@section('content')
<div class="card">
  <div class="cardbody">
      <h3>Nama teman : {{ $friends['nama'] }}</h3>
      <h3>No Tlp teman : {{ $friends['no_tlp'] }}</h3>
      <h3>Alamat teman : {{ $friends['alamat'] }}</h3>
</div>
</div>
@endsection
