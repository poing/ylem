@extends('ylem.layouts.app')
@section('content')
<ul>
    @foreach (App\Group::roots()->get() as $item)

        @isset($item->user)
            <li>{{ $item->user->name }}</li>
        @endisset

        @isset($item->org)
            <li>{{ $item->org->tradingName }}</li>
        @endisset

        @include('ylem.burrow', array('items' => $item->getImmediateDescendants()))
    @endforeach
</ul>
@endsection

