<x-layout>
    <div class="p-2 flex justify-center">
        <div class="shadow-md rounded-md bg-purple-400 mt-5 text-sm lg:text-xl p-3 w-fit flex flex-row justify-center">
            <form action="" method="POST" class="pl-2 pr-2 pb-2 text-white flex flex-col rounded-md m-0 ">
                @csrf
                <div class="flex justify-center text-green-300">
                    <b>Registreren</b>
                </div>
                <!-- First Name -->
                <label for="first_name" class="text-green-300"><b>Voornaam:</b> </label>
                <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <!-- Last Name -->
                <label for="last_name" class="text-green-300"><b>Achternaam:</b> </label>
                <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>
                
                <!-- email -->
                <label for="email" class="text-green-300"><b>Email:</b> </label>
                <input type="text" name="email" id="email" value="{{old('email')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <!-- phonenumber -->
                <label for="phonenumber" class="text-green-300"><b>Telefoon:</b> </label>
                <input type="text" name="phonenumber" id="phonenumber" value="{{old('phonenumber')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <!-- date_of_birth -->
                <label for="date_of_birth" class="text-green-300"><b>Geboorte datum:</b> </label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{old('date_of_birth')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <!-- password  -->
                <label for="password" class="text-green-300"><b>Wachtwoord:</b> </label>
                <input type="password" name="password" id="password" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <!-- password_confirm  -->
                <label for="password_confirm" class="text-green-300"><b>Voer het wachtwoord nog een keer in:</b> </label>
                <input type="password" name="password_confirm" id="password_confirm" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <input type="submit" name="submit" value="nu registreren" class="mt-2 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300">
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
                @error('password')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
                @error('password_confirm')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
            </form>
            
        </div>    
    </div>
</x-layout>