{{-- sementara pake for nanti jika ada data pake foreeach --}}
<section class="item p-5 d-flex" style="margin-bottom: 100px">
    @foreach ($data as $event)
    <div class="card m-2" style="width: 18rem;">
        <img class="card-img-top" src="{{ url('storage/app/public/'.$event->event_image) }}" alt="">
        <div class="card-body">
          <h5 class="card-title">{{ $event->event_name }}</h5>
          <p class="card-text">{{ $event->event_artist }}</p>
          <p class="card-text">{{ $event->event_address }}</p>
          <a href="/EventDetail/customer/{{ $event->id }}" class="btn btn-danger">Detail Event</a>
        </div>
    </div>
    @endforeach
</section>
