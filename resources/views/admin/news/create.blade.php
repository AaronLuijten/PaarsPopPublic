<x-layout>
    <div class="flex flex-col items-center m-2">
        <h2 class="text-green-400 font-bold">Nieuws artikel maken</h2>
        <div class="bg-purple-500 p-2 rounded-md">
            <form action="" method="POST" class="flex flex-col text-green-400 font-bold" enctype="multipart/form-data">
                @csrf
                <label for="Title">Title: </label>
                <input type="text" name="Title" id="Title" class="text-purple-400 focus:bg-purple-400 focus:text-green-400 font-bold transition duration-300 mb-3" value="{{old('Title')}}">
                
                <label for="content">Inhoud: </label>
                <textarea name="content" id="content" data-provide="markdown" cols="30" rows="10" class="text-purple-400 text-base focus:bg-purple-400 focus:text-green-400 transition duration-300 mb-3">{{old('content')}}</textarea>

                <label for="uploadDate">Wanneer mag dit artikel te zien zijn?</label>
                <input type="date" id="uploadDate" name="uploadDate" value="{{old('uploadDate')}}" class="text-purple-400 text-base focus:bg-purple-400 focus:text-green-400 transition duration-300 mb-3">

                <label for="attachment">Foto (optioneel): </label>
                <input type="file" name="attachment" id="attachment" class="mb-3" accept="image/*" value="{{old('attachment')}}">

                <input type="submit" value="Opslaan" id="submit" class="mt-2 w-fit p-1 text-green-400 border border-solid border-black bg-purple-600 rounded-md  hover:bg-white hover:text-green-500 hover:font-bold hover:scale-105 transition duration-300 m-2">
            </form>
        </div>
        @foreach ($errors->all() as $error)
        <div class="text-red-500">{{$error}}</div>
        @endforeach
    </div>
    
</x-layout>