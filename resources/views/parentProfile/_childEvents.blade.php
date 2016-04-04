
@if($events->count() > 0)
    <table class="table">
        @foreach($events as $event)
            <tr>
                <td>{{ $event->created_at }}</td>
                <td>{{ \App\Models\Repositories\EventRepository::getEventNameById($event->event_type_id) }}</td>
            </tr>
        @endforeach
    </table>

    <div class="row text-center">
        {!! $events->links() !!}
    </div>
@endif
