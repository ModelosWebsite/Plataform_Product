<?php

return [
    // Tema ativo
    'active' => env('APP_THEME', 'default'),

    // Lista de temas disponíveis
    'available' => [
        'default' => [
            'name' => 'Tema Padrão',
            'author' => 'Equipe Interna',
            'version' => '1.0',
        ],
        'modern' => [
            'name' => 'Tema Moderno',
            'author' => 'Desenvolvedor Externo',
            'version' => '1.0',
        ],
    ],
];
