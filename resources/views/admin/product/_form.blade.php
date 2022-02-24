<div class="form-group">
    <label for="productTitle">Title</label>
    <input type="text" class="form-control" id="productTitle" required name="name" value="{{ $product->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="productPrice">Price</label>
    <input type="number" step="0.01" class="form-control" required id="productPrice" name="price" value="{{ $product->price ?? old('price')}}">
</div>
<div class="form-group">
    <label for="productActive">Active</label>
    <select name="active" class="form-control">
        <option value="0" >
            false
        </option>
        <option value="1" >
            true
        </option>
    </select>
</div>
<div class="form-group">
    <label for="group">Group</label>
    <select name="group_id" class="form-control">
        @include('admin.product._group')
    </select>
</div>
    <button class="btn btn-success">Submit</button>

