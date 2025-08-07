@props([
'hasToolTip' => false,
'classDefault' => 'inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150',
'withToolTip' => ' peer rounded-radius bg-surface-alt border border-surface-alt tracking-wide text-on-surface focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary dark:bg-surface-dark-alt dark:border-surface-dark-alt dark:text-on-surface-dark dark:focus-visible:outline-primary-dark'
])



<button {{ $attributes->merge(['type' => 'button', 'class' => $hasToolTip ? $classDefault . $withToolTip : $classDefault]) }}>
    {{ $slot }}
</button>