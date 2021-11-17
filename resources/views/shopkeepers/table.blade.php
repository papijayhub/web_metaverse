<div class="table-responsive">
    <table class="table" id="shopkeepers-table">
        <thead>
            <tr>
                <th>Firstname</th>
        <th>Middlename</th>
        <th>Lastname</th>
        <th>Gender</th>
        <th>Birthdate</th>
        <th>Address</th>
        <th>Citizenship</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shopkeepers as $shopkeepers)
            <tr>
                <td>{{ $shopkeepers->Firstname }}</td>
            <td>{{ $shopkeepers->Middlename }}</td>
            <td>{{ $shopkeepers->Lastname }}</td>
            <td>{{ $shopkeepers->Gender }}</td>
            <td>{{ $shopkeepers->Birthdate }}</td>
            <td>{{ $shopkeepers->Address }}</td>
            <td>{{ $shopkeepers->Citizenship }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['shopkeepers.destroy', $shopkeepers->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('shopkeepers.show', [$shopkeepers->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('shopkeepers.edit', [$shopkeepers->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
