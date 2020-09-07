@foreach ($songs as $song)
    @if ($song->id===$config['id'])
        <div class="show_fav_count">{{$song->views}} views</div>
    @endif
@endforeach