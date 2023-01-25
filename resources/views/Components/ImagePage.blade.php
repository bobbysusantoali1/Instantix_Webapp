{{-- sementara pake for nanti jika ada data pake foreeach --}}
<section class="item p-5 d-flex" style="margin-bottom: 100px">
    @foreach ($events as $event)
    <div class="card m-2" style="width: 18rem;">

        {{-- <img class="card-img-top" src="{{asset('storage/images/'.$event->event_image)}}" alt="{{ $event->event_image }}"> --}}
        {{-- <img class="card-img-top" src="{{ URL::asset('images/'.$event->event_image) }}" alt="{{ $event->event_image }}"> --}}
        <img class="card-img-top" src="{{ url('storage/app/public/'.$event->event_image) }}" alt="{{ $event->event_image }}">
        <div class="card-body">
          <h5 class="card-title">{{ $event->event_name }}</h5>
          <p class="card-text">Artist: {{ $event->event_artist }}</p>
          <p class="card-text">Location: {{ $event->event_location }}</p>
          <p class="card-text">Date: {{ $event->event_date }} </p>
          <p class="card-text">Time: {{ date("H:i", strtotime($event->event_start_time)).' - '.date("H:i", strtotime($event->event_end_time)) }} </p>
          <a href="{{ route('view-event', ['id' => $event->id]) }}" class="btn btn-danger">Detail Event</a>
        </div>
    </div>
    @endforeach
</section>
