@props(['name'])
<div class="flash">
    <script>
        setTimeout(() => {
            document.querySelector('.flash').style.display = 'none'
        }, 4000);
    </script>
    <div 
        class="
            flash fixed bottom-5 right-5 py-3 px-10 text-white text-sm rounded-md
            {{ $name === 'success' ?  'bg-green-700' : ($name === 'fail' ? 'bg-red-500' : 'bg-gray-500')}}
        "
    >
        {{ Session::get($name) }}
    </div>
</div>
