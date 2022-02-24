
@foreach ($groups as $group)
    @if($group->children->count())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="{{route('main')}}" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $group->name ?? '' }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach ($group->children as $children)
                    @if ($children->active === 1)
                        <li><a class="dropdown-item" href="{{route('productByGroup', $children->id)}}"> {{ $children->name ?? '' }}</a></li>
                    @endif
                @endforeach
            </ul>
        </li>
    @else

        <li class="nav-item">
            <a class="nav-link" href="{{route('productByGroup', $group->id)}}"> {{ $group->name ?? '' }}</a>
        </li>
    @endif

@endforeach
