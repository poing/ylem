@extends('ylem.layouts.app')

@section('content')
<ul>
    @foreach ($data as $item)

        @isset($item->user)
            <li>{{ $item->user->name }}</li>
        @endisset

        @isset($item->org)
            <li>{{ $item->org->tradingName }}</li>
        @endisset

        @isset($item->name)
            <li>{{ $item->name }}</li>
        @endisset

        @include('ylem.burrow', array('items' => $item->getImmediateDescendants()))
    @endforeach
</ul>
@endsection

