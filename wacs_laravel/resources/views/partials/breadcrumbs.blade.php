@unless ($breadcrumbs->isEmpty())

    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>

@endunless

<style>
    
    .breadcrumb {
        position: relative;
        top: 110px;
        display: flex;
        flex-wrap: wrap;
        padding: .75rem 1rem;
        margin-bottom: 1rem;
        list-style: none;
        background-color: #e9ecef;
        border-radius: .25rem;
    }
    .breadcrumb-item {
        list-style: none;
        margin-left: 12px;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        float: left;
        padding-right: .5rem;
        color: #6c757d;
        content: "/";
    }

    .breadcrumb-item.active {
        color: #6c757d;
    }
    
</style>