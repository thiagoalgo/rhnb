<?php

namespace App\Livewire\App\Sidebar;

use Livewire\Component;

class Menu extends Component
{

    public array $menus = [];

    public function mount(): void
    {
        $this->menus = $this->getMenus();
    }

    public function onClick(string $route): void
    {
        if ($route) {
            $this->redirectRoute($route, navigate: true);
        }
    }

    public function getMenus(): array
    {
        return [
            [
                'name' => 'Cadastros',
                'icon' => 'building-office',
                'children' => [
                    [
                        'name' => 'Setores',
                        'route' => 'departments',
                    ],
                    [
                        'name' => 'Cargos',
                        'route' => 'job-titles',
                    ],
                    [
                        'name' => 'Sub 1',
                        'children' => [
                            [
                                'name' => 'Link 1',
                                'route' => 'departments',
                            ],
                            [
                                'name' => 'Link 2',
                                'route' => 'departments',
                            ]
                        ]
                    ],
                    [
                        'name' => 'Sub 2',
                        'children' => [
                            [
                                'name' => 'Link 1',
                                'route' => 'departments',
                            ],
                            [
                                'name' => 'Link 2',
                                'route' => 'departments',
                            ]
                        ]
                    ],
                    [
                        'name' => 'Setores',
                        'route' => 'departments',
                    ],
                ]
            ],
            [
                'name' => 'Configurações',
                'icon' => 'cog-8-tooth',
                'children' => [
                    [
                        'name' => 'Setores',
                        'route' => 'departments',
                    ],
                    [
                        'name' => 'Sub 1',
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
                        'name' => 'Sub 2',
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
                        'name' => 'Setores',
                        'icon' => 'building-office',
                        'route' => 'departments',
                    ],
                ]
            ],
            [
                'name' => 'Sair',
                'icon' => 'arrow-left-on-rectangle'
            ],
        ];
    }


    public function render()
    {
        return view('livewire.app.sidebar.menu');
    }
}
