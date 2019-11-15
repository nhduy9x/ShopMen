<form action="{{route('add.cart')}}" method="get">
	<input type="type" name="id" >
	<input type="type" name="name" placeholder="name" >
	<input type="type" name="qty" placeholder="qty">
	<input type="type" name="price" placeholder="prices">
	<input type="submit" value="submit">
</form>
<table>
	@foreach($carts as $all)
	<th>
		<tr>
			{{$all->id}}
			{{$all->name}}
			{{$all->quantity}}
			{{$all->price}}
		</tr>
	</th>
	@endforeach
	
</table>