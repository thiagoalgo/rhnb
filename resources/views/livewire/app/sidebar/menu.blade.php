<nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
    <ul class="space-y-1.5">
        
        @foreach ($menus as $menu)
            @if (isset($menu['children']))
                <li class="hs-accordion" id="{{ slugfy($menu['name']) }}-accordion">
                    <button type="button"
                        class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        <x-icon name="{{ $menu['icon'] }}" class="w-5 h-5" outline />
                        {{ $menu['name'] }}
                
                        <livewire:app.sidebar.menu-arrow-icon :is_closed="false" />
                        <livewire:app.sidebar.menu-arrow-icon :is_closed="true" />
                    </button>
                
                    <div id="{{ slugfy($menu['name']) }}-accordion-child"
                        class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                        <ul class="hs-accordion-group ps-3 pt-2" data-hs-accordion-always-open>
                            @foreach ($menu['children'] as $submenu)
                                @if (isset($submenu['children']))
                                    <li class="hs-accordion" id="{{ slugfy($menu['name']) }}-accordion-{{ slugfy($submenu['name']) }}">
                                        <button type="button"
                                            class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                            {{ $submenu['name'] }}
                                            
                                            <livewire:app.sidebar.menu-arrow-icon :is_closed="false" />
                                            <livewire:app.sidebar.menu-arrow-icon :is_closed="true" />
                                            
                                        </button>
                        
                                        <div id="users-accordion-sub-1-child"
                                            class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                                            <ul class="pt-2 ps-2">
                                                @foreach ($submenu['children'] as $link) 
                                                <li>
                                                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                                        href="#">
                                                        {{ $link['name'] }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                @else
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                            href="#">
                                            {{ $submenu['name'] }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
            @else
                <li>
                    <a class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        href="#">
                        <x-icon name="{{ $menu['icon'] }}" class="w-5 h-5" outline />
                        {{ $menu['name'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</nav>