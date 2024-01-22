<x-layout>
    <div class="flex items-center flex-col">
        <h1 class="text-green-400 font-bold mt-2">wachtwoord aanpassen</h1>
        <div class="bg-purple-500 rounded-md p-3">
            <form action="" method="POST" class="flex flex-col">
                @csrf
                <label for="password" class="text-green-400 font-bold pt-1">oud wachtwoord: </label>
                <input type="password" value="{{old('password')}}" name="password" id="password" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <label for="newPassword" class="text-green-400 font-bold pt-1">nieuw wachtwoord: </label>
                <input type="password" name="newPassword" id="newPassword" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">
                <label for="newPasswordCon" class="text-green-400 font-bold pt-1">oud wachtwoord: </label>
                <input type="password" name="newPasswordCon" id="newPasswordCon" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">

                <input type="submit" value="wachtwoord aanpassen" id="submit" class="mt-2 text-green-400 border border-solid border-black bg-purple-600 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300">
            </form>
            
            @foreach ($errors->all() as $error)
                <div class="text-red-500">{{$error}}</div>
            @endforeach
        </div>
    </div>
</x-layout>