<x-layout>
    <div class="flex-container-login">
        <div class="form-box-login">
            <form action="" method="POST" class="">
                @csrf
                <div class="">
                    <b class="bold-header-login">INLOGGEN</b>
                </div>
                <!-- email -->
                <div class="input-box-login">
                    <label for="email" class=""><b>Email: </b></label>
                    <input type="text" name="email" id="email" class="">
                </div>
                

                <!-- password  -->
                <div class="input-box-login">
                    <label for="password" class=""><b>Wachtwoord</b>: </label>
                    <input type="password" name="password" id="password" class="">
                </div>
                

                <input type="submit" name="submit" value="inloggen" class="button-green">
                
                <!-- Erorrs  -->
                @error('email')
                    <div class="">{{$message}}</div>
                @enderror
                @error('password')
                    <div class="">{{$message}}</div>
                @enderror
                <p>Nog geen account? <a href="{{route('signup')}}" class="">klik hier</a></p>
            </form>
            
        </div>    
    </div>
</x-layout>