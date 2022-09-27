<div class="container col-6">
    <ul>
        @foreach($links as $link)
            <li>
                <a href="{{ $link['link'] }}">{{ $link['name'] }}</a>
            </li>
        @endforeach
    </ul>
</div>