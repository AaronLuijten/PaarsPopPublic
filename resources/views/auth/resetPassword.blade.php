<x-layout>
    <div class="flex flex-col items-center">
        <h2 class="mt-3 text-green-400 font-bold">Wachtwoord Resetten</h2>
        <div class="bg-purple-500 p-2 rounded-md">
            <form action="" method="POST" class="flex flex-col">
                @csrf
                <label class="text-green-300 font-bold" for="email">Email</label>
                <input type="email" id="email" name="email" value="{{old('email')}}" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300">

                <input type="submit" value="Stuur Email" class="text-green-400 hover:text-white hover:underline transition duration-75">
            </form>
        </div>
    </div>
</x-layout>