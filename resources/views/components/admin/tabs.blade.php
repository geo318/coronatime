@props(['world'])
<div class="flex mt-10 shadow-inner-gray">
    <a href="{{ route('admin.world') }}" class="inline-block text-base leading-5 mr-9 pb-4 border-b-[0.188rem] border-transparent {{ $world ? "font-bold border-app-black" : "" }}">Worldwide</a>
    <a href="{{ route('admin.country') }}" class="inline-block text-base leading-5 ml-9 pb-4 border-b-[0.188rem] border-transparent {{ $world ? "" : "font-bold border-app-black" }}">By country</a>
</div>