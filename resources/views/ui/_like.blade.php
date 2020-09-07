<a href="{{route('likes',$song->id)}}" id="like">
    @if ($song->isfavorited())
        <img src="{{asset('ui/images/heart-red.svg')}}" width="28px" alt="">
    @else
        <img src="{{asset('ui/images/heart-white.svg')}}" width="28px" alt="">
    @endif
</a>