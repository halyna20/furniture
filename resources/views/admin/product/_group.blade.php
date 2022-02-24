@foreach ($groups as $groupItem)
    <option value="{{ $groupItem->id ?? ''}}"
        {{-- for edit --}}
        @isset($product->group)
            @if($product->group->id === $groupItem->id)
                selected=""
            @endif
        @endisset>

        {{ $delimiter ?? '' }}{{ $groupItem->name ?? ''}}
    </option>

    {{-- check for subgroups --}}
    @isset($groupItem->children)
        @include('admin.product._group', [
            'groups' => $groupItem->children,
            'delimiter' => ' - ' . $delimiter,
        ])
    @endisset
@endforeach
