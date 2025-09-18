
            <div >
                  <div class="section-header" >
                    <h2>My Orders</h2>
                       <div class="mb-3">
                            <label for="status">Status:</label>
                            <select wire:model="status" wire:change="$refresh" id="status" class="form-select w-auto d-inline-block">
                                <option value="">All</option>
                                <option value="Pending">Pending</option>
                                <option value="In Transit">In Transit</option>
                                <option value="Completed">Completed</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                  </div>

                  <div class="orders-grid">
                    @foreach( $orders as $order)
                    <!-- Order Card 1 -->
                    <div class="order-card">
                      <div class="order-header">
                        <div class="order-id">
                          <span class="label">Order ID:</span>
                          <span class="value">#ORD-2025-{{ $formatted = str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</span>
                        </div>
                        <div class="order-date">{{ $order->created_at }}</div>
                      </div>
                      <div class="order-content">
                        <div class="product-grid">
                          @foreach($order->firstThreeImages as $image)
                              <img src="{{asset('storage/'.$image )  }}" class="w-10 h-10 rounded-full mr-1">
                          @endforeach

                          @if($order->remainingProducts > 0)
                              <span class="more-items">+{{ $order->remainingProducts }}</span>
                          @endif


                          @php
                            switch ($order->status) {
                                case 'Pending':
                                    $color = 'processing';
                                    break;
                                case 'In Transit':
                                    $color = 'bg-secondary text-light';
                                    break;
                                case 'Completed':
                                    $color = 'delivered';
                                    break;
                                case 'Cancelled':
                                    $color = 'bg-danger text-light';
                                    break;
                            }
                        @endphp

                 

                        </div>
                        <div class="order-info">
                          <div class="info-row">
                            <span>Status</span>
                            <span class="status {{$color}}">{{$order->status}}</span>
                          </div>
                          <div class="info-row">
                            <span>Items</span>
                            <span>{{ $order->items->count() }} items</span>
                          </div>
                          <div class="info-row">
                            <span>Total</span>
                            <span class="price">₱{{ $order->total }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="order-footer">
                        @if($order->status == 'Completed')
                        <button type="button" class="btn-review"><a href="{{route('customer.account',  ['tab' => 'toreviews'])}}" class="text-success"> Write a review</a></button>
                        @elseif($order->status == 'Pending')
                        <form action="{{ route('customer.order.cancel', $order->id) }}"class="col-6" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn-reorder w-100">Cancel</button>
                        </form>
                        @endif
                        <button type="button" class="btn-details " data-bs-toggle="collapse" data-bs-target="#details{{ $order->id }}" aria-expanded="false">View Details</button>
                      </div>

                    

                      <!-- Order Details -->
                      <div class="collapse order-details" id="details{{ $order->id }}">
                        <div class="details-content">
                          <div class="detail-section">
                            <h5>Order Information</h5>
                            <div class="info-grid">
                              <div class="info-item">
                                <span class="label">Payment Method</span>
                                <span class="value">{{ $order->payment->method ?? '-' }}</span>
                              </div>
                              <div class="info-item">
                                <span class="label">Shipping</span>
                                <span class="value">2-3 days</span>
                              </div>
                            </div>
                          </div>

                          <div class="detail-section">
                            <h5>Items {{ $order->items->count() }}</h5>

                            @foreach( $order->items as $item)
                            <div class="order-items">
                              <div class="item">
                                <img src="{{ asset('storage/'. ($item->product->productImages->first()?->image_path ?? 'product_images/no-image.jpg')) }}" alt="Product" loading="lazy">
                                <div class="item-info">
                                  <h6>{{ $item->product->product_name }}</h6>
                                  <div class="item-meta">
                                    <span class="sku">SKU: {{$item->product->sku}}</span>
                                    <span class="qty">Qty: {{$item->quantity}}</span>
                                  </div>
                                </div>
                                <div class="item-price">{{$item->price}}</div>
                              </div>
                            </div>
                            @endforeach

                          </div>

                          <div class="detail-section">
                            <h5>Price Details</h5>
                            <div class="price-breakdown">
                              <div class="price-row">
                                <span>Subtotal</span>
                                <span>₱{{ $order->subtotal }}</span>
                              </div>
                              <div class="price-row">
                                <span>Shipping</span>
                                <span>₱{{ $order->shipping  }}</span>
                              </div>
                              <div class="price-row">
                                <span>Tax</span>
                                <span>₱{{ $order->tax }}</span>
                              </div>
                              <div class="price-row total">
                                <span>Total</span>
                                <span>₱{{ $order->total  }}</span>
                              </div>
                            </div>
                          </div>

                          <div class="detail-section">
                            <h5>Shipping Address</h5>
                            <div class="address-info">
                              <p><b>{{ $order->address->recipient }}</b>
                                <br>{{ $order->address->line1}}
                                <br>{{ $order->address->line2}}
                                <br>{{$order->address->district}}
                                <br>{{$order->address->city}}</p>
                              <p class="contact">{{$order->address->phone}}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  
                   
                  </div>

                  <!-- Pagination -->
                {{ $orders->links() }}
                </div>