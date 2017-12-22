@extends('layouts.profile-master')

@section('profile-content')
		<div class="col-md-12">
			<h1 style="margin-bottom:30px;">Transactions</h1>
			<table class="table table-striped table-hover">
				<tr>
					<th>No.</th>
					<th>Cart</th>
					<th>Status</th>
					<th>Created</th>
				</tr>
				@if(count($orders) > 0)
				<?php $i = 1; ?>
				@foreach($orders as $order)
				<tr>
					<td>{{$i}}</td>
					<td>{{$order->cart}}</td>
					<td>{{$order->status}}</td>
					<td>{{date('d F Y, H:i:s', strtotime($order->created_at))}}</td>
				</tr>
				<?php $i++; ?>
				@endforeach
				@else
				<tr>
					<td colspan="4" class="text-center">You haven't ordered a single thing.</td>
				</tr>
				@endif
			</table>
		</div>
@endsection