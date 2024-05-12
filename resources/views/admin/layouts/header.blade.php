<div class="col-auto d-none d-sm-block">
    <h3>{{ isset($titleHeader) ? $titleHeader : (isset($titlePage) ? $titlePage : 'Blank') }}</h3>
</div>
<div class="col-auto ml-auto text-right mt-n1">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
            @if (count($breadcrumb) > 1)
                @foreach ($breadcrumb as $item)
                    <li class="breadcrumb-item"><a href="{{ $item['route'] ?? '#' }}">{{ $item['title'] ?? 'Page' }}</a></li>
                    @if ($loop->last)
                        <li class="breadcrumb-item active" aria-current="page">{{ $item['title'] ?? 'Page' }}</li>
                    @endif
                @endforeach
            @else
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb[0]['title'] ?? 'Page' }}</li>
            @endif
        </ol>
    </nav>
</div>