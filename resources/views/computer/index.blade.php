@extends('../static/layout')
@section('title', 'COMPUTER')
@section('Content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <a href="{{route('computer.create')}}" class="link">Add a new Computer</a>
        </div>
        <div class="flex justify-center">
            <h1>ALL COMPUTERS</h1>
        </div>

        <div class="mt-8">
            @if (count($computers) > 0)
                <ul>
                    @foreach ($computers as $computer)
                        <a href="{{ route('computer.show', $computer['id']) }}">
                            <li>{{ $computer['name'] }}, is from <strong>{{ $computer['origin'] }}</strong></li>
                        </a>
                    @endforeach
                </ul>
            @else
                <p>There's no Computers to desplay.</p>
            @endif
            
        </div>
    </div>
@endsection
