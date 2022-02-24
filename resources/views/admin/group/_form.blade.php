<div class="form-group">
    <label for="groupTitle">Title</label>
    <input type="text" class="form-control" id="groupTitle" required name="name" value="{{ $group->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="groupActive">Active</label>
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
    <select name="parent_id" class="form-control">
        <option value="0">-- without a parent group --</option>
        @include('admin.group._group')
    </select>
</div>
    <button class="btn btn-success">Submit</button>

