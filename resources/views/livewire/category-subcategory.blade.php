<div>
<div class="select-style-1">
    <label for="category_id">Select A Category</label>
    <div class="select-position">
        <select name="category_id" id="category_id" wire:model.live="selectedCategory">
            <option value="0">Select a category</option>
            @foreach ($categories as $cat)
            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
            @endforeach
        </select>
    </div>
  </div>
<div class="select-style-1">
    <label for="subcategory_id">Select A Sub Category</label>
    <div class="select-position">
        <select name="subcategory_id" id="Subcategory_id" wire:model.live="selectedSubcategory">
            <option >Select a Sub Category</option>
            @foreach ($subcategories as $subcat)
            <option value="{{$subcat->id}}">{{$subcat->subcategory_name}}</option>
            @endforeach
        </select>
    </div>
  </div>
</div>
