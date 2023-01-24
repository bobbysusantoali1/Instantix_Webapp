{{-- sementara pake for nanti jika ada data pake foreeach --}}
<section class="item p-5 d-flex" style="margin-bottom: 100px">
    @for ($i = 0; $i < 3; $i++)
        <div class="card m-2" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('event.png') }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="/EventDetail" class="btn btn-danger">Detail Event</a>
            </div>
        </div>
    @endfor
</section>
