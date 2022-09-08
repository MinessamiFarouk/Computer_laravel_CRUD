@extends('../static/layout')
@section('title', 'SHOW COMPUTERS')
@section('Content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="flex">
            <a href="{{route('computer.index')}}" class="link">Back</a>
            <a href="{{route('computer.edit', $computer->id)}}" class="edit">Edit</a>
        </div>
        <form action="{{route('computer.destroy', $computer->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="delete">
        </form>

        <div class="flex justify-center">
            <h2>SHOW COMPUTER PAGE</h2>
        </div>

        <div>
           <p><i><b>{{ $computer['name'] }}</b></i>, is from <strong>{{ $computer['origin'] }}</strong> - and his Price is : {{$computer['price']}}$</p>
        </div>
    </div>
@endsection
