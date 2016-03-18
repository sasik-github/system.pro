<div class="panel panel-default">
    <div class="panel-heading">Мои дети</div>
    <div class="panel-body">
        @if ($children->count() > 0)
            <table class="table">
                @foreach($children as $child)
                    <tr>
                        <td>
                            <a href="{{ url('profile/events', $child->id) }}">{{ $child->fio }}</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>