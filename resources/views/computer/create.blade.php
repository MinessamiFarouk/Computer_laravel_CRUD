@extends('../static/layout')
@section('title', 'CREATE COMPUTER')
@section('Content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="flex">
            <a href="{{route('computer.index')}}" class="link">Back</a>
        </div>

        <div class="flex justify-center">
            <h2>CREATE A NEW COMPUTER</h2>
        </div>

        <div class="flex justify-center">
            <form action="{{route('computer.store')}}" method="POST">
            @csrf
                <div>
                    <label for="name">Computer NAME : </label>
                    <input type="text" name="computer_name" id="" value="{{old('computer_name')}}" placeholder="Please Put Your Name">
                    @error('computer_name')
                        <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="origin">Computer Origin : </label>
                    <input type="text" name="computer_origin" id="" value="{{old('computer_origin')}}" placeholder="Please Put Your Origin">
                    @error('computer_origin')
                        <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div>
                    <label for="price">Computer Price : </label>
                    <input type="text" name="computer_price" id="" value="{{old('computer_price')}}" placeholder="Please Put Your Price">
                    @error('computer_price')
                        <div class="form-error">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
