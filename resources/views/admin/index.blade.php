<x-layout>
    <div class="flex flex-col items-center mt-2">
        <h1 class="font-bold text-green-400">Admin Pagina</h1>
        <div class="bg-purple-500 p-3 rounded-md">
            <select id="myDropdown" onchange="redirectToSelectedOption()" class="rounded-md">
              <option value="">Select an option</option>
              <option value="{{route('userShow')}}">Users</option>
              <option value="{{route('accomodationShow')}}">Alle reserveringen</option>
              <option value="{{route('newsIndex')}}">Nieuws</option>
            </select>
          </div>
          
          <script>
            function redirectToSelectedOption() {
              var dropdown = document.getElementById("myDropdown");
              var selectedOption = dropdown.options[dropdown.selectedIndex].value;
              
              if (selectedOption !== "") {
                window.location.href = selectedOption;
              }
            }
          </script>
    </div>
</x-layout>