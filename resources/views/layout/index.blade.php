<!DOCTYPE html>
<html lang="en">
    @include('layout/header')

<body>
    <div>
        @include('layout/navbar')
        

        <div class="flex overflow-hidden bg-white pt-16">
            @yield('content')
        </div>

    </div>
    
    @include('layout/footer')
</body>
</html>