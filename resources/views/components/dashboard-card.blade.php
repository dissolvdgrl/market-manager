@props(['heading', 'buttonText', 'buttonAction', 'description'])

<div class="flex flex-col justify-content-stat">
    <div class="flex items-center">
        {{ $slot }}

        <h2 class="ms-3 text-xl font-semibold text-gray-900 dark:text-white">
            <a href="{{ $buttonAction }}">{{ $heading }}</a>
        </h2>
    </div>

    <p class="my-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
        {{ $description }}
    </p>

    <p class="text-sm justify-self-end mt-auto">
        <a href="{{ $buttonAction }}" class="inline-flex items-center font-semibold text-indigo-700 dark:text-indigo-300">
            {{  $buttonText }}

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="ms-1 w-5 h-5 fill-indigo-500 dark:fill-indigo-200">
                <path fill-rule="evenodd" d="M5 10a.75.75 0 01.75-.75h6.638L10.23 7.29a.75.75 0 111.04-1.08l3.5 3.25a.75.75 0 010 1.08l-3.5 3.25a.75.75 0 11-1.04-1.08l2.158-1.96H5.75A.75.75 0 015 10z" clip-rule="evenodd" />
            </svg>
        </a>
    </p>
</div>
