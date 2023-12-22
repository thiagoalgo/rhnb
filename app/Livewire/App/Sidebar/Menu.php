<?php

namespace App\Livewire\App\Sidebar;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Menu extends Component
{

    public array $menus = [];

    public function mount(): void
    {
        $this->menus = $this->getPermissionedMenus($this->getRawMenus());
    }

    public function onClick(string $route): void
    {
        if ($route) {
            $this->redirectRoute($route, navigate: true);
        }
    }

    private function getRawMenus(): array
    {
        return [
            [
                'name' => 'Home',
                'icon' => 'home',
                'route' => 'home'
            ],
            [
                'name' => 'Cadastros',
                'icon' => 'building-office',
                'abilities' => ['manage-departments', 'manage-job-titles'],
                'children' => [
                    [
                        'name' => 'Setores',
                        'route' => 'departments',
                        'abilities' => 'manage-departments',
                    ],
                    [
                        'name' => 'Cargos',
                        'route' => 'job-titles',
                        'abilities' => 'manage-job-titles',
                    ],
                ],
            ],
            [
                'name' => 'Configurações',
                'icon' => 'cog-8-tooth',
                'children' => [
                    [
                        'name' => 'Link 1',
                        'route' => 'departments',
                    ],
                    [
                        'name' => 'Sub Config 1',
                        'children' => [
                            [
                                'name' => 'Link 2',
                                'route' => 'departments',
                            ],
                            [
                                'name' => 'Link 2',
                                'route' => 'departments',
                            ]
                        ]
                    ],
                    [
                        'name' => 'Sub Config 2',
                        'children' => [
                            [
                                'name' => 'Link 2',
                                'route' => 'departments',
                            ],
                            [
                                'name' => 'Link 2',
                                'route' => 'departments',
                            ]
                        ]
                    ],
                    [
                        'name' => 'Link 2',
                        'route' => 'departments',
                    ],
                ]
            ],
            [
                'name' => 'Sair',
                'icon' => 'arrow-left-on-rectangle',
                'route' => 'logout'
            ],
        ];
    }

    private function getPermissionedMenus($menus): array
    {
        $permissionedMenus = [];

        foreach ($menus as $menu) {
            $permissionedMenu = [];

            if (isset($menu['abilities'])) {
                if (Gate::any($menu['abilities'])) {
                    $permissionedMenu = $menu;
                }
            } else {
                $permissionedMenu = $menu;
            }

            if (count($permissionedMenu) > 0) {
                if (isset($menu['children'])) {
                    $permissionedMenu['children'] = $this->getPermissionedMenus($menu['children']);
                }
                $permissionedMenus[] = $permissionedMenu;
            }
        }

        return $permissionedMenus;
    }

    public function render()
    {
        return view('livewire.app.sidebar.menu');
    }
}
