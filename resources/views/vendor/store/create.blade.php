
<div class="card">
	<div class="card-header">
		<h5 class="card-title mb-0">Create Store name</h5>
	</div>
	<div class="card-body">
		<form action="{{ route('vendor.store.dbstore')}}" method="POST" >
			@csrf
			
			<label for="" class="fw-bold mb-2">Store name</label>
			<input type="text" class="form-control p-2" placeholder="Enter Store name..." name="store_name">

			<label for="" class="fw-bold mb-2">Details</label>
			<textarea name="store_description" rows="5" class="form-control p-2"></textarea>

			<label for="" class="fw-bold mb-2">Address</label>
			<input type="text" name="address" class="form-control p-2">

			<label for="" class="fw-bold mb-2">Phone</label>
			<input type="tel" pattern="[0-9]+" name="phone" class="form-control p-2">

			<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
		</form>
		
	</div>
</div>
