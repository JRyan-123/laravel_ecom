<div>
                  <div class="section-header">
                    <h2>My Wishlist</h2>
                    <div class="header-actions">
              
                    </div>
                  </div>

                  <div class="wishlist-grid">
                    <!-- Wishlist Item 1 -->
                    @forelse( $items as $item )
                    <div class="wishlist-card" >
                      <div class="wishlist-image">
                        <img src="{{ asset('storage/'. ($item->product->productImages->first()?->image_path ?? 'product_images/no-image.jpg')) }}" alt="Product" loading="lazy">
                        <button class="btn-remove" wire:click.prevent='removeItem({{ $item->id }})'>
                          <i class="bi bi-trash"></i>
                        </button>
                         @if($item->product->discounted_price)
                            <div class="sale-badge">
                               {{ number_format((($item->product->regular_price -$item->product->discounted_price) / $item->product->regular_price) * 100,0) }}% OFF
                            </div>
                         @elseif($item->product->stock_quantity == 0)
                            <div class="out-of-stock-badge">Out of Stock</div>
                         @endif
                        
                      </div>
                      <div class="wishlist-content">
                        <h4>{{ $item->product->product_name}}</h4>
                        <div class="product-meta">
                          <x-star-rating :rating="$item->product->reviews->first()?->rating" :show-value="true" />

                          <div class="price">
                            @if($item->product->discounted_price)
                                <span class="current">₱{{$item->product->discounted_price }}</span>
                                <span class="original">₱{{$item->product->regular_price }}</span>
                            @else
                                <span class="current">₱{{$item->product->regular_price }}</span>
                            @endif
                           
                          </div>
                        </div>
                        <button type="button" class="btn-add-cart" wire:click.prevent='addItem({{ $item->product->id }}, {{ $item->id }})'>Add to Cart</button>
                      </div>
                    </div>
                    @empty
                    <div>No products available</div>
                    @endforelse
                  


                  </div>
                </div>
