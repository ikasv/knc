
@forelse(old('itinerary') ?? $items ?? [] as $item)

    
        <!-- Static itinerary Card -->
        <div class="card p-4 itinerary clone-template" data-clone-template-id="{{ $loop->iteration }}">
            @if(!$loop->first)
                <span class="remove-clone-template-row fa fa-trash" onclick="removeCloneTemplateRow(this)"></span>
            @endif

            <div class="row item-row">

            <!-- Day -->
            <div class="col-md-2">
                    <div class="form-group">
                        <label for="Day">Day</label>
                        <select type="text" class="form-control" id="day" name="itinerary[{{ $loop->iteration }}][day]">
                            @foreach(range(1,30) as $day)
                            <option value="{{ $day }}" {{ ( $day == ( $item->day ?? $item['day'] ?? 0 ) ? 'selected' : '') }}>{{ $day }}</option>
                            @endforeach
                        </select>
                        @error("itinerary.$loop->iteration.day") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Day -->
                
                <!-- Title -->
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="itinerary[{{ $loop->iteration }}][title]" id="title" value="{{ is_array($item) ? $item['title'] : $item->title ?? '' }}">
                        @error("itinerary.$loop->iteration.title") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Title -->
               
                <!-- Description -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control ckeditor itinerary_description" placeholder="Enter description" name="itinerary[{{ $loop->iteration }}][description]" id="{{ $loop->first ? 'itinerary_description' : 'itinerary_description_'.$loop->iteration }}">
                        {{ is_array($item) ? $item['description'] :  $item->description ?? '' }}
                        </textarea>
                        @error("itinerary.$loop->iteration.description") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Description -->
            </div>
        </div>
        <!-- End Static itinerary Card -->
    
    @empty

        <!-- Static itinerary Card -->
        <div class="card p-4 itinerary clone-template" data-clone-template-id="1">
            <div class="row item-row">
                <!-- Day -->
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="Day">Day</label>
                        <select type="text" class="form-control" id="day" name="itinerary[1][day]">
                            @foreach(range(1,30) as $day)
                            <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach
                        </select>
                        @error("itinerary.1.day") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Day -->

                <!-- Title -->
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" name="itinerary[1][title]" id="title">
                        @error("itinerary.1.title") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Title -->
               
                <!-- Description -->
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control ckeditor itinerary_description" placeholder="Enter description" name="itinerary[1][description]" id="itinerary_description"></textarea>
                        @error("itinerary.1.description") <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Description -->
            </div>
        </div>
        <!-- End Static itinerary Card -->

    @endforelse