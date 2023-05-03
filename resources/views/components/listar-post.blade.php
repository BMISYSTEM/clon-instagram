<div>
    <!-- The only way to do great work is to love what you do. - Steve Jobs -->
    @if ($posts->count())
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $posts )
                <div >
                    <a href="{{route('post.show',[$posts->user,$posts])}}" ><img  src="{{asset('uploads').'/'. $posts->imagen}}" alt="{{$posts->descripcion}}"></a>
                </div>
            @endforeach
        </div>
        <div class="my-10">
            {{-- {{$posts->links()}} --}}
        </div>
    @else
        <p class="text-center">No hay post</p>        
    @endif

</div>