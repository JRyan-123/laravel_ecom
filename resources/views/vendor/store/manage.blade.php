<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Store Details</h5>
								</div>
								<div class="card-body text-center">
									<img src="{{ asset('assets/img/photos/shop.png') }}" alt="" class="img-fluid">
									<h5 class="card-title mb-0">{{ $store->store_name }}</h5>
									<div class="text-muted mb-2">{{ $store->store_description }}</div>

								</div>
								<hr class="my-0" />
								<div class="card-body">
									<h5 class="h6 card-title">About</h5>
									<ul class="list-unstyled mb-0">
										<li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span>{{ $store->address }}</li>

										<li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> {{ $store->phone }}</li>
										
										<li class="mb-1"><span data-feather="arrow-right" class="feather-sm me-1"></span>{{ $store->created_at }}</li>

										<li class="mb-1"><span data-feather="star" class="feather-sm me-1"></span>{{ number_format($average, 1) }}</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Update info</h5>
								</div>
								<div class="card-body h-100">
              	<form action="{{ route('vendor.store.update')}}" method="POST" >
										@csrf
										@method('PUT')
										<label for="" class="fw-bold mb-2">Store name</label>
										<input type="text" class="form-control p-2" value="{{$store->store_name}}" name="store_name">

										<label for="" class="fw-bold mb-2">Details</label>
										<textarea name="store_description" rows="5" class="form-control p-2">{{$store->store_description}}</textarea>

										<label for="" class="fw-bold mb-2">Address</label>
										<input type="text" name="address" class="form-control p-2" value="{{$store->address}}">

										<label for="" class="fw-bold mb-2">Phone</label>
										<input type="tel" pattern="[0-9]+" name="phone" class="form-control p-2" value="{{$store->phone}}">

										<button type="submit" class="btn btn-primary rounded p-2 form-control mt-2">Submit</button>
									</form>
							</div>
						</div>
					</div>