@props(['world'])
<div class="flex mt-10 shadow-inner-gray">
    <a href="{{ route('admin.world') }}" class="inline-block md:text-base text-sm leading-4 md:leading-5 mr-3 md:mr-9 pb-4 border-b-[0.188rem] border-transparent {{ $world ? "font-bold border-app-black" : "" }}">{{ __('main.worldwide') }}</a>
    <a href="{{ route('admin.country') }}" class="inline-block md:text-base text-sm leading-4 md:leading-5 ml-3 md:ml-9 pb-4 border-b-[0.188rem] border-transparent {{ $world ? "" : "font-bold border-app-black" }}">{{ __('main.by_country') }}</a>
</div>