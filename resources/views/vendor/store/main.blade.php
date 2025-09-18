@extends('vendor.layouts.layout')
@section('title', 'Create Store name')

@section('vendor_content')

@if($store)
	@include('vendor.store.manage')
@else
	@include('vendor.store.create')
@endif
@endsection