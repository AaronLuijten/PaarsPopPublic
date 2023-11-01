<x-layout>
    <div class="p-2 flex justify-center">
        <div class="shadow-md rounded-md bg-purple-400 mt-5 p-3 text-sm lg:text-xl flex flex-row justify-center">
            <form action="" method="POST" class="pl-2 pr-2 pb-2 text-white w-fit flex flex-col rounded-md m-5 ">
                @csrf
                <div class="flex justify-center text-green-300">
                    <b>Login</b>
                </div>
                <!-- email -->
                <label for="email" class="text-green-300"><b>Email: </b></label>
                <input type="text" name="email" id="email" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <!-- password  -->
                <label for="password" class="text-green-300"><b>Wachtwoord</b>: </label>
                <input type="password" name="password" id="password" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <br>

                <input type="submit" name="submit" value="inloggen" class="mt-2 text-green-400 border border-solid border-black bg-purple-500 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300">
                
                <!-- Erorrs  -->
                @error('email')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
                @error('password')
                    <div class="text-red-600">{{$message}}</div>
                @enderror
                <p>Nog geen account? <a href="{{route('signup')}}" class="hover:text-blue-600 hover:underline">klik hier</a></p>
            </form>
            
        </div>    
    </div>
</x-layout>