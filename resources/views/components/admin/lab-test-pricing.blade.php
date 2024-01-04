@if(old('pricing'))
    @foreach (old('pricing') as $pricing)
        <!-- Old Static Pricing Card -->
        <div class="card p-4 dynamic-content clone-template" data-clone-template-id="{{ $loop->iteration }}">
            @if(!$loop->first)
                <span class="remove-clone-template-row fa fa-trash" onclick="removeCloneTemplateRow(this)"></span>
            @endif

            <div class="row item-row">
                <!-- City -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city">City</label>
                        <select  type="text" class="form-control" placeholder="Enter heading" name="pricing[{{ $loop->iteration }}][city]" id="city" required>
                            @foreach ($warehouses ?? [] as $warehouse)
                                <option value="{{ $warehouse->id }}" {{ $pricing['city'] ==  $warehouse->id ? 'selected' : '' }} >{{ $warehouse->name }}</option>
                            @endforeach
                        </select>

                        @error("pricing.$loop->iteration.city") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End City -->
                
                <!-- Price -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="mrp_price">Price</label>
                        <input type="number" class="form-control" placeholder="Enter price" name="pricing[{{ $loop->iteration }}][mrp_price]" id="mrp_price" value="{{ $pricing['mrp_price'] }}" required>
                        @error("pricing.$loop->iteration.mrp_price") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Price -->

                <!-- Discount -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="discount">Discount ( % )</label>
                        <input type="number" class="form-control" placeholder="Enter Discount" name="pricing[{{ $loop->iteration }}][discount]" id="discount" value="{{ $pricing['discount'] }}"  required>
                        @error("pricing.$loop->iteration.discount") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Discount -->
                
                <!-- Actual Price -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="text" class="form-control" placeholder="0.00" name="pricing[{{ $loop->iteration }}][sale_price]" id="sale_price" value="{{ $pricing['sale_price'] }}"   readonly required>
                        @error("pricing.$loop->iteration.sale_price") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Actual Price -->

            </div>
        </div>
        <!-- End Old Static Pricing Card -->
    @endforeach
@else
    @forelse($pricing ?? [] as $item)
        <!-- Dynamic Pricing Card -->
        <div class="card p-4 pricing clone-template" data-clone-template-id="{{ $loop->iteration }}">
            @if(!$loop->first)
                <span class="remove-clone-template-row fa fa-trash" onclick="removeCloneTemplateRow(this)"></span>
            @endif

            <div class="row item-row">        
                <!-- City -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city">City</label>
                        <select  type="text" class="form-control" placeholder="Enter heading" name="pricing[{{ $loop->iteration }}][city]" id="city" required>
                            <option disabled>Choose...</option>
                            @foreach ($warehouses ?? [] as $warehouse)
                                <option value="{{ $warehouse->id }}" {{ $item->city == $warehouse->id ? 'selected' : '' }}>{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                        @error("pricing.$loop->iteration.city") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End City -->
                
                <!-- Price -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="mrp_price">Price</label>
                        <input type="number" class="form-control" min="1" max="10000" placeholder="Enter price" name="pricing[{{ $loop->iteration }}][mrp_price]" id="mrp_price" value="{{ $item->mrp_price }}" required>
                        @error("pricing.$loop->iteration.mrp_price") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Price -->

                <!-- Discount -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="discount">Discount ( % )</label>
                        <input type="number" class="form-control" min="1" max="100" placeholder="Enter Discount" name="pricing[{{ $loop->iteration }}][discount]" id="discount" value="{{ $item->discount }}" required>
                        <div class="error_msg_js"></div>
                        @error("pricing.$loop->iteration.discount") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Discount -->
                
                <!-- Actual Price -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="text" class="form-control" placeholder="0.00" name="pricing[{{ $loop->iteration }}][sale_price]" id="sale_price" value="{{ $item->sale_price ?? '0.00' }}" readonly required>
                        @error("pricing.$loop->iteration.sale_price") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Actual Price -->

            </div>
        </div>
        <!-- End Dynamic Pricing Card -->
    @empty
        <!-- Static Pricing Card -->
        <div class="card p-4 dynamic-content clone-template" data-clone-template-id="1">
            <div class="row item-row">
                <!-- City -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="city">City</label>
                        <select  type="text" class="form-control" placeholder="Enter heading" name="pricing[1][city]" id="city" required>
                            @foreach ($warehouses ?? [] as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>

                        @error("pricing.1.city") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End City -->
                
                <!-- Price -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="mrp_price">Price</label>
                        <input type="number" class="form-control" placeholder="Enter price" name="pricing[1][mrp_price]" id="mrp_price" required>
                        @error("pricing.1.mrp_price") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Price -->

                <!-- Discount -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="discount">Discount ( % )</label>
                        <input type="number" class="form-control" placeholder="Enter Discount" name="pricing[1][discount]" id="discount" required>
                        @error("pricing.1.discount") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Discount -->
                
                <!-- Actual Price -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="sale_price">Sale Price</label>
                        <input type="text" class="form-control" placeholder="0.00" name="pricing[1][sale_price]" id="sale_price" readonly required>
                        @error("pricing.1.sale_price") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Actual Price -->

            </div>
        </div>
        <!-- End Static Pricing Card -->
    @endforelse
@endif
