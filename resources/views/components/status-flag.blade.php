@props(['status'])

<span {{ $attributes->merge(['class' => 'border rounded-md px-2 py-1 text-xs font-semibold application-status-'.$status]) }}  >{{ ucfirst($status) }}</span>
