@props(['disabled' => false])

{{-- PERUBAHAN: Menambahkan class `transition` dan `duration-150` --}}
<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm transition duration-150']) }}>