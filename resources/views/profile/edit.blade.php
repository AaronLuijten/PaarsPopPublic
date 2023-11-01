<x-layout>
    @php
        $user = Auth::user()
    @endphp
    <div class="p-2 flex justify-center">
        <div class="shadow-md rounded-md bg-purple-400 mt-5 p-3 w-fit flex flex-row justify-center">
            <form action="" method="POST" class="pl-2 pr-2 pb-2 text-white flex flex-col rounded-md m-0 ">
                @csrf
                <div class="flex justify-center text-green-300">
                    <b>jouw gegevens</b>
                </div>
                <!-- First Name -->
                <label for="first_name" class="text-green-300"><b>Voornaam:</b> </label>
                <input type="text" name="first_name" id="first_name" @if($user->first_name) value="{{$user->first_name}}"@else value="{{old('first_name')}}" @endif class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <!-- Last Name -->
                <label for="last_name" class="text-green-300"><b>Achternaam:</b> </label>
                <input type="text" name="last_name" id="last_name" @if($user->last_name) value="{{$user->last_name}}"@else value="{{old('last_name')}}"  @endif class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>
                
                <!-- email -->
                <label for="email" class="text-green-300"><b>Email:</b> </label>
                <input type="text" name="email" id="email"  @if($user->email) value="{{$user->email}}"@else value="{{old('email')}}"  @endif  class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <!-- phonenumber -->
                <label for="phonenumber" class="text-green-300"><b>Telefoon:</b> </label>
                <input type="text" name="phonenumber" id="phonenumber"  @if($user->phonenumber) value="{{$user->phonenumber}}"@else value="{{old('phonenumber')}}"  @endif  class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <!-- date_of_birth -->
                <label for="date_of_birth" class="text-green-300"><b>Geboorte datum:</b> </label>
                <input type="date" name="date_of_birth" id="date_of_birth"  @if($user->date_of_birth) value="{{$user->date_of_birth}}"@else value="{{old('date_of_birth')}}"  @endif  class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <input type="submit" name="submit" value="aanpassingen opslaan" class="mt-2 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300">
                <!-- Erorrs  -->
                @error('first_name')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
                @error('last_name')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
                @error('email')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
                @error('phonenumber')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
                @error('date_of_birth')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
            </form>
            
        </div>    
    </div>
</x-layout>