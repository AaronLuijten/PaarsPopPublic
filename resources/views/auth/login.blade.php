<x-layout>
        <div class="flex-container-login">
            <div class="form-box-login">
                <form action="" method="POST" class="">
                    @csrf
                    <div class="">
                        <h2>INLOGGEN</h2>
                    </div>
                    <!-- email -->
                    <div class="input-box-login">
                        <label for="email" class=""><b>Email: </b></label>
                        <input type="text" name="email" id="email" class="input-text">
                    </div>
                    
                    <!-- password  -->
                    <div class="input-box-login">
                        <label for="password" class=""><b>Wachtwoord</b>: </label>
                        <input type="password" name="password" id="password" class="input-text">
                    </div>
                    
                    <div class="submit-button-login">
                        <input type="submit" name="submit" value="inloggen" class="button-green">
                    </div>
                    
                    <!-- Erorrs  -->
                    
                        @if (!$errors->isEmpty())
                            <div class="error-box">
                                
                                @error('email')
                                    <div class="">{{$message}}</div>
                                @enderror
                                @error('password')
                                    <div class="">{{$message}}</div>
                                @enderror
                            </div>
                        @endif
                        <p>Nog geen account? <a href="{{route('signup')}}" class="hover:underline">klik hier</a></p>
                </form>
                
            </div>    
        </div>
    
</x-layout>