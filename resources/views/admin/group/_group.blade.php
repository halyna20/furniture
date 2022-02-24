@foreach ($groups as $groupItem)
    <option value="{{ $groupItem->id ?? ''}}"
        {{-- for edit --}}
        @isset($group->id)
            @if ($group->parent_id === $groupItem->id)
                selected="true"
            @endif

            @if ($group->id === $groupItem->id)
                disabled=""
            @endif

        @endisset>

        {{ $delimiter ?? '' }}{{ $groupItem->name ?? ''}}
    </option>

    {{-- check for subgroups --}}
    @isset($groupItem->children)
        @include('admin.group._group', [
            'groups' => $groupItem->children,
            'delimiter' => ' - ' . $delimiter,
        ])
    @endisset
@endforeach
