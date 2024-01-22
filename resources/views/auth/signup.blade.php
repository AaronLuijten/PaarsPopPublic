<x-layout>
    <div class="flex-container-signup">
        <div class="form-box-signup">
            <form action="" method="POST" class="">
                @csrf
                <div class="">
                    <h2>REGISTREREN</h2>
                </div>

                <div class="flex-grid-signup">
                <!-- First Name -->
                    <div class="item-half-signup">
                        <div class="input-box-signup">
                            <label for="first_name" class="flex"><p class="star">*&nbsp;</p>Voornaam:</label>
                            <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" class="input-text">
                        </div>
                    </div>
                    <!-- Last Name -->
                    <div class="item-half-signup">
                        <div class="input-box-signup">
                            <label for="last_name" class="flex"><p class="star">*&nbsp;</p>Achternaam </label>
                            <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="input-text">
                        </div>
                    </div>
                    
                    <!-- email -->
                    <div class="item-full-signup">
                        <div class="input-box-signup">
                            <label for="email" class="flex"><p class="star">*&nbsp;</p>Email:</label>
                            <input type="text" name="email" id="email" value="{{old('email')}}" class="input-text">
                        </div>
                    </div>

                    <!-- phonenumber -->
                    <div class="item-half-signup">
                        <div class="input-box-signup">
                            <label for="phonenumber" class="flex"><p class="star">*&nbsp;</p>Telefoon:</label>
                            <input type="text" name="phonenumber" id="phonenumber" value="{{old('phonenumber')}}" class="input-text">
                        </div>
                    </div>

                    <!-- date_of_birth -->
                    <div class="item-half-signup">
                        <div class="input-box-signup">
                            <label for="date_of_birth" class="flex"><p class="star">*&nbsp;</p> Geboorte datum:</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" value="{{old('date_of_birth')}}" class="input-text">
                        </div>
                    </div>

                    <!-- password  -->
                    <div class="item-half-signup">
                        <div class="input-box-signup">
                            <label for="password" class="flex"><p class="star">*&nbsp;</p>Wachtwoord:</label>
                            <input type="password" name="password" id="password" class="input-text">
                        </div>
                    </div>

                    <!-- password_confirm  -->
                    <div class="item-half-signup">
                        <div class="input-box-signup">
                            <label for="password_confirm" class="flex"><p class="star">*&nbsp;  </p> Herhaal wachtwoord: </label>
                            <input type="password" name="password_confirm" id="password_confirm" class="input-text">
                        </div>
                    </div>
                </div>

                <div class="button-box-signup">
                    <input type="submit" name="submit" value="nu registreren" class="button-green">
                </div>
            </form>
            
            <div class="error-container-signup">
                <!-- Erorrs  -->
                @if (!$errors->isEmpty())
                <div class="error-box">
                    @error('first_name')
                        <div class="">{{$message}}</div>
                    @enderror
                    @error('last_name')
                        <div class="">{{$message}}</div>
                    @enderror
                    @error('email')
                        <div class="">{{$message}}</div>
                    @enderror
                    @error('phonenumber')
                        <div class="">{{$message}}</div>
                    @enderror
                    @error('date_of_birth')
                        <div class="">{{$message}}</div>
                    @enderror
                    @error('password')
                        <div class="">{{$message}}</div>
                    @enderror
                    @error('password_confirm')
                        <div class="">{{$message}}</div>
                    @enderror
                </div>
                @endif
            </div>

        </div>    
    </div>
</x-layout>