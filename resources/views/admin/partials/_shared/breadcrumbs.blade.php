@if ($breadcrumbs)
    <ul class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->first)
                <li><a href="{{ $breadcrumb->url }}"><i class="icon-home2 position-left"></i>{{ $breadcrumb->title }}</a></li>
            @elseif (!$breadcrumb->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ul>
@endif