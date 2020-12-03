
@foreach($data as $d)
    <p> {{ $d->order_Id }} </p>
    <p> {{ $d->traveller_arrival_date }} </p>
@endforeach


@foreach($rd as $d)
    <p> {{ $d->journey_id }} </p>
    <p> {{ $d->traveller_id }} </p>
@endforeach


@foreach($td as $d)
    <p> {{ $d->fname }} </p>
    <p> {{ $d->email }} </p>
@endforeach